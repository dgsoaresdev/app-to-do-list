<h1 align="center">Aplicação de Sistema de Tarefas</h1>
    <a href="https://diogosoares.com.br/projetos/laravel_asaas/public/" target="_blank"><img alt="Laravel Asaas" title="Laravel Asaas" src="https://github.com/dgsoaresdev/app-to-do-list/assets/25693566/21d1eafd-5d43-4375-a2b2-0e24ac20b322" width="100%" /></a>

<a href="https://diogosoares.com.br/projetos/app-todolist/public/" target="_blank">Acesse o projeto publicado</a>

<h4 align="center"> 
 Version 1.0 🚀 Concluído! 
</h4>

<p align="center">
  
  <img src="https://img.shields.io/static/v1?label=Languages&message=Laravel/PHP/JavaScript/CSS3/HTML5&color=blue&style=flat" />
  	
  <a href="https://twitter.com/DgSoaresTech">
    <img alt="Siga no Twitter" src="https://img.shields.io/twitter/url?url=https://twitter.com/DgSoaresTech">
  </a>
	
   <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
   
</p>


## 💻 Sobre o projeto
Sistema de gestão de tarefas, com quadro em Kanban


## 💻 Testando a aplicação 
A partir dos dados listados abaixo, você poderá realizar testes na aplicação - após a sua implantação em seu ambiente.

### Cadastro
- Faça o seu cadastro de usuário.
- Faça o login.
- Siga para a tela de tarefas.

### Tarefas
- Cadstre novas tarefas.
- Edite tarefas existentes.
- Troque os status das tarefas, por meio da interação Drag&Drop no quadro Kanban.
- Delete tarefas.


## 🛠 Tabelas do banco de dados
- Tabela "tarefas": Guarda os dados de todas as tarefas.
- Tabela "users": Guarda os dados cadastrais e de autenticação dos usuários.
  

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- Laravel 8
- PHP 8
- Composer 2
- PHP e MySQL
- Bootstrap
- HTML5 e CSS3
- JavaScript
- jQuery
- Ajax
- Hyper (Dashboard Kit UI)



## 🚀 Como rodar o projeto?

###Pré-requisitos
- PHP 8
- MySQL
- Apache
- Composer 2
- Node.Js
- npm


Também é bom ter um editor para trabalhar com o código como [VSCode][vscode]

### 🎲 Running 
```bash
## Clone este repositório. No terminal, execute:
$ git clone git@github.com:dgsoaresdev/app-to-do-list.git

## Acesse o diretório do projeto via terminal/cmd - No terminal, execute:
$ cd app-to-do-list

##Instale as dependências do projeto, via composer. No terminal, execute:
$ composer install

## Duplique o arquivo ".env.example" e renomeie a cópia para o nome .env
.env

## Crie um banco de dados MySQL sob um nome de sua escolha.
Ex: app_todolist

## Edite o novo arquivo .env com as credenciais do banco de dados criado
$ DB_CONNECTION=mysql
$ DB_HOST=127.0.0.1
$ DB_PORT=3306
$ DB_DATABASE=app_todolist #(Nome do banco de dados)
$ DB_USERNAME=root #(Nome de usuário do banco de dados)
$ DB_PASSWORD= #(Senha do usuário /banco de dados)

## Edite o novo arquivo .env com as credenciais de um servidor de e-mail SMTP
$ MAIL_MAILER=smtp
$ MAIL_HOST=crmplataforma.com
$ MAIL_PORT=465
$ MAIL_USERNAME=noreply@emailexemplo.com #(Endereço de e-mail que autenticará os envios)
$ MAIL_PASSWORD=12345678 #(Senha do e-mail)
$ MAIL_ENCRYPTION=SSL #(Protocolo SSL ou TLS)
$ MAIL_FROM_ADDRESS=noreply@emailexemplo.com #(Endereço de e-mail do remetente que enviará os envios)
$ MAIL_FROM_NAME="${APP_NAME}" #(Nome do remetente que enviará os envios)

## Faça a atualização dos caches. No terminal, execute:
$ php artisan config:cache

## Execute as migrations para que as tabelas da aplicação possam ser criadas no banco dados. No terminal, execute:
$ php artisan migrate

## Execute o para artisan serve para disponibilizar o a aplicação no seu servidor local. No terminal, execute:
$ php artisan serve

## Acesse a aplicação através da URL gerada pelo serve
ex: localhost:8000

```

## 📝 Licence

This project is licensed under the MIT license.

Made with ❤️ by Diogo Soares 👋🏽 [Contact me!](https://www.linkedin.com/in/dgsoares/)


