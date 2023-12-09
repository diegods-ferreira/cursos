import styled, { css } from 'styled-components/native';
import { RFValue } from 'react-native-responsive-fontsize';
import { Feather } from '@expo/vector-icons';

interface TypeProps {
  type: 'incoming' | 'outcoming' | 'total';
}

export const Container = styled.View<TypeProps>`
  width: ${RFValue(300)}px;
  border-radius: ${RFValue(5)}px;
  padding: ${RFValue(19)}px ${RFValue(23)}px ${RFValue(42)}px;
  margin-right: ${RFValue(16)}px;

  background-color: ${({ theme, type }) =>
    type === 'total'
      ? theme.colors.secondary
      : theme.colors.shape
  };
`;

export const Header = styled.View`
  flex-direction: row;
  justify-content: space-between;
`;

export const Title = styled.Text<TypeProps>`
  font-family: ${({ theme }) => theme.fonts.regular};
  font-size: ${RFValue(14)}px;

  color: ${({ theme, type }) =>
    type === 'total'
      ? theme.colors.shape
      : theme.colors.text_dark
  };
`;

export const Icon = styled(Feather)<TypeProps>`
  font-size: ${RFValue(40)}px;

  ${({ theme, type }) => type === 'incoming' && css`
    color: ${theme.colors.success};
  `}

  ${({ theme, type }) => type === 'outcoming' && css`
    color: ${theme.colors.attention};
  `}

  ${({ theme, type }) => type === 'total' && css`
    color: ${theme.colors.shape};
  `}
`;

export const Footer = styled.View``;

export const Amount = styled.Text<TypeProps>`
  font-family: ${({ theme }) => theme.fonts.medium};
  font-size: ${RFValue(32)}px;
  margin-top: ${RFValue(32)}px;

  color: ${({ theme, type }) =>
    type === 'total'
      ? theme.colors.shape
      : theme.colors.text_dark
  };
`;

export const LastTransaction = styled.Text<TypeProps>`
  font-family: ${({ theme }) => theme.fonts.regular};
  font-size: ${RFValue(12)}px;

  color: ${({ theme, type }) =>
    type === 'total'
      ? theme.colors.shape
      : theme.colors.text
  };
`;
