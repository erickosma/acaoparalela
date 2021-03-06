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

``` docker-compose up nginx mysql ```

Crie o schemas ``default`` e ``test`` ou os que estiverem configurados no seu .env 



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

php artisan db:seed
docker-compose exec workspace  php artisan db:seed 


docker-compose exec workspace npm install
npm run dev
docker-compose exec workspace npm run dev 
 
docker-compose exec workspace npm run watch

# jwt
php artisan jwt:secret


```

##psalm
Psalm is a static analysis tool for finding errors in PHP

https://psalm.dev/docs/

```
./vendor/bin/psalm --init

./vendor/bin/psalm
```


```
docker-compose exec workspace composer  require --dev vimeo/psalm
```

### Sonar 

https://laradock.io/documentation/#install-sonarqube-automatic-code-review-tool

1 - Open the .env file

2 - Search for the SONARQUBE_HOSTNAME=sonar.example.com argument

3 - Set it to your-domain sonar.example.com

4 - docker-compose up -d sonarqube

5 - Open your browser: http://localhost:9000/



### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)






