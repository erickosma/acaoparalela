# Ação paralela

<p align="left">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

<p align="left">
Ferramenta web que tem como propósito promover o encontro  solidário entre Organizações Não Governamentais (ONG ́s) e voluntários 
</p>



## Como rodar 

Pode ser rodado pelo laradock 
https://laradock.io/getting-started/

``` git submodule add https://github.com/Laradock/laradock.git ```

``` cp env-example .env ```

``` cd laradock/ ```

``` docker-compose up -d nginx mysql ```




## Instalar 

logar no servidor para executar comandos php 

```docker-compose exec workspace bash ```

```shell script
composer install 
docker-compose exec workspace composer install

php artisan key:generate
docker-compose exec workspace php artisan key:generate

php artisan migrate
docker-compose exec workspace php artisan migrate
 
```




### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)






