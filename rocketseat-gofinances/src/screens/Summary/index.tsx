import React, { useCallback, useEffect, useState } from 'react';
import { ActivityIndicator } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { VictoryPie } from 'victory-native';
import { RFValue } from 'react-native-responsive-fontsize';
import { useTheme } from 'styled-components';
import { useBottomTabBarHeight } from '@react-navigation/bottom-tabs';
import { addMonths, format, subMonths } from 'date-fns';
import { ptBR } from 'date-fns/locale';
import { useFocusEffect } from '@react-navigation/native';

import { HistoryCard } from '../../components/HistoryCard';

import { categories, Category } from '../../utils/categories';
import { formatCurrency } from '../../utils/format-currency';

import {
  Container,
  Header,
  Title,
  Content,
  ChartContainer,
  MonthSelect,
  MonthSelectButton,
  MonthSelectIcon,
  Month,
  LoadingContainer
} from './styles';

interface TransactionData {
  type: 'incoming' | 'outcoming';
  name: string;
  amount: string;
  category: string;
  date: string;
}

interface CategoryData extends Category {
  total: number;
  totalFormatted: string;
  percentage: string;
}

export function Summary() {
  const theme = useTheme();
  const bottomTabBarHeight = useBottomTabBarHeight();

  const [isLoading, setIsLoading] = useState(false);
  const [totalByCategories, setTotalByCategories] = useState<CategoryData[]>([]);
  const [selectedDate, setSelectedDate] = useState(new Date());

  function handleDateChange(action: 'next' | 'previous') {
    if (action === 'next') {
      setSelectedDate(prevState => addMonths(prevState, 1));
    } else {
      setSelectedDate(prevState => subMonths(prevState, 1));
    }
  }

  async function loadData() {
    setIsLoading(true);

    const dataKey = '@gofinances:transactions';
    
    const data = await AsyncStorage.getItem(dataKey);
    const transactions = data ? JSON.parse(data) : [];

    const outcomingEntries: TransactionData[] = transactions.filter(
      (transaction: TransactionData) => {
        const transactionDate = new Date(transaction.date);

        return transaction.type === 'outcoming' &&
          transactionDate.getMonth() === selectedDate.getMonth() &&
          transactionDate.getFullYear() && selectedDate.getFullYear();
      }
    );

    const outcomingEntriesTotalAmount = outcomingEntries.reduce((accumulator, current) => {
      return accumulator + Number(current.amount)
    }, 0);

    const totalByCategory: CategoryData[] = [];

    categories.forEach(category => {
      let categorySum = 0;

      outcomingEntries.forEach(entry => {
        if (entry.category === category.key) {
          categorySum += Number(entry.amount)
        }
      });

      if (categorySum > 0) {
        totalByCategory.push({
          ...category,
          total: categorySum,
          totalFormatted: formatCurrency(categorySum),
          percentage: `${(categorySum / outcomingEntriesTotalAmount * 100).toFixed(0)}%`
        });
      }
    });

    setTotalByCategories(totalByCategory);
    setIsLoading(false);
  }

  useFocusEffect(useCallback(() => {
    loadData();
  }, [selectedDate]));

  return (
    <Container>
      <Header>
        <Title>Resumo por categoria</Title>
      </Header>

      <Content
        showsVerticalScrollIndicator={false}
        contentContainerStyle={{
          paddingHorizontal: 24,
          paddingBottom: bottomTabBarHeight,
        }}
      >
        <MonthSelect>
          <MonthSelectButton onPress={() => handleDateChange('previous')}>
            <MonthSelectIcon name="chevron-left" />
          </MonthSelectButton>

          <Month>{format(selectedDate, 'MMMM, yyyy', { locale: ptBR })}</Month>

          <MonthSelectButton onPress={() => handleDateChange('next')}>
            <MonthSelectIcon name="chevron-right" />
          </MonthSelectButton>
        </MonthSelect>

        {isLoading
          ? (
            <LoadingContainer>
              <ActivityIndicator color={theme.colors.secondary} size="large" />
            </LoadingContainer>
          )
          : (
            <>
              <ChartContainer>
                <VictoryPie
                  data={totalByCategories}
                  x="percentage"
                  y="total"
                  colorScale={totalByCategories.map(category => category.color)}
                  style={{
                    labels: {
                      fontSize: RFValue(18),
                      fontWeight: 'bold',
                      fill: theme.colors.shape
                    }
                  }}
                  labelRadius={50}
                />
              </ChartContainer>

              {totalByCategories.map(item => (
                <HistoryCard
                  key={item.key}
                  title={item.name}
                  amount={item.totalFormatted}
                  color={item.color}
                />
              ))}
            </>
          )}
      </Content>
    </Container>
  );
}