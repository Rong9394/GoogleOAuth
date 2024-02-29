# Laravel Socialite/Google SSO Example

### Install dependencies

```
composer install && npm i
```

#### Run a hot-reloading server for static assets:
```
npm run dev
```

#### or create a production ready build:
```
npm run build
```

#### Run the web server

```
php artisan serve
```

Note that you will need to update your .env file to contain the client ID and client secret values, which can be generated in the Google Cloud Dashboard.
```
GOOGLE_CLIENT_ID=...
GOOGLE_CLIENT_SECRET=...
```
