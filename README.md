# 🧩 Trabalho Final – Tópicos Especiais I: Sistema em Laravel

Este repositório contém a evolução da aplicação desenvolvida na **APS 3**, transformando uma estrutura inicial **MVC** em um **Sistema Web Completo** com autenticação, upload de arquivos e banco de dados relacional, conforme os requisitos do Trabalho Final da disciplina de **Tópicos Especiais I**.

---

## 📋 Requisitos Cumpridos

O projeto atende a **100% dos requisitos** solicitados:

| Requisito                  | Status | Implementação no Projeto                                                                                                   |
| -------------------------- | ------ | -------------------------------------------------------------------------------------------------------------------------- |
| **1. CRUD Completo**       | ✅      | Criação, Leitura, Edição e Exclusão de Produtos e Categorias.                                                              |
| **2. Banco Relacional**    | ✅      | Utilização de MySQL (via Docker), sem uso de SQLite.                                                                       |
| **3. Sessão / Login**      | ✅      | Sistema de Autenticação (Auth) nativo, protegendo as rotas de administração.                                               |
| **4. Upload de Arquivos**  | ✅      | Upload de imagens (PNG/JPG) no cadastro de Produtos, com validação e armazenamento via *storage*.                          |
| **5. Uso de Cookies**      | ✅      | Tema Escuro/Claro persistido via Cookie (60 minutos).                                                                      |
| **6. MVC e Boas Práticas** | ✅      | Estrutura Laravel (Models, Views, Controllers), validação com `$request->validate` e feedback ao usuário (Flash Messages). |

---

## 🚀 Tecnologias Utilizadas

* **Backend:** PHP 8.2+, Laravel 12.x
* **Banco de Dados:** MySQL 8.0 (via Docker)
* **Frontend:** Blade Templates, Bootstrap 5, FontAwesome
* **Ambiente:** Docker & Laravel Sail (opcional)

---

## 🛠️ Como Rodar o Projeto

Este projeto foi configurado para rodar com **Docker**, garantindo compatibilidade com MySQL.

---

### 1. Pré-requisitos

Certifique-se de ter instalado:

* PHP & Composer
* Node.js & NPM
* Docker Desktop (rodando)

---

### 2. Instalação

Clone o repositório e instale as dependências:

```bash
composer install
npm install
```

#### Configure o Ambiente

```bash
cp .env.example .env
php artisan key:generate
```

> O `.env` já vem configurado para conectar ao banco Docker
> (Host: `127.0.0.1`, Porta: `3306`, User: `sail`, Pass: `password`).

#### Suba o Banco de Dados (Docker)

```bash
docker-compose up -d
```

#### Prepare o Banco de Dados

```bash
php artisan migrate --seed
```

#### Link para Imagens (Storage)

```bash
php artisan storage:link
```

#### Compile os Assets (Frontend)

```bash
npm run build
```

---

### 3. Executando o Projeto

Inicie o servidor:

```bash
php artisan serve
```

Acesse no navegador:

**[http://localhost:8000](http://localhost:8000)**

---

## 🔑 Acesso ao Sistema

Use as credenciais geradas pelo *seeder*:

* **E-mail:** [admin@admin.com](mailto:admin@admin.com)
* **Senha:** 123456

---

## 📸 Funcionalidades em Destaque

* **Relacionamento:** Produtos vinculados a Categorias.
* **Upload Seguro:** Validação de tipo de imagem (PNG/JPG).
* **Persistência de Tema:** Preferência salva em *cookie* com duração de 60 min.
