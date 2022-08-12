# Aplicação de Busca de valor de criptomoedas

Essa aplicação disponibiliza dois endpoints para busca do valor atual ou de uma data específica de uma cripitomeoda.

## O servidor está disponível para requisições pela url

heroku url

## Endpoints

1- Endpoint de busca do valor da criptomoeda na data atual "/coin_price"

O corpo da requisição espera o nome/codigo da criptomoeda.

Exemplo de nomes: "bitcoin", 

Exemplo de requisição:

```sh
{
    "name" : "bitcoin"
}
```

2- Endpoint de busca do valor da criptomoeda em uma data específica "coin_price_date"

Exemplo de nomes: "bitcoin", 

Exemplo de data: "11-08-2022"

Exemplo de requisição

```sh
{
    "name" : "bitcoin",
    "date" : "11-08-2022"
}
```

## Executar localmente

Realizar a clonagem do repositório e instalar as dependências.

```sh
git clone git@github.com:yuridreis/crypto-search.git
composer install
```

Realizar a criação da tabela no banco de dados

```sh
php artisan migrate
```

Inicializar o servidor

```sh
php artisan serve
```

O servidor estará aberto para requisições http na url http://127.0.0.1:8000/coin_price


