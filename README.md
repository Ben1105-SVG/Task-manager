<h2>Deployment instructions</h2>

1. задать конфиги базы в файле .env
2. задать VITE_API_BASE_URL=http://127.0.0.1:8000/api (если будете запускать проект через php artisan serve , в обратно случии просто http://test.local/api) в файле .env
3. <code>composer i</code>
4. <code>php artisan migrate</code>
5. <code>php artisan db:seed</code> чтобы создать фейковые данные
6. <code>npm i</code>
6. <code>php artisan serve </code>
6. <code>npm run dev </code>
