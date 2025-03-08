# Subir o container (construindo a imagem, se necessário, e rodando em segundo plano)
docker compose up --build -d  

# Acessar o container do PHP-FPM
docker exec -it monitor-php-fpm-1 sh  

# Rodar as migrations no Laravel
php artisan migrate  
