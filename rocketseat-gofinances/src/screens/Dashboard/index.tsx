import React, { useCallback, useEffect, useState } from 'react';
import { ActivityIndicator } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { useFocusEffect } from '@react-navigation/native';
import { useTheme } from 'styled-components';

import { HighlightCard } from '../../components/HighlightCard';
import { TransactionCard, TransactionCardProps } from '../../components/TransactionCard';

import { formatCurrency } from '../../utils/format-currency';
import { formatDateTime } from '../../utils/format-datetime';

import {
  Container,
  Header,
  UserWrapper,
  UserInfo,
  Photo,
  User,
  UserGreeting,
  UserName,
  Icon,
  HighlightCards,
  Trasactions,
  Title,
  TransactionsList,
  LogoutButton,
  LoadingContainer
} from './styles';

export interface DataListProps extends TransactionCardProps {
  id: string;
}

interface HighlightProps {
  totalAmount: string;
  lastEntry: string;
  interval: string;
}

interface HighlightData {
  incoming: Pick<HighlightProps, 'totalAmount' | 'lastEntry'>;
  outcoming: Pick<HighlightProps, 'totalAmount' | 'lastEntry'>;
  summary: Pick<HighlightProps, 'totalAmount' | 'interval'>;
}

export function Dashboard() {
  const theme = useTheme();

  const [isLoading, setIsLoading] = useState(true);
  const [transactions, setTransactions] = useState<DataListProps[]>([]);
  const [highlightData, setHighlightData] = useState<HighlightData>({} as HighlightData);

  function getLastTransactionDate(collection: DataListProps[], type: 'incoming' | 'outcoming') {
    const entriesTimestamps = collection
      .filter(transaction => transaction.type === type)
      .map(transaction => new Date(transaction.date).getTime());

    const lastEntryTimestamp = Math.max.apply(Math, entriesTimestamps);

    return lastEntryTimestamp;
  }

  async function loadTransactions() {
    const dataKey = '@gofinances:transactions';
    const response = await AsyncStorage.getItem(dataKey);

    let incomingEntriesTotal = 0;
    let outcomingEntriesTotal = 0;

    if (response) {
      const storedTransactions = JSON.parse(response);

      const transactionsFormatted: DataListProps[] = storedTransactions.map((transaction: DataListProps) => {
        if (transaction.type === 'incoming') {
          incomingEntriesTotal += Number(transaction.amount);
        } else {
          outcomingEntriesTotal += Number(transaction.amount);
        }

        const amount = formatCurrency(Number(transaction.amount));

        const date = formatDateTime(new Date(transaction.date));

          return { ...transaction, amount, date };
      });

      setTransactions(transactionsFormatted);

      const lastIncomingEntry = getLastTransactionDate(storedTransactions, 'incoming');
      const lastOutcomingEntry = getLastTransactionDate(storedTransactions, 'outcoming');
      const summaryInterval = `01 a ${formatDateTime(new Date(lastOutcomingEntry), {
        day: 'numeric',
        month: 'long'
      })}`;

      setHighlightData({
        incoming: {
          totalAmount: formatCurrency(incomingEntriesTotal),
          lastEntry: formatDateTime(new Date(lastIncomingEntry), {
            day: 'numeric',
            month: 'long'
          })
        },
        outcoming: {
          totalAmount: formatCurrency(outcomingEntriesTotal),
          lastEntry: formatDateTime(new Date(lastOutcomingEntry), {
            day: 'numeric',
            month: 'long'
          })
        },
        summary: {
          totalAmount: formatCurrency(incomingEntriesTotal - outcomingEntriesTotal),
          interval: summaryInterval
        }
      });

      setIsLoading(false);
    } else {
      setTransactions([]);
    }
  }

  useEffect(() => {
    loadTransactions();
  }, []);

  useFocusEffect(useCallback(() => {
    loadTransactions();
  }, []));

  if (isLoading) {
    return (
      <LoadingContainer>
        <ActivityIndicator color={theme.colors.secondary} size="large" />
      </LoadingContainer>
    );
  }

  return (
    <Container>
      <Header>
        <UserWrapper>
          <UserInfo>
            <Photo source={{ uri: 'https://avatars.githubusercontent.com/u/62507430?v=4' }} />

            <User>
              <UserGreeting>Olá,</UserGreeting>
              <UserName>Diego</UserName>
            </User>
          </UserInfo>

          <LogoutButton onPress={() => {}}>
            <Icon name="power" />
          </LogoutButton>
        </UserWrapper>
      </Header>

      <HighlightCards>
        <HighlightCard
          type="incoming"
          title="Entradas"
          amount={highlightData.incoming.totalAmount}
          lastTransaction={`Última entrada dia ${highlightData.incoming.lastEntry}`}
        />

        <HighlightCard
          type="outcoming"
          title="Saídas"
          amount={highlightData.outcoming.totalAmount}
          lastTransaction={`Última saída dia ${highlightData.outcoming.lastEntry}`}
        />

        <HighlightCard
          type="total"
          title="Total"
          amount={highlightData.summary.totalAmount}
          lastTransaction={highlightData.summary.interval}
        />
      </HighlightCards>

      <Trasactions>
        <Title>Listagem</Title>

        <TransactionsList
          data={transactions}
          keyExtractor={item => item.id}
          renderItem={({ item }) => <TransactionCard data={item} />}
        />
      </Trasactions>
    </Container>
  );
}
