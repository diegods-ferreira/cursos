import React from 'react';
import { RectButtonProps } from 'react-native-gesture-handler';

import { Container, Button, Icon, Title } from './styles';

interface Props extends RectButtonProps {
  type: 'incoming' | 'outcoming';
  title: string;
  isActive: boolean;
}

const icons = {
  incoming: 'arrow-up-circle',
  outcoming: 'arrow-down-circle'
};

export function TransactionTypeButton({ type, title, isActive = false, ...rest }: Props) {
  return (
    <Container isActive={isActive} type={type}>
      <Button {...rest}>
        <Icon name={icons[type]} type={type} />
        <Title>{title}</Title>
      </Button>
    </Container>
  );
}
