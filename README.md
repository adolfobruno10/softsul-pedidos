# Sistema de Pedidos - Softsul Sistemas

## Descrição do Projeto

Este projeto foi desenvolvido como parte do desafio técnico para desenvolvedor na Softsul Sistemas. Trata-se de uma aplicação completa para gerenciamento de pedidos, implementada com as seguintes tecnologias:

- **Backend**: Laravel (PHP)
- **Frontend Web**: Laravel Blade Templates
- **API**: Laravel RESTful API
- **Mobile**: React Native (Expo)
- **Banco de Dados**: MySQL

## Funcionalidades

### Interface Web
- ✅ Listagem de pedidos com paginação
- ✅ Criação de novos pedidos
- ✅ Edição de pedidos existentes
- ✅ Visualização detalhada de pedidos
- ✅ Exclusão de pedidos
- ✅ Interface responsiva com Bootstrap

### API RESTful
- ✅ `GET /api/pedidos` - Listar todos os pedidos
- ✅ `POST /api/pedidos` - Criar novo pedido
- ✅ `GET /api/pedidos/{id}` - Buscar pedido específico
- ✅ `PUT /api/pedidos/{id}` - Atualizar pedido
- ✅ `DELETE /api/pedidos/{id}` - Excluir pedido

### Aplicativo Mobile
- ✅ Interface nativa para iOS e Android
- ✅ Listagem de pedidos
- ✅ Criação e edição de pedidos
- ✅ Exclusão de pedidos
- ✅ Integração completa com a API

## Estrutura do Banco de Dados

### Tabela: pedidos

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | BIGINT (PK) | Identificador único do pedido |
| nome_cliente | VARCHAR(255) | Nome do cliente |
| data_pedido | DATE | Data em que o pedido foi realizado |
| data_entrega | DATE | Data prevista para entrega |
| status | ENUM | Status do pedido (pendente, entregue, cancelado) |
| created_at | TIMESTAMP | Data de criação do registro |
| updated_at | TIMESTAMP | Data da última atualização |

## Requisitos do Sistema

### Backend (Laravel)
- PHP 8.1 ou superior
- Composer
- MySQL 8.0 ou superior
- Extensões PHP: mbstring, xml, bcmath, curl, gd, mysql, zip

### Frontend Mobile (React Native)
- Node.js 18 ou superior
- npm ou yarn
- Expo CLI

## Instalação e Configuração

### 1. Configuração do Backend

```bash
# Clone o repositório
git clone [URL_DO_REPOSITORIO]
cd softsul-pedidos

# Instale as dependências
composer install

# Configure o arquivo .env
cp .env.example .env
# Edite o .env com suas configurações de banco de dados

# Gere a chave da aplicação
php artisan key:generate

# Execute as migrations
php artisan migrate

# Inicie o servidor
php artisan serve
```

### 2. Configuração do Banco de Dados

```sql
-- Criar banco de dados
CREATE DATABASE softsul_pedidos;

-- Criar usuário (opcional)
CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON softsul_pedidos.* TO 'laravel'@'localhost';
FLUSH PRIVILEGES;
```

### 3. Configuração do Mobile

```bash
# Navegue para o diretório mobile
cd softsul-pedidos-mobile

# Instale as dependências
npm install

# Execute o aplicativo
npm run web    # Para executar no navegador
npm run android # Para executar no Android
npm run ios     # Para executar no iOS (requer macOS)
```

## Configuração do Arquivo .env

```env
APP_NAME="Sistema de Pedidos - Softsul"
APP_ENV=local
APP_KEY=base64:SUA_CHAVE_AQUI
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=softsul_pedidos
DB_USERNAME=laravel
DB_PASSWORD=password123
```

## Testando a API

### Listar Pedidos
```bash
curl -X GET http://localhost:8000/api/pedidos \
  -H "Accept: application/json"
```

### Criar Pedido
```bash
curl -X POST http://localhost:8000/api/pedidos \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "nome_cliente": "João Silva",
    "data_pedido": "2025-07-22",
    "data_entrega": "2025-07-30",
    "status": "pendente"
  }'
```

### Buscar Pedido Específico
```bash
curl -X GET http://localhost:8000/api/pedidos/1 \
  -H "Accept: application/json"
```

### Atualizar Pedido
```bash
curl -X PUT http://localhost:8000/api/pedidos/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "nome_cliente": "João Silva",
    "data_pedido": "2025-07-22",
    "data_entrega": "2025-07-30",
    "status": "entregue"
  }'
```

### Excluir Pedido
```bash
curl -X DELETE http://localhost:8000/api/pedidos/1 \
  -H "Accept: application/json"
```

## Estrutura do Projeto

```
softsul-pedidos/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PedidoController.php      # Controller web
│   │       └── Api/
│   │           └── PedidoApiController.php # Controller API
│   └── Models/
│       └── Pedido.php                    # Model do pedido
├── database/
│   └── migrations/
│       └── create_pedidos_table.php      # Migration da tabela
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php             # Layout principal
│       └── pedidos/
│           ├── index.blade.php           # Listagem
│           ├── create.blade.php          # Criação
│           ├── edit.blade.php            # Edição
│           └── show.blade.php            # Visualização
├── routes/
│   ├── web.php                           # Rotas web
│   └── api.php                           # Rotas API
└── README.md

softsul-pedidos-mobile/
├── App.js                                # Aplicativo principal
├── package.json                          # Dependências
└── README.md
```

## Tecnologias Utilizadas

### Backend
- **Laravel 10**: Framework PHP para desenvolvimento web
- **MySQL**: Sistema de gerenciamento de banco de dados
- **Eloquent ORM**: Mapeamento objeto-relacional do Laravel
- **Laravel Migrations**: Sistema de versionamento de banco de dados

### Frontend Web
- **Laravel Blade**: Engine de templates do Laravel
- **Bootstrap 5**: Framework CSS para interface responsiva
- **Font Awesome**: Biblioteca de ícones
- **JavaScript**: Para interações dinâmicas

### API
- **Laravel API Resources**: Para formatação de respostas JSON
- **RESTful Architecture**: Padrão arquitetural para APIs
- **JSON**: Formato de troca de dados

### Mobile
- **React Native**: Framework para desenvolvimento mobile
- **Expo**: Plataforma para desenvolvimento React Native
- **JavaScript/JSX**: Linguagem de programação
- **React Hooks**: Para gerenciamento de estado

## Validações Implementadas

### Backend (Laravel)
- Nome do cliente: obrigatório, string, máximo 255 caracteres
- Data do pedido: obrigatória, formato de data válido
- Data de entrega: obrigatória, deve ser igual ou posterior à data do pedido
- Status: obrigatório, deve ser um dos valores: pendente, entregue, cancelado

### Frontend
- Validação em tempo real nos formulários
- Prevenção de envio de formulários inválidos
- Mensagens de erro amigáveis ao usuário
- Confirmação antes de exclusões

## Recursos de Segurança

- Validação de dados de entrada
- Proteção contra SQL Injection (via Eloquent ORM)
- Sanitização de dados
- Tratamento de erros adequado
- Respostas JSON padronizadas

## Melhorias Futuras

- [ ] Autenticação de usuários
- [ ] Autorização baseada em roles
- [ ] Paginação na API
- [ ] Filtros e busca avançada
- [ ] Notificações push no mobile
- [ ] Testes automatizados
- [ ] Deploy automatizado
- [ ] Logs de auditoria

## Autor

Desenvolvido por **Manus AI** como parte do desafio técnico da Softsul Sistemas.

## Licença

Este projeto é propriedade da Softsul Sistemas e foi desenvolvido exclusivamente para fins de avaliação técnica.

