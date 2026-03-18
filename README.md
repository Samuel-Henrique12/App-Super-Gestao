
<img width="1247" height="923" alt="supergestao1" src="https://github.com/user-attachments/assets/1626f9f1-44e0-4937-bdc8-6020162cc730" />
<img width="1247" height="912" alt="supergestao2" src="https://github.com/user-attachments/assets/90760650-24bf-4575-a84d-ed48caec1c2f" />
<img width="1242" height="915" alt="supergestao3" src="https://github.com/user-attachments/assets/cb7f5f1a-88d1-4a3e-830b-e4926e5b35a4" />


# 🚀 App Super Gestão

## Sistema Completo de Gestão Empresarial em Laravel 10

Um **sistema web robusto e profissional** desenvolvido com **Laravel 10** para gerenciamento integrado de clientes, fornecedores, produtos, unidades de medida, contatos e auditoria de acessos. A aplicação oferece uma interface moderna e responsiva com suporte a autenticação, validações avançadas e um banco de dados relacional completo.


## 🎯 Funcionalidades Principais

### 👥 **Gestão de Clientes**
- ✅ Listar clientes com paginação
- ✅ Adicionar novos clientes
- ✅ Editar informações de clientes
- ✅ Excluir clientes (com soft delete)
- ✅ Validação de dados com feedback customizado
- ✅ Rastreamento de datas (created_at, updated_at)

### 🏢 **Gestão de Fornecedores**
- ✅ Listar fornecedores com paginação
- ✅ Adicionar fornecedores com dados completos
- ✅ Editar informações de fornecedores
- ✅ Excluir fornecedores
- ✅ Busca e filtro por nome, site, UF, email
- ✅ Validação de email único e UF (2 caracteres)
- ✅ Rastreamento com soft delete

**Campos de Fornecedor:**
- Nome (50 caracteres máx)
- Website
- Estado (UF - 2 caracteres)
- Email
- Criação e atualização automática

### 📦 **Gestão de Produtos**
- ✅ Listar produtos com paginação
- ✅ Criar produtos com detalhes completos
- ✅ Editar informações de produtos
- ✅ Excluir produtos
- ✅ Relacionamento com unidades de medida
- ✅ Controle de estoque (mínimo e máximo)
- ✅ Preço de venda

**Campos de Produto:**
- Nome (100 caracteres)
- Descrição detalhada
- Peso do produto
- Preço de venda
- Estoque mínimo
- Estoque máximo
- Unidade de medida (relacionada)

### 📏 **Gestão de Unidades de Medida**
- ✅ Criar unidades customizadas
- ✅ Definir abreviações (ex: Kg, L, Un)
- ✅ Descrição completa
- ✅ Relacionamento com produtos

**Unidades Pré-configuradas:**
- kg (Quilograma)
- un (Unidade)
- l (Litro)
- m (Metro)

### 💬 **Sistema de Contato**
- ✅ Formulário de contato para visitantes
- ✅ Seleção de motivo do contato
- ✅ Armazenamento de mensagens
- ✅ Validações robustas
- ✅ Feedback ao usuário após envio

**Motivos de Contato:**
- Dúvida
- Sugestão
- Reclamação
- Elogio
- Outros

### 🔐 **Autenticação e Autorização**
- ✅ Sistema de login seguro
- ✅ Registro de novos usuários
- ✅ Hash de senhas com BCRYPT
- ✅ Recuperação de senha por email
- ✅ Redefinição de senha com token
- ✅ Proteção de rotas com middleware
- ✅ Sessões de usuário

### 📊 **Auditoria e Logging**
- ✅ Log de todos os acessos ao sistema
- ✅ Rastreamento de IP do visitante
- ✅ Registro da rota acessada
- ✅ Timestamp automático
- ✅ Histórico completo de acesso

**Informações Registradas:**
- IP da máquina cliente
- Rota acessada
- Método HTTP
- Data e hora do acesso

### 🎨 **Interface e UX**
- ✅ Design responsivo e moderno
- ✅ Tema claro/escuro suportado
- ✅ Interface intuitiva e amigável
- ✅ Feedback visual em tempo real
- ✅ Validações no servidor com mensagens personalizadas
- ✅ Paginação customizada

---

## 🗄️ Estrutura do Banco de Dados

### Tabelas Principais

#### **users**
```
id: bigint (PK)
name: string
email: string (unique)
password: string (hashed)
created_at: timestamp
updated_at: timestamp
```

#### **clientes**
```
id: bigint (PK)
nome: string
created_at: timestamp
updated_at: timestamp
```

#### **fornecedores**
```
id: bigint (PK)
nome: string (50)
site: string
uf: string (2)
email: string (150)
deleted_at: timestamp (soft delete)
created_at: timestamp
updated_at: timestamp
```

#### **produtos**
```
id: bigint (PK)
nome: string (100)
descricao: text (nullable)
peso: integer (nullable)
preco_venda: float (8,2)
estoque_minimo: integer (default: 1)
estoque_maximo: integer (default: 1)
unidade_id: bigint (FK)
created_at: timestamp
updated_at: timestamp
```

#### **unidades**
```
id: bigint (PK)
unidade: string (5) - abreviação
descricao: string (30) - nome completo
created_at: timestamp
updated_at: timestamp
```

#### **site_contatos**
```
id: bigint (PK)
nome: string (50)
telefone: string (20)
email: string (80)
motivo_contato: integer (FK)
mensagem: text
created_at: timestamp
updated_at: timestamp
```

#### **motivo_contatos**
```
id: bigint (PK)
motivo_contato: string (20)
created_at: timestamp
updated_at: timestamp
```

#### **log_acessos**
```
id: bigint (PK)
log: string (200) - descrição do acesso (IP + rota)
created_at: timestamp
updated_at: timestamp
```

#### **password_reset_tokens**
```
email: string (PK)
token: string
created_at: timestamp
```

---

## 🌐 Rotas Disponíveis

### Rotas Públicas (Site)

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/` | Página inicial |
| GET | `/sobre-nos` | Página sobre a empresa |
| GET | `/contato` | Formulário de contato |
| POST | `/contato` | Processar contato |
| GET | `/login` | Página de login |
| POST | `/login` | Autenticar usuário |
| GET | `/registro` | Página de registro |
| POST | `/registro` | Criar novo usuário |
| GET | `/esqueceu-senha` | Solicitar recuperação |
| POST | `/esqueceu-senha` | Enviar link de recuperação |
| GET | `/redefinir-senha/{token}` | Formulário de redefinição |
| POST | `/redefinir-senha` | Salvar nova senha |

### Rotas da Aplicação (Protegidas por Autenticação)

#### **Clientes**
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/app/cliente` | Listar clientes |
| GET | `/app/cliente/adicionar` | Formulário para adicionar |
| POST | `/app/cliente/adicionar` | Salvar cliente |
| GET | `/app/cliente/editar/{id}` | Formulário para editar |
| PUT | `/app/cliente/editar/{id}` | Atualizar cliente |
| DELETE | `/app/cliente/excluir/{id}` | Excluir cliente |

#### **Fornecedores**
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/app/fornecedor` | Listar fornecedores |
| GET | `/app/fornecedor/adicionar` | Formulário para adicionar |
| POST | `/app/fornecedor/adicionar` | Salvar fornecedor |
| GET | `/app/fornecedor/editar/{id}` | Formulário para editar |
| PUT | `/app/fornecedor/editar/{id}` | Atualizar fornecedor |
| DELETE | `/app/fornecedor/excluir/{id}` | Excluir fornecedor |

#### **Produtos**
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/app/produto` | Listar produtos |
| GET | `/app/produto/adicionar` | Formulário para adicionar |
| POST | `/app/produto/adicionar` | Salvar produto |
| GET | `/app/produto/editar/{id}` | Formulário para editar |
| PUT | `/app/produto/editar/{id}` | Atualizar produto |
| DELETE | `/app/produto/excluir/{id}` | Excluir produto |

#### **Sistema**
| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/app/home` | Dashboard |
| GET | `/app/sair` | Fazer logout |

---

## 🛠️ Tecnologias Utilizadas

### Backend
- **Laravel 10.x** - Framework PHP moderno
- **PHP 8.1+** - Linguagem de programação
- **MySQL/MariaDB** - Banco de dados relacional
- **Eloquent ORM** - Mapeamento objeto-relacional
- **Blade** - Template engine

### Frontend
- **Tailwind CSS 3** - Framework de estilos utilitário
- **Vite 5** - Build tool e dev server ultra rápido
- **Alpine.js** - JavaScript reativo (opcional)
- **Axios** - Cliente HTTP

### Ferramentas
- **Composer** - Gerenciador de pacotes PHP
- **NPM** - Gerenciador de pacotes Node.js
- **Laravel Artisan** - CLI do Laravel
- **PHPUnit** - Framework de testes

---

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 8.1 ou superior
- Composer
- Node.js 16+
- MySQL 5.7+ ou MariaDB 10.2+
- Git

### Passo a Passo

1. **Clone o repositório**
```bash
git clone https://github.com/seu-usuario/App-Super-Gestao.git
cd App-Super-Gestao
```

2. **Instale as dependências PHP**
```bash
composer install
```

3. **Copie o arquivo de ambiente**
```bash
cp .env.example .env
```

4. **Configure o banco de dados em `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_super_gestao
DB_USERNAME=root
DB_PASSWORD=
```

5. **Gere a chave da aplicação**
```bash
php artisan key:generate
```

6. **Execute as migrations**
```bash
php artisan migrate
```

7. **Execute os seeders (opcional)**
```bash
php artisan db:seed
```

8. **Instale as dependências Node.js**
```bash
npm install
```

9. **Compile os assets**
```bash
npm run build
```

Para desenvolvimento com hot reload:
```bash
npm run dev
```

10. **Inicie o servidor**
```bash
php artisan serve
```

Acesse em: `http://localhost:8000`

---

## 📋 Controllers e Lógica

### PrincipalController
- Exibe página inicial com motivos de contato disponíveis
- Método: `principal()`

### ClienteController
- Gerencia todas operações com clientes
- Métodos: `index()`, `adicionar()`, `guardar()`, `editar()`, `atualizar()`, `destroy()`
- Validações: nome obrigatório, 3-40 caracteres

### FornecedorController
- Gerencia fornecedores com busca avançada
- Métodos: `index()`, `adicionar()`, `guardar()`, `editar()`, `update()`, `excluir()`
- Validações: email único, UF com 2 caracteres
- Busca por: nome, site, UF, email

### ProdutoController
- Gerencia produtos com relacionamento de unidades
- Métodos: `index()`, `adicionar()`, `guardar()`, `editar()`, `update()`, `excluir()`
- Eager loading com unidades
- Validações: peso inteiro, existência de unidade

### ContatoController
- Processa formulários de contato
- Métodos: `contato()`, `salvar()`
- Validações: nome único, email válido

### LoginController
- Autentica usuários
- Métodos: `index()`, `autenticar()`, `sair()`
- Hash de senha com BCRYPT

### RegistroController
- Permite novo registro de usuários
- Método: `cadastro()`

### SobreNosController
- Página sobre a empresa
- Registra acessos via middleware LogAcessoMiddleware

---

## 🔒 Middlewares

### AutenticacaoMiddleware
- Verifica se usuário está autenticado
- Valida perfil do usuário (padrao, visitante)
- Redireciona para login se não autenticado

### LogAcessoMiddleware
- Registra todos os acessos ao site
- Captura IP e rota acessada
- Armazena em `log_acessos`

---

## 📝 Modelos (Models)

### User
- Usuários do sistema
- Autenticação integrada

### Cliente
- Clientes da empresa
- Soft delete habilitado

### Fornecedor
- Fornecedores de produtos
- Soft delete habilitado
- Relacionamento com múltiplos produtos (potencial)

### Produto
- Produtos disponíveis
- Relacionamento com Unidade
- Campos de estoque e preço

### Unidade
- Unidades de medida dos produtos
- Relacionamento 1:N com Produtos

### SiteContato
- Contatos recebidos do website
- Relacionamento com MotivoContato

### MotivoContato
- Categorias de contato
- Relacionamento 1:N com SiteContato

### LogAcesso
- Registro de acessos ao sistema
- Auditoria de navegação

---

## 🎨 Views Principais

```
resources/views/
├── site/
│   ├── principal.blade.php          # Home page
│   ├── sobre-nos.blade.php          # Sobre a empresa
│   ├── contato.blade.php            # Contato
│   ├── login.blade.php              # Login
│   ├── registro.blade.php           # Registro
│   └── layouts/
│       ├── app.blade.php
│       └── _components/
│           └── form_contato.blade.php
├── app/
│   ├── home.blade.php               # Dashboard
│   ├── cliente.blade.php            # Listar clientes
│   ├── adicionarCliente.blade.php   # Formulário cliente
│   ├── editarCliente.blade.php      # Editar cliente
│   ├── fornecedor.blade.php         # Listar fornecedores
│   ├── adicionarFornecedor.blade.php # Formulário fornecedor
│   ├── editarFornecedor.blade.php   # Editar fornecedor
│   ├── produto.blade.php            # Listar produtos
│   ├── adicionarProdutos.blade.php  # Formulário produto
│   └── layouts/
│       └── app.blade.php
└── auth/
    ├── login.blade.php
    └── passwords/
        ├── email.blade.php
        └── reset.blade.php
```

---

## 🧪 Testando a Aplicação

### Teste 1: Acessar página inicial
```
GET http://localhost:8000
```
✅ Exibe home page com lista de motivos de contato

### Teste 2: Preencher formulário de contato
```
GET http://localhost:8000/contato
```
- Valida nome único
- Valida email
- Requer motivo
- Salva no banco

### Teste 3: Criar conta
```
GET http://localhost:8000/registro
POST http://localhost:8000/registro
```
- Email único
- Confirmação de senha
- Hash de senha seguro

### Teste 4: Fazer login
```
GET http://localhost:8000/login
POST http://localhost:8000/login
```
- Verifica email
- Valida senha com hash

### Teste 5: Acessar painel
```
GET http://localhost:8000/app/cliente
GET http://localhost:8000/app/fornecedor
GET http://localhost:8000/app/produto
```
✅ Requer autenticação (middleware)

### Teste 6: CRUD de clientes
```
POST http://localhost:8000/app/cliente/adicionar
PUT http://localhost:8000/app/cliente/editar/{id}
DELETE http://localhost:8000/app/cliente/excluir/{id}
```

---

## 📊 Diagrama de Relacionamentos

```
users (1) ──────────────── (N) password_reset_tokens

clientes

fornecedores (soft delete)

unidades (1) ──────────────── (N) produtos
                           (1) ──────────────── (N) produto_detalhes

motivo_contatos (1) ──────────────── (N) site_contatos

log_acessos
```

---

## ⚡ Performance e Otimizações

- ✅ Eager loading com Eloquent (->with())
- ✅ Paginação para grandes conjuntos de dados
- ✅ Índices em campos de busca
- ✅ Soft delete para manter histórico
- ✅ Cache de configurações
- ✅ Assets otimizados com Vite

---

## 🔒 Segurança

- ✅ Hash de senha com BCRYPT
- ✅ CSRF token em todos os formulários
- ✅ Validação de entrada no servidor
- ✅ SQL injection prevention (Eloquent)
- ✅ XSS protection (Blade escaping)
- ✅ Rate limiting (opcional)
- ✅ Log de acessos para auditoria

---

## 📚 Estrutura de Pastas

```
App-Super-Gestao/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Kernel.php
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
├── tests/
├── vendor/
├── .env.example
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

## 🚀 Desenvolvimento

### Criar nova Migration
```bash
php artisan make:migration create_tabela_table
```

### Criar novo Model
```bash
php artisan make:model NomeModelo
```

### Criar novo Controller
```bash
php artisan make:controller NomeController -r
```

### Executar testes
```bash
php artisan test
```

### Resetar base de dados
```bash
php artisan migrate:reset
php artisan migrate
```

---

## 📞 Contato e Suporte

Para dúvidas ou sugestões sobre o desenvolvimento, consulte:
- [Documentação Laravel](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vite](https://vitejs.dev/)

---

## 📄 Licença

MIT License - Você é livre para usar este projeto em seus projetos pessoais ou comerciais.

---

## 👨‍💻 Contribuições

Contribuições são bem-vindas! Por favor:
1. Faça um fork
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

---

**Desenvolvido com ❤️ usando Laravel 10 e Tailwind CSS**

*v1.0.0 - 2026*
