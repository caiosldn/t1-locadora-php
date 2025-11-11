# T1 - Sistema de Locadora de Filmes (WEB 2)

Este projeto é um sistema web completo para gerenciamento de uma locadora, desenvolvido em PHP puro, atendendo aos requisitos do Trabalho 1 da disciplina de Desenvolvimento WEB 2.

## Funcionalidades Implementadas

* **Autenticação de Usuários:** Cadastro, Login e Logout (usando Sessões).
* **Recuperação de Senha:** Fluxo simulado para redefinição de senha.
* **CRUD de Filmes:** Sistema completo para Criar, Ler, Atualizar e Excluir filmes do catálogo.
* **Geração de Relatórios:** Emissão de um relatório em PDF com a lista de filmes.
* **Segurança:**
    * Proteção contra SQL Injection (usando PDO e Prepared Statements).
    * Armazenamento seguro de senhas (usando `password_hash`).
    * Proteção contra XSS (usando `htmlspecialchars`).
    * Validação de formulários no front-end e back-end.

## Como Executar o Projeto

1.  **Servidor Local:** Instale um ambiente como o **XAMPP**.
2.  **Serviços:** Inicie os módulos **Apache** e **MySQL**.
3.  **Arquivos:** Clone ou baixe este repositório e coloque a pasta `locadora` dentro do diretório `C:\xampp\htdocs\`.
4.  **Banco de Dados:**
    * Abra o **phpMyAdmin** (`http://localhost/phpmyadmin`) ou **MySQL Workbench**.
    * Crie um novo banco de dados chamado `locadora`.
    * Selecione o banco `locadora` e importe o arquivo `locadora.sql` (incluso neste repositório).
5.  **Acesso:** Abra seu navegador e acesse `http://localhost/locadora/`.
