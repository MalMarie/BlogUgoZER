# About this Blog


This blog is a technical test for the company ugoZER

It is developed with Laravel 11(lastest version) for the Back-end, and Vue.js 3 and Tailwind for the Front-end.

## Pour clôner le projet
```
- git clone git@github.com:MalMarie/BlogUgoZER.git
- composer install
- npm install vue
- npm install tailwindcss
- npm install  @vitejs/plugin-vue
- npm install laravel-vite-plugin
- npm install -D postcss-import
- npm install vue-router@next
- npm install laravel-mix
```
__Modifier le .env selon vos identifiants__
```
- php artisan migrate
->Yes (pour créer la base de données)
```
- Seeder uniquement sur Article : 

```php artisan db:seed --class=ArticleSeeder```
- Ouvrir un second terminal et copier cette ligne et faire entrer : 

```php artisan serve```
- Ouvrir un troisième terminal et copier cette ligne et faire entrer :

```npm run dev```

Aller sur l’url : 
[http://localhost:8000](http://localhost:8000)
