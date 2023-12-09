
# **Ecoleta**
Uma aplicação para a realizar a aproximação entre os pontos de coleta de resíduos e aqueles que desejam descartá-los, com back-end construído com **Node** e o front-end web e mobile feitos com **React** e **React Native**, respectivamente.

![](https://github.com/diegods-ferreira/ecoleta/blob/master/prints/ecoleta-capa.png?raw=true)



### **API ([server](https://github.com/diegods-ferreira/ecoleta/tree/master/server))**
Alguns *scripts* já foram preparados para simplificar a inicialização do servidor **Node.js** da API no back-end.

Portanto, conforme o arquivo package.json, para iniciar o servidor em http://localhost:3333, dentro da pasta server/ execute o seguinte comando: **npm run dev**



### **Versão Web ([web](https://github.com/diegods-ferreira/ecoleta/tree/master/web))**
![](https://github.com/diegods-ferreira/ecoleta/blob/master/prints/web.gif?raw=true)

O *front-end* da aplicação foi construído com **React**. Para que as funcionalidades sejam carregadas e executadas da forma correta, é necessário que o caminho de acesso à API esteja definido corretamente no arquivo api.ts, o qual está localizado em /web/src/services/.

Para iniciar o *front-end*, dentro da pasta web/ basta executar o seguinte comando: **npm start**



### **Versão Mobile ([mobile](https://github.com/diegods-ferreira/ecoleta/tree/master/mobile))**
![](https://github.com/diegods-ferreira/ecoleta/blob/master/prints/mobile.gif?raw=true)

A aplicação *mobile* do Ecoleta foi construída com **React Native**, com a ajuda do *Expo*.

Assim como na aplicação web, aqui também será necessário verificar alguns caminhos de acesso à API para que todas as funcionalidades sejam executadas da forma correta.

Lembrando que, por se tratar de uma aplicação mobile, não há como ela acessar o endereço http://localhost:3333 no qual o servidor da API possa estar em execução.

Uma solução é utilizar o endereço de IP na rede local da máquina em que o servidor está rodando. Esse endereço pode ser alterado no arquivo api.ts, o qual encontra-se no diretório /mobile/src/services/.

Para iniciar o app com o Expo, dentro da pasta mobile/ basta executar o seguinte comando: **npm start**

Uma página página do *Expo* será aberta no seu browser padrão. Espere que o código QR apareça no canto inferior esquerdo da tela. Por fim, basta acessar o app do Expo\* no seu celular (ou emulador), ler o código QR ou entrar com o endereço que aparece logo acima e testar a aplicação.
###### **\* O app do Expo pode ser baixado pela Play Store e App Store.**
