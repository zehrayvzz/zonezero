## ZoneZero example 
Laravel application with admin and user guard.
## Getting this app up and running

- Make sure you already have [xampp](https://www.apachefriends.org/index.html) installed (easy to use).

- [Clone](https://github.com/zehrayvzz/zonezero.git) this repository to your local machine or just download the zip from the above green button.

- Install [Composer](https://getcomposer.org/download) first, then run this command in your command-line (you should be inside your project directory). 
```bash
  composer install
```

- Rename .env.example to .env and add your database.

- Generate application key.

```bash
    php artisan jwt:secret
```

- Create tables.

```bash
    php artisan migrate
```

- Start the development server.

```bash
    php artisan serve
```

- Create a default teacher.

```bash
    php artisan db:seed
```

### Default Admin Credentials.
- Email: admin@mail.com
- password: 123456

### Default User Credentials.
- TC Kimlik No: 12345678912
- password: 123456

