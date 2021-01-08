# Series API

Aplicação REST API para controlar episodios assistidos por serie e temporada.

## Download

    git clone https://github.com/felipemjesus/series-api.git

## Instalar

    cd series-api
    composer install

Verifique se existe o arquivo `.env`, caso não existe crie e copie o conteudo
do arquivo `.env.example`. E depois adicione uma chave no parâmetro JWT_KEY.

## Criar banco de dados (se escolher sqlite)

    composer run-script create-db-sqlite

## Criar tabelas no banco de dados

    php artisan migrate

## Adicionar usuário

    php artisan db:seed --class=UsersTableSeeder

## Executar aplicação

    php -S localhost:8000 -t public

# Recursos da API REST

Recursos disponíveis na API.

## Login de usuário

### Request

`POST /api/login`

    curl -i -H 'Accept: application/json' -d 'email=usuario@exemplo.com&password=exemplo' http://localhost:8000/api/login/

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    ["token" => "ano$#982&4h4f08374893205..."]

## Listar Series

### Request

`GET /series/`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/series/

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [{"id": 1, "nome": "Flash"}]

## Criar Serie

### Request

`POST /series/`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X POST -d 'nome=Flash' http://localhost:8000/series/

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /series/1
    Content-Length: 36

    {"id":1,"name":"Flash"}

## Visualizar Serie

### Request

`GET /series/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/series/1

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36

    {"id":1,"name":"Flash"}

## Visualizar Serie Não Existente

### Request

`GET /series/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/series/9999

### Response

    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35

    {"status":404,"reason":"Not found"}

## Atualizar Serie

### Request

`PUT /series/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X PUT -d 'nome=Flash 2' http://localhost:8000/series/1

### Response

    HTTP/1.1 200 Success
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 Success
    Connection: close
    Content-Type: application/json
    Location: /series/1
    Content-Length: 35

    {"id":1,"name":"Flash 2"}

## Remover Serie

### Request

`DELETE /serie/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X DELETE http://localhost:8000/series/1

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 74

    []

## Visualizar Episodios da Serie

### Request

`GET /serie/id/episodios`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/series/1/episodios

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 74

    [{"temporada": 1, "numero": 1, "assistido": false}]

## Listar Episodios

### Request

`GET /episodios/`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/episodios/

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [{"id": 1, "temporada": 1, "numero": 1, "assistido": false}]

## Criar Episodio

### Request

`POST /episodios/`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X POST -d 'temporada=1&numero=1&assistido=false&serie_id=1' http://localhost:8000/episodios/

### Response

    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /episodios/1
    Content-Length: 36

    {"id":1,"temporada": 1, "numero": 1, "assistido": false, "serie_id": 1}

## Visualizar Serie

### Request

`GET /episodios/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/episodios/1

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36

    {"id":1,"temporada": 1, "numero": 1, "assistido": false, "serie_id": 1}

## Visualizar Episodio Não Existente

### Request

`GET /episodios/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' http://localhost:8000/episodios/9999

### Response

    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35

    {"status":404,"reason":"Not found"}

## Atualizar Serie

### Request

`PUT /series/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X PUT -d 'temporada=1&numero=1&assistido=false&serie_id=1' http://localhost:8000/episodios/1

### Response

    HTTP/1.1 200 Success
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 Success
    Connection: close
    Content-Type: application/json
    Location: /episodios/1
    Content-Length: 35

    {"id":1,"temporada": 1, "numero": 1, "assistido": true, "serie_id": 1}

## Remover Episodio

### Request

`DELETE /episodios/id`

    curl -i -H 'Accept: application/json' -H 'Authorization: Baerer TOKEN' -X DELETE http://localhost:8000/episodios/1

### Response

    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 74

    []
