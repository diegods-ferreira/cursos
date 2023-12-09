import { RFValue } from 'react-native-responsive-fontsize';
import styled from 'styled-components/native';

export const Container = styled.View`
  flex: 1;
  background-color: ${({ theme }) => theme.colors.background};
`;

export const Header = styled.View`
  background-color: ${({ theme }) => theme.colors.primary};
  width: 100%;
  height: ${RFValue(113)}px;
  padding-bottom: ${RFValue(19)}px;

  align-items: center;
  justify-content: flex-end;
`;

export const Title = styled.Text`
  font-family: ${({ theme }) => theme.fonts.regular};
  font-size: ${RFValue(18)}px;
  color: ${({ theme }) => theme.colors.shape};
`;

export const Form = styled.View`
  flex: 1;
  width: 100%;
  padding: ${RFValue(24)}px;
  justify-content: space-between;
`;

export const Fields = styled.View``;

export const TransactionTypes = styled.View`
  margin-top: ${RFValue(8)}px;
  margin-bottom: ${RFValue(16)}px;

  flex-direction: row;
  justify-content: space-between;
`;