# APS 3 – Laravel (Tópicos Especiais)

## 🎯 Objetivo
Esta aplicação foi desenvolvida como parte da **APS 3** da disciplina **Tópicos Especiais em Sistemas de Informação**.  
O objetivo é praticar o padrão **MVC (Model-View-Controller)** no **Laravel**, criando uma estrutura básica com rotas, controllers, views e integração com banco de dados.

---

## 🧩 Funcionalidades

- Criação e listagem de **Produtos**
- Criação e listagem de **Categorias**
- Formulários com validação de dados
- Exibição de mensagens de sucesso e erro
- Separação entre **lógica de controle** e **apresentação (Blade)**

---

## ⚙️ Estrutura

### 🗂 Controllers
- `ProdutoController` — responsável pelas ações de produtos (`index` e `store`)
- `CategoriaController` — responsável pelas ações de categorias (`index` e `store`)

### 🧱 Models e Migrations
- `Produto` (nome, descrição, preço)
- `Categoria` (nome, descrição)

### 🖼 Views (Blade)
- `resources/views/produtos/index.blade.php`
- `resources/views/categorias/index.blade.php`
- `resources/views/layouts/app.blade.php` (layout base com Bootstrap)

### 🔗 Rotas
Definidas em `routes/web.php`:
```php
GET  /produtos   → ProdutoController@index
POST /produtos   → ProdutoController@store
GET  /categorias → CategoriaController@index
POST /categorias → CategoriaController@store
