import styled, { css } from 'styled-components/native';
import { Feather } from '@expo/vector-icons';
import { RFValue } from 'react-native-responsive-fontsize';
import { RectButton } from 'react-native-gesture-handler';

interface ContainerProps {
  isActive: boolean;
  type: 'incoming' | 'outcoming';
}

interface IconProps {
  type: 'incoming' | 'outcoming';
}

export const Container = styled.View<ContainerProps>`
  width: 49%;
  border-width: ${({ isActive }) => isActive ? 0 : 1.5}px;
  border-color: ${({ theme }) => theme.colors.text};
  border-radius: ${RFValue(5)}px;

  ${({ isActive, type }) => isActive && type === 'incoming' && css`
    background-color: ${({ theme }) => theme.colors.success_light};
  `}

  ${({ isActive, type }) => isActive && type === 'outcoming' && css`
    background-color: ${({ theme }) => theme.colors.attention_light};
  `}
`;

export const Button = styled(RectButton)`
  padding: ${RFValue(18)}px ${RFValue(16)}px;

  flex-direction: row;
  align-items: center;
  justify-content: center;
`;

export const Icon = styled(Feather)<IconProps>`
  font-size: ${RFValue(24)}px;
  margin-right: ${RFValue(12)}px;

  color: ${({ theme, type }) =>
    type === 'incoming' 
      ? theme.colors.success
      : theme.colors.attention
  }
`;

export const Title = styled.Text`
  font-family: ${({ theme }) => theme.fonts.regular};
  font-size: ${RFValue(14)}px;
  color: ${({ theme }) => theme.colors.text_dark};
`;
