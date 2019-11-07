
## Requirements for Laravel 6.5 HQRentalApp project


- [PHP>=7.2.0](https://www.php.net/downloads.php#v7.2.24)
- [MySQL>=5.7.0](https://dev.mysql.com/downloads/mysql/5.7.html)

-----------------------------------------------------------------------------------

## Setup HQRentalApp project from Github


Open Terminal

```bash
git clone https://github.com/Lsickle/HQRentalApp 
cd HQRentalApp
```

Run composer to install all dependencies
```bash
composer install
```

Copy .env.example to .env
```bash
cp .env.example .env
```

Change the following fields in the .env file: (change database connection properly) 
``DB_CONNECTION=mysql``
``DB_HOST=127.0.0.1``
``DB_PORT=3306``
``DB_DATABASE=dbname``
``DB_USERNAME=dbuser``
``DB_PASSWORD=dbpassword``
(optional)
``MAIL_DRIVER=smtp``
``MAIL_HOST=smtp.mailtrap.io``
``MAIL_PORT=2525``
``MAIL_USERNAME=6a878fba8be67d``
``MAIL_PASSWORD=80fc318bd5a90c``
``MAIL_ENCRYPTION=null``


From terminal run:
```bash
php artisan key:generate
php artisan config:clear
```

Init data to database
```bash
php artisan migrate
php artisan db:seed
```

Or Refresh database
```bash
php artisan migrate:fresh --seed
```

Build the styles and scripts (command: dev / production)
```bash
npm run production
```

The test User credentials are:

```bash
Username: recruitment@hqrentalsoftware.com
Password: 1234
```


## Starting the Laravel Scheduler

Let’s setup the Cron Jobs to run automatically without initiating manually by running the command. 
```bash
php artisan command:SendReport 2 --queue==default
```

To start the Laravel Scheduler itself, we only need to add one Cron job which executes every minute. Go to your terminal, ssh into your server, cd into your project and run this command.


```bash
crontab -e
```


This will open the server Crontab file, paste the code below into the file, save and then exit.

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

Do not forget to replace /path/to/artisan with the full path to the Artisan command of your Laravel Application.
-----------------------------------------------------------------------------------

## SETUP CUSTOM BRANCH IN REMOTE REPOSITORY (optional for development environment)

```bash
git checkout -b <YourBranchName>
npm run dev
```

