## Descrição do Trabalho
Este projeto é um sistema de gerenciamento de concessionária, feito com PHP + MySQL, que usa o modelo CRUD (Criar, Ler, Editar e Excluir).
O sistema permite controlar:

**Funcionários**
**Clientes**
**Marcas**
**Modelos de veículos**
**Vendas**

Cada uma dessas partes possui páginas para cadastrar, listar, editar e excluir registros.

## Requisitos e Configuração
Requisitos
**XAMPP ou WAMP (para rodar PHP e MySQL)**
**Navegador (Chrome, Edge etc.)**
**Banco de dados MySQL**

## Instalar e rodar o servidor

Instale XAMPP, e abra o Painel de Controle.
Inicie: Apache, MySQL. Acesse no navegador: http://localhost/phpmyadmin, clique em criar banco de dados use o nome do banco do projeto (ex.: concessionaria)

Cada tabela tem seus campos de identificação (ID), nome, dados pessoais e relações com outras tabelas.

## Colocar os arquivos na pasta certa

Vá até: *C:\xampp\htdocs* depois crie uma pasta com o nome do seu projeto coloque todos os arquivos PHP e pastas dentro dela.
Abra o navegador e digite: http://localhost/nome_da_pasta_do_projeto o sistema abrirá o index.php, que é responsável pelo menu e pelo carregamento das páginas.

## Funcionalidade do CRUD

**Cadastrar** O sistema recebe dados de formulários e salva no banco com insert
**Listar** Mostra todos os registros usando select
**Editar** Carrega os dados pelo ID, o usuário altera e o sistema usa update
**Salvar** Essa funcionalidade e que salvar ou editar tudo no sistema usando update ou delete

### Fluxograma - Operação CRUD Completa de Funcionário

```
                    ┌─────────────┐
                    │   INÍCIO    │
                    └──────┬──────┘
                           │
                           ▼
                    ┌──────────────────┐
                    │  CONECTAR AO BD  │
                    └──────┬───────────┘
                           │
                           ▼
                    ┌────────────────────┐
                    │ RECEBER AÇÃO (page)│
                    └──────┬─────────────┘
                           │
        ┌──────────────────┼──────────────────┐
        │                  │                  │
        ▼                  ▼                  ▼
   ┌────────┐        ┌────────┐        ┌────────┐
   │CADASTRO│        │ LISTAR │        │ EDITAR │
   └───┬────┘        └───┬────┘        └───┬────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│ RECEBER     │  │ SELECT *    │  │ SELECT pelo │
│ DADOS FORM  │  │ FROM        │  │ ID          │
└──────┬──────┘  └──────┬──────┘  └──────┬──────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│ INSERT INTO │  │ EXIBIR      │  │ RECEBER     │
│ TABLE       │  │ TABELA      │  │ DADOS FORM  │
└──────┬──────┘  └──────┬──────┘  └──────┬──────┘
       │                 │                 │
       ▼                 ▼                 ▼
┌─────────────┐         │          ┌─────────────┐
│ SUCESSO?    │         │          │ UPDATE SET  │
└───┬─────┬───┘         │          └──────┬──────┘
    │SIM  │NÃO          │                 │
    │     │             │                 ▼
    │     │             │          ┌─────────────┐
    │     │             │          │ SUCESSO?    │
    │     │             │          └───┬─────┬───┘
    │     │             │          SIM │     │ NÃO
    │     │             │             │     │
    ▼     ▼             ▼             ▼     ▼
┌──────────┐      ┌────────┐    ┌──────────┐
│MENSAGEM  │      │EXIBIR  │    │MENSAGEM  │
│SUCESSO   │      │RESULT. │    │SUCESSO   │
└────┬─────┘      └───┬────┘    └────┬─────┘
     │                │              │
     └────────────────┼──────────────┘
                      │
                      ▼
              ┌───────────────┐
              │ REDIRECIONAR  │
              │ PARA LISTAGEM │
              └───────┬───────┘
                      │
                      ▼
                 ┌─────────┐
                 │   FIM   │
                 └─────────┘

         ┌──────────────┐
         │   EXCLUIR    │
         └──────┬───────┘
                │
                ▼
         ┌──────────────┐
         │ DELETE WHERE │
         │ ID = ?       │
         └──────┬───────┘
                │
                ▼
         ┌──────────────┐
         │  SUCESSO?    │
         └───┬─────┬────┘
         SIM │     │ NÃO
             │     │
             ▼     ▼
      ┌──────────┐
      │ MENSAGEM │
      └────┬─────┘
           │
           ▼
      ┌──────────┐
      │  FIM     │
      └──────────┘
```

### Fluxograma - Fluxo de Navegação do Sistema

```
                    ┌─────────────┐
                    │  index.php  │
                    └──────┬──────┘
                           │
                           ▼
                    ┌──────────────────┐
                    │  Menu Principal  │
                    └──────┬───────────┘
                           │
        ┌──────────────────┼──────────────────┬──────────────────┐
        │                  │                  │                  │
        ▼                  ▼                  ▼                  ▼
   ┌─────────┐       ┌─────────┐       ┌─────────┐       ┌─────────┐
   │FUNCIONÁR│       │ CLIENTE │       │  MARCA  │       │  VENDA  │
   └────┬────┘       └────┬────┘       └────┬────┘       └────┬────┘
        │                 │                 │                 │
   ┌────┴────┐       ┌────┴────┐       ┌────┴────┐       ┌────┴────┐
   │Cadastrar│       │Cadastrar│       │Cadastrar│       │Cadastrar│
   │Listar   │       │Listar   │       │Listar   │       │Listar   │
   │Editar   │       │Editar   │       │Editar   │       │Editar   │
   │Excluir  │       │Excluir  │       │Excluir  │       │Excluir  │
   └────┬────┘       └────┬────┘       └────┬────┘       └────┬────┘
        │                 │                 │                 │
        └─────────────────┼─────────────────┴─────────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │  salvar-*.php│
                    └──────┬──────┘
                           │
                           ▼
                    ┌─────────────┐
                    │  BANCO DE   │
                    │   DADOS     │
                    └─────────────┘
```

---