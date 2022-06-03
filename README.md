## Installation
#### Copy repository
```bash
git clone https://github.com/Borouch/AMS-teltonika.git
```

Move into the project directory
```bash
cd project_path
```

#### Install laravel dependencies
```bash
composer update #installs all required dependencies
```

#### install node dependencies
```bash
npm install
```

#### Configuration
Make a copy of `.env.example` and rename it to ``.env``

Inside .env file specify your local database configuration. This will allow laravel to access your local database.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=
DB_PASSWORD= 
```

In order to be notified when new company is created specify email configurations :

```bash
MAIL_MAILER=smtp  
MAIL_HOST=smtp.gmail.com  
MAIL_PORT=587  
MAIL_USERNAME=*Email username*  
MAIL_PASSWORD=*Email generated app password*  
MAIL_ENCRYPTION=tls  
MAIL_FROM_ADDRESS=*Email address from which emails will be sent*  
MAIL_FROM_NAME="${APP_NAME}"
```


Configure admin credentials according to which admin user will be created during the seeding of database. Defaut values are:
```bash
ADMIN_EMAIL=admin@admin  
ADMIN_PASSWORD=password
```

#### Initiate migrations and seed the databse
**Note**: database server must be started to initiate migrations

```bash
php artisan migrate:fresh --seed
```

#### Start laravel server
```bash
php artisan serve
```

#### Start node server
```bash
npm run hot
```

