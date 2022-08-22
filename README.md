BACKEND
instalación previa: instalar servidor con php +7 y composer para gestionar dependencias del proyecto laravel.

1. git clone https://github.com/burguesaroca/ecommerce.git
2. cd ecommerce
3. composer i
4. cp .env.example .env
5. configurar variables de entorno en el .env

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=XXXXXX

6. php artisan migrate --seed