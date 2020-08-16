# Ponto Webapp

## Requisitos

PHP >= 7.4

Composer

## Instalação

Rodar o seguinte comando dentro da pasta do projeto 

`composer install`

Criar o arquivo `.env` com as configurações de conexão de banco

```
database.default.hostname = 
database.default.database = ponto_webapp
database.default.username = 
database.default.password = 
database.default.port = // se diferente de 3306

app.baseURL =  = // se diferente de http://localhost:8080
```

## Rodando o sistema

Rodar o seguinte comando dentro da pasta do projeto 

`php spark serve`

Se a url gerada for diferente de `http://localhost:8080`, a diretiva `app.baseURL` do `.env` deverá ser configurada com com a url informada no terminal.

Minimizar o terminal e rodar o sistema no navegador com a url informada.

## Acesso administrador

E-mail: admin@admin.com
Senha: 12345678

No login de administrador é possivel criar os usuários do sistema.
