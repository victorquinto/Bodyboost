# BodyBoost

## Badges

[![Version](https://img.shields.io/badge/Version-0.1.0--alpha-blue)](https://github.com/seu-usuario/bodyboost/releases/tag/v0.1.0)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE.md)
[![PHP Version](https://img.shields.io/badge/PHP->=7.4-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-blue.svg)](https://www.mysql.com/)
[![WampServer](https://img.shields.io/badge/Server-WampServer-orange)](https://www.wampserver.com/en/)
[![Jest](https://img.shields.io/badge/Tests-Jest-brightgreen)]

## Descrição do Projeto

O BodyBoost é uma plataforma online inovadora que conecta usuários a uma ampla rede de academias e clínicas de saúde. Nosso objetivo é facilitar o acesso a serviços de bem-estar e saúde, oferecendo funcionalidades como agendamento online, armazenamento seguro de histórico de exames e um mapa intuitivo para descobrir estabelecimentos próximos. O BodyBoost busca ser o seu ponto central para cuidar da sua saúde e fitness.

**Versão Inicial:** 0.1.0 (Alpha)

## Funcionalidades Principais

* **Conexão com Academias e Clínicas:** Explore e conecte-se com diversas academias e clínicas de saúde em sua região, encontrando os serviços que você procura.
* **Agendamento Facilitado:** Marque seus treinos, consultas e outros serviços de saúde de forma rápida e conveniente.
* **Histórico de Exames Centralizado:** Armazene seus resultados de exames (sangue, imagem, etc.) de forma segura e organizada, acessando-os quando precisar.
* **Mapa Interativo:** Utilize um mapa intuitivo para localizar academias e clínicas próximas à sua localização, com informações detalhadas e rotas.
* **Perfis Detalhados:** Acesse informações completas sobre academias e clínicas, incluindo descrição dos serviços, horários de funcionamento, fotos, avaliações de usuários e dados de contato.

## Como Começar

1.  **Clone o repositório:**
    ```bash
    git clone "https://github.com/victorquinto/Bodyboost.git"
    ```
    *Substitua o link acima pelo link real do seu repositório.*

2.  **Configure o ambiente:**
    * **Banco de Dados:** Certifique-se de ter o **WampServer** instalado e rodando para o servidor MySQL. Crie um banco de dados chamado `bodyboost_db` (ou outro de sua preferência) e importe o schema fornecido no arquivo `database/schema.sql` (se houver).
    * **Arquivo de Configuração:** Crie um arquivo `.env` na raiz do projeto e configure as seguintes variáveis de ambiente:
        ```
        DB_HOST=localhost
        DB_DATABASE=bodyboost_db
        DB_USERNAME=root # Usuário padrão do WampServer
        DB_PASSWORD= # Senha padrão do WampServer é geralmente vazia
        APP_URL=http://localhost # Ou a URL local do seu servidor web
        GOOGLE_MAPS_API_KEY=SUA_CHAVE_API_DO_GOOGLE_MAPS # Necessário para o mapa
        ```
        *Certifique-se de ajustar os valores de acordo com a sua configuração e obter uma chave da API do Google Maps.*

3.  **Servidor Web:** Configure seu servidor web local (configurado pelo WampServer) para servir os arquivos HTML, CSS e JavaScript do seu front-end. Certifique-se de que o PHP esteja habilitado para lidar com as conexões ao banco de dados.

4.  **Execute a aplicação:** Após configurar o WampServer e o projeto, acesse a aplicação através da `APP_URL` no seu navegador. O front-end será servido pelo servidor web, e as interações com o banco de dados serão feitas através dos scripts PHP.

5.  **Testes:** Para executar os testes do código JavaScript, utilize o Jest:
    ```bash
    # Navegue até a pasta do seu projeto (se ainda não estiver lá)
    cd seu-projeto
    # Instale as dependências do Jest (se ainda não estiverem instaladas)
    npm install --save-dev jest
    # Ou yarn add --dev jest
    # Execute os testes
    npm test
    # Ou yarn test
    ```
    *Certifique-se de ter o Node.js e o npm/yarn instalados para executar os comandos do Jest.*

## Contribuição

Se você deseja contribuir para o projeto BodyBoost, siga estas etapas:

1.  Faça um fork do repositório.
2.  Crie uma nova branch para sua feature (`git checkout -b feature/sua-feature`).
3.  Faça commit de suas alterações (`git commit -am 'Adiciona nova feature'`).
4.  Envie para a sua branch (`git push origin feature/sua-feature`).
5.  Abra um Pull Request para que suas alterações sejam revisadas.

## Tecnologias Utilizadas

* **Front-end:**
    * HTML5
    * CSS3
    * JavaScript (ES6+)
    * **Testes:** Jest
* **Back-end:**
    * PHP (para comunicação com o banco de dados)
* **Banco de Dados:**
    * MySQL (via WampServer)
* **Servidor Web:**
    * WampServer (local)
* **Outros:**
    * API do Google Maps

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE.md) - veja o arquivo [LICENSE.md](LICENSE.md) para detalhes.

## Autores

* Victor Quinto
* Leonardo barauna
* Sergio Evangelista
* Arthur de Aquino

## Contato

Para dúvidas e sugestões, entre em contato através do e-mail: [[seu e-mail de contato]] ou abra uma Issue neste repositório.
