import React from 'react';

import { categories } from '../../utils/categories';

import {
  Container,
  Title,
  Amount,
  Footer,
  Category,
  Icon,
  CategoryName,
  Date
} from './styles';

export interface TransactionCardProps {
  type: 'incoming' | 'outcoming';
  name: string;
  amount: string;
  category: string;
  date: string;
}

interface Props {
  data: TransactionCardProps;
}

export function TransactionCard({ data }: Props) {
  const category = categories.find(item => item.key === data.category);

  return (
    <Container>
      <Title>{data.name}</Title>

      <Amount type={data.type}>
        {data.type === 'outcoming' && '- '}
        {data.amount}
      </Amount>

      <Footer>
        <Category>
          <Icon name={category?.icon} color={category?.color} />

          <CategoryName>
            {category?.name}
          </CategoryName>
        </Category>

        <Date>{data.date}</Date>
      </Footer>
    </Container>
  );
}
