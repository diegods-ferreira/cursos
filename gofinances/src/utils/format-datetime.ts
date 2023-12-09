const defaultOptions: Intl.DateTimeFormatOptions = {
  day: '2-digit',
  month: '2-digit',
  year: 'numeric'
};

export const formatDateTime = (date: Date, options = defaultOptions) => Intl
  .DateTimeFormat('pt-BR', options)
  .format(new Date(date));