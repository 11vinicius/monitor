# Sistema de Rastreamento de Gado

## Descrição do Projeto
Este sistema de rastreamento de gado permite a autenticação de usuários e o gerenciamento de informações relacionadas a usuários, propriedades e gado. A aplicação foi desenvolvida utilizando NestJS e inclui recursos de autenticação, CRUD completo para usuários, propriedades e gado, além de uma arquitetura modular e escalável.

## Recursos Implementados
- **Autenticação**
  - Registro de usuários
  - Login com emissão de token JWT
  - Middleware de autenticação para proteger rotas

- **Gerenciamento de Usuários**
  - Criação de usuários
  - Atualização de informações de usuários
  - Exclusão de usuários
  - Listagem de usuários

- **Gerenciamento de Propriedades**
  - Criação de propriedades
  - Atualização de informações de propriedades
  - Exclusão de propriedades
  - Listagem de propriedades

- **Gerenciamento de Gado**
  - Criação de registros de gado
  - Atualização de informações de gado
  - Exclusão de registros de gado
  - Listagem de gado
  - Histórico do animal

## Tecnologias Utilizadas
- **Back-end**: NestJS
- **Banco de Dados**: PostgreSQL
- **Autenticação**: JWT
- **Gerenciamento de Dependências**: npm
- **Containerização**: Docker

## Pré-requisitos
- Node.js (v16 ou superior)
- Docker e Docker Compose
- PostgreSQL

## Configuração do Ambiente
1. Clone o repositório:
   ```bash
   git clone <URL_DO_REPOSITORIO>
   cd <NOME_DO_DIRETORIO>
   ```

2. Instale as dependências:
   ```bash
   npm install
   ```

3. Configure as variáveis de ambiente:
   Crie um arquivo `.env` na raiz do projeto com as seguintes informações:
   ```env
   DATABASE_URL=postgresql://<USUARIO>:<SENHA>@<HOST>:<PORTA>/<NOME_DO_BANCO>
   JWT_SECRET=<SEGREDO_JWT>
   ```

4. Inicie o ambiente de desenvolvimento:
   ```bash
   npm run start:dev
   ```

5. (Opcional) Utilize Docker para executar o sistema:
   ```bash
   docker-compose up --build
   ```

## Rotas da API

### Autenticação
- **POST** `/auth/login`: Autenticar usuário e obter token JWT

### Usuários
- **GET** `/users`: Listar todos os usuários
- **POST** `/users`: Criar um novo usuário
- **GET** `/users/:id`: Obter detalhes de um usuário
- **PUT** `/users/:id`: Atualizar informações de um usuário
- **DELETE** `/users/:id`: Remover um usuário

### Propriedades
- **GET** `/properties`: Listar todas as propriedades
- **POST** `/properties`: Criar uma nova propriedade
- **GET** `/properties/:id`: Obter detalhes de uma propriedade
- **PUT** `/properties/:id`: Atualizar informações de uma propriedade
- **DELETE** `/properties/:id`: Remover uma propriedade

### Gado
- **GET** `/cattle`: Listar todos os registros de gado
- **POST** `/cattle`: Criar um novo registro de gado
- **GET** `/cattle/:id`: Obter detalhes de um registro de gado
- **PUT** `/cattle/:id`: Atualizar informações de um registro de gado
- **DELETE** `/cattle/:id`: Remover um registro de gado

## Estrutura de Pastas
```
src/
├── auth/
├── users/
├── properties/
├── cattle/
└── main.ts
```

## Contribuição
Contribuições são bem-vindas! Siga os passos abaixo:
1. Faça um fork do repositório
2. Crie uma branch para sua feature: `git checkout -b minha-feature`
3. Commit suas alterações: `git commit -m 'Adiciona minha feature'`
4. Faça o push para a branch: `git push origin minha-feature`
5. Abra um Pull Request

**Desenvolvido com NestJS** 🚀