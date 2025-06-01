# Installation

```
git clone <project>
cp .env.example .env
compléter le .env
npm install
composer install
php artisan migrate
php artisan db:seed
npm run dev 
php artisan serve
```

# Routes
- /
- /test
- /dashboard
- /apiKeys
- /playlists
- /api/user
- /api/playlists


curl -X GET -H "x-api-key: API_KEY" http://127.0.0.1:8000/api/playlists
remplacer API_KEY avec une clé api de la base