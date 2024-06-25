# Laravel 11 com Docker Setup

Este repositório contém um setup básico para rodar um projeto Laravel 11 utilizando Docker com PHP 8.3, Nginx, MySQL, Redis, Mailpit e Minio.

## Requisitos

- Docker
- Docker Compose

## Configuração

### Passo 1: Clonar o Repositório

```sh
git clone https://github.com/diego-ronan-felix/setup-laravel11-docker.git
```

### Passo 2: Acessar o projeto

```sh
cd setup-laravel11-docker
```

### Passo 3: Gerar o arquivo .env

```sh
cp .env.example .env
```

### Passo 4: Adicionar as variáveis de ambiente no .env

```sh
APP_NAME="Nome que você desejar"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_voce_desejar
DB_USERNAME=root
DB_PASSWORD=senha_que_voce_desejar

REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MINIO_ROOT_USER=seu_usuario_para_o_minio
MINIO_ROOT_PASSWORD=sua_senha_para_o_minio
```

### Passo 5: Subir os contêineres 

```sh
docker-compose up -d
```

### Passo 6: Acessar o container da aplicação

```sh
docker-compose exec app bash
```

### Passo 7: Instalar as dependências do projeto

```sh
composer install
```

### Passo 8: Gerar a key do projeto laravel

```sh
php artisan key:generate
```

### Passo 9: Rodar as migrations 

```sh
php artisan migrate
```

### Passo 10: Acessar a aplicação, o mailpit e minio no browser

```sh
localhost
localhost:8025
localhost:9001
```


