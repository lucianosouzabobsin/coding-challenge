# Coding Challenge

Disponibiliza uma API REST com o endpoint que traz o ranking de um determinado movimento, trazendo o nome do movimento e uma lista ordenada com os usuários, seu respectivo recorde pessoal (maior valor), posição e data.

## Token

Esta API funciona somente com autorização de token. Para enviar o token na solicitação, você pode fazer isso enviando um atributo api_token no payload ou como um token no header:

|---|---|
| `Token` | 0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT |

Authorization: Bearer 0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT

## Métodos
Requisições para a API devem seguir os verbos:
| Método | Descrição |
|---|---|
| `GET` | Retorna informações dos registros. |

## Respostas

| Código | Descrição |
|---|---|
| `200` | Requisição executada com sucesso (success).|
| `401` | Dados de acesso inválidos (Unauthenticated).|
| `404` | Registro pesquisado não encontrado (Resource not found).|


## Tecnologias

* Laravel Framework 7.30.4
* Mysql-5.7
* Docker

## Serviços Usados

* Github
* Postman

## Getting started

* Para criar o ambiente Docker e o container:
>    $ cd docker
* Instale o ambiente:
>    $ docker-compose up -d
* Edite o arquivo hosts e adicione a linha abaixo na fila de links para executar como challenge.local:
>    $ sudo nano /etc/hosts
>
>    127.0.1.1       challenge.local
* Acesse o bash do container:
>    $ docker exec -it challenge bash
* Dentro do bash, execute os seguintes comandos para criar o banco de dados e suas migrations e seeders:
>
>    $ cd challenge/
>
>    $ php artisan db:create
>
>	 $ php artisan migrate
>
>	 $ php artisan db:seed
>
* Checar os testes
>    $ composer test

## Como usar

Você pode usar o Postman para utilizar esta API.


## Recursos

### Listar por Movimento

 A lista de movimento, utiliza como parametro o id do movimento, sendo este parametro:

 movement - integer

#### Request

`GET /api/list.records/`

    curl --location --request GET 'http://challenge.local/api/list.records?movement=2' \ --header 'Authorization: Bearer 0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT'

## Versionamento

1.0.0.0

## Links

Link do ambiente Docker montado com Apache, PHP7.2 e Mysql utilizado:
* [**lucianobobsin/apache-php7.2-cli**](https://hub.docker.com/repository/docker/lucianobobsin/apache-php7.2-cli)
* [**lucianobobsin/mysql-5.7**](https://hub.docker.com/repository/docker/lucianobobsin/mysql-5.7)

## Autor

* **Luciano Bobsin**: @lucianosouzabobsin (https://github.com/lucianosouzabobsin)
