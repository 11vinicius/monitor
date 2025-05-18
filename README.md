# 🐄 API de Gerenciamento de Rebanho de Gado

Esta é uma API RESTful desenvolvida com **Laravel**, utilizando **PostgreSQL** como banco de dados, **Docker** para ambiente de desenvolvimento e **TDD** como abordagem principal de desenvolvimento.

---

## 🚀 Tecnologias Utilizadas

- [Laravel 10.x](https://laravel.com/)
- [PHP 8.x](https://www.php.net/)
- [PostgreSQL](https://www.postgresql.org/)
- [Docker & Docker Compose](https://docs.docker.com/)
- [Pest](https://pestphp.com/) (para testes)
- [Composer](https://getcomposer.org/)

---

## 📦 Instalação com Docker

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seu-usuario/rebanho-api.git
   cd monitor

2. **Subir o container (construindo a imagem, se necessário, e rodando em segundo plano)**
    ```bash
    # Inicia container
    docker compose up --build -d  

    # Acessar o container do PHP-FPM
    docker exec -it monitor-php-fpm-1 sh  

    # Rodar as migrations no Laravel
    php artisan migrate  

    # Rodar os testes
    docker-compose exec app ./vendor/bin/pest

## 🐮 Funcionalidades da API

- Cadastro de propeiedades
- Cadastro de animais
- Registro de nascimento e compra
- Controle de vacinação
- Gerenciamento de pesagens
- Relatórios de crescimento e produtividade
- Histórico de eventos por animal
- Controle de venda ou descarte