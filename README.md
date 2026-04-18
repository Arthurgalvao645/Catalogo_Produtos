# 💼 Catálogo de Produtos

## 🎓 Análise e Preparação para o Desafio

Este projeto foi desenvolvido como resposta a um desafio técnico Full Stack com foco em organização arquitetural, boas práticas de desenvolvimento e performance.

### 📌 Objetivo
Este projeto foi desenvolvido como resposta a um desafio técnico Full Stack com foco em:
* Organização arquitetural.
* Boas práticas de desenvolvimento.
* Clareza na separação de responsabilidades.
* Performance e escalabilidade.
* Segurança.
* Qualidade de código.
* Capacidade analítica (SQL e arquitetura).

> **Premissa:** Mais do que implementar funcionalidades, o objetivo foi estruturar decisões técnicas de forma consciente e justificável.

---

## 🗺️ Índice
- [💼 Catálogo de Produtos](#-catálogo-de-produtos)
  - [🎓 Análise e Preparação para o Desafio](#-análise-e-preparação-para-o-desafio)
    - [📌 Objetivo](#-objetivo)
  - [🗺️ Índice](#️-índice)
  - [🏗️ Arquitetura Geral](#️-arquitetura-geral)
    - [Backend](#backend)
    - [Frontend](#frontend)
  - [🛠️ Como Rodar o Projeto](#️-como-rodar-o-projeto)
    - [Pré-requisitos](#pré-requisitos)
    - [1. Configuração do Backend](#1-configuração-do-backend)
    - [2. Configuração do Frontend](#2-configuração-do-frontend)
    - [📁 Plano de Ação (Documentação Técnica)](#-plano-de-ação-documentação-técnica)
    - [🔐 Segurança Aplicada](#-segurança-aplicada)
    - [⚡ Performance e Escalabilidade](#-performance-e-escalabilidade)
    - [📦 Funcionalidades Implementadas](#-funcionalidades-implementadas)
      - [1️⃣ CRUD de Produtos](#1️⃣-crud-de-produtos)
      - [2️⃣ Página de Finalização de Compra (Checkout)](#2️⃣-página-de-finalização-de-compra-checkout)
    - [🗄️ Análises SQL (Eloquent)](#️-análises-sql-eloquent)
    - [🧩 Análise Crítica de Código](#-análise-crítica-de-código)
    - [🎯 Decisões Arquiteturais e Justificativa da Stack](#-decisões-arquiteturais-e-justificativa-da-stack)
    - [🚀 Conclusão e Melhorias Futuras](#-conclusão-e-melhorias-futuras)
      - [Melhorias Futuras](#melhorias-futuras)

---

## 🏗️ Arquitetura Geral

### Backend
* **Framework:** Laravel 10+.
* **Tipo:** API RESTful.
* **Segurança:** Autenticação protegendo rotas sensíveis (Laravel Sanctum).
* **ORM:** Eloquent.
* **Estrutura:** Baseada em responsabilidades claras (MVC + Services).

### Frontend
* **Framework:** Vue.js 3.
* **Tipo:** SPA (Single Page Application) com consumo de API REST.
* **Organização:** Componentização e controle de estado local.
* **UX:** Validações robustas e feedback visual para o usuário.

---

## 🛠️ Como Rodar o Projeto

### Pré-requisitos
* PHP >= 8.2
* Composer
* Node.js >= 18
* MySQL ou MariaDB

### 1. Configuração do Backend
```bash
# Clone o repositório
git clone <url-do-repositorio>
cd <nome-do-projeto>/backend

# Instale as dependências
composer install

# Configure o arquivo .env
cp .env.example .env
# Preencha as credenciais do banco de dados no .env

# Gere a chave da aplicação e execute as migrations
php artisan key:generate
php artisan migrate --seed

# Inicie o servidor
php artisan serve
``` 

### 2. Configuração do Frontend
```bash
cd ../frontend

# Instale as dependências
npm install

# Configure o arquivo .env
cp .env.example .env
# Defina VITE_API_BASE_URL=http://localhost:8000/api

# Inicie o servidor de desenvolvimento
npm run dev
```

### 📁 Plano de Ação (Documentação Técnica)
Esta seção detalha o planejamento e a execução de cada etapa do desafio, baseando-se na estrutura de arquivos do repositório.

* [1. Oportunidade](./plano-de-acao/1-oportunidade.md)
* [2. Teste Técnico](./plano-de-acao/2-teste-tecnico.md)
* [3. Análise Estratégica](./plano-de-acao/3-analise-estrategica.md)
* [4. Análise Prática](./plano-de-acao/4-analise-pratica.md)
* [5. Questões 1 a 4](./plano-de-acao/5-questao-1-a-4.md)
* [6. Questões 5 a 8](./plano-de-acao/6-questao-5-a-8.md)
* [7. Questões 9, 11 e 13](./plano-de-acao/7-questao-9-11-13.md)
* [8. Questões 14 e 15 (SQL)](./plano-de-acao/8-questao-14-15.md)
* [9. Questões 10 e 12 (CRUD e Checkout)](./plano-de-acao/9-questao-10-12.md)

---

### 🔐 Segurança Aplicada
Foram consideradas as seguintes práticas:
1.  **Autenticação obrigatória** para operações de modificação (create, update, delete).
2.  **Middleware de proteção** de rotas.
3.  **Validação server-side** rigorosa (FormRequests).
4.  **Controle de permissões** e prevenção contra acesso indevido a recursos.
5.  **Tratamento seguro** de upload de imagem.



---

### ⚡ Performance e Escalabilidade
Durante a análise técnica, foram considerados:
* Uso de **Eager Loading** (`with()`) para evitar o problema de N+1.
* Uso de **agregações no banco** ao invés de processamento em memória.
* Uso de **índices** para consultas agregadas e ordenação adequada em consultas analíticas.
* Subqueries otimizadas para média e comparação.

> **Evolução Arquitetural:** O sistema foi desenhado para evoluir para Rate limiting, Cache estruturado (Memcached/Redis) e monitoramento.

---

### 📦 Funcionalidades Implementadas

#### 1️⃣ CRUD de Produtos
* **Campos:** Nome, Descrição, Preço, Imagem.
* **Regras:** Apenas usuários autenticados podem modificar dados.
* **Técnico:** Validação completa no backend e interface reativa no frontend.

#### 2️⃣ Página de Finalização de Compra (Checkout)
* Produtos *hardcoded* no carrinho.
* Alteração dinâmica de quantidade.
* **Validações:** Formatos de E-mail, Telefone, Cartão, Data, CVC e CEP.
* **UX:** Busca automática de endereço via CEP (`cep-promise`), indicadores de carregamento e mensagem de sucesso.
* **Debug:** Exibição do objeto final no console ao finalizar pedido.



---

### 🗄️ Análises SQL (Eloquent)
Queries desenvolvidas com foco em eficiência, clareza e redução de processamento:
1.  Estados com maior volume de vendas.
2.  Top 5 clientes com maior valor total.
3.  Produtos com estoque abaixo da média.
4.  Fornecedores com produtos acima da média da categoria.
5.  Produtos recentes de fornecedores do Brasil com estoque acima da média.

---

### 🧩 Análise Crítica de Código
Análise de um transformer que acessava múltiplas relações, identificando:
* Risco de N+1 e acoplamento excessivo.
* Ausência de *null safety* e separação de responsabilidade.

> **Melhorias Sugeridas:** Eager loading, uso de Resource classes, padrão defensive programming e implementação de DTOs.

---

### 🎯 Decisões Arquiteturais e Justificativa da Stack
As decisões priorizaram manutenibilidade e escalabilidade futura:
* **Tailwind CSS + LESS:** Decisão de usar Tailwind para Layout/Responsividade e LESS para variáveis globais e customizações estruturais, garantindo maior controle visual e alinhamento com Vue moderno.
* **MVP:** Implementar o MVP corretamente garantindo uma base sólida.
* **Modelagem:** Performance começa na modelagem do banco.



---

### 🚀 Conclusão e Melhorias Futuras
Este projeto foi conduzido como exercício de arquitetura, focando na demonstração de pensamento pleno e estruturação profissional de soluções.

#### Melhorias Futuras
* Implementação de Cache estruturado (Redis/Memcached).
* Uso de Filas (Queues) para envio de e-mails ou processamento pesado.
* Escalonamento horizontal.
* Monitoramento de erros.
* Decomposição em serviços (Microservices) se necessário.
