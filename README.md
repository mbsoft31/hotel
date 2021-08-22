

git clone https://github.com/mbsoft31/hotel.git hotel

cd hotel

-- edit .env file DB_PASSWORD=root to DB_PASSWORD= (empty)

composer install

npm install

npm run dev

php artisan migrate:fresh --seed

php artisan serve