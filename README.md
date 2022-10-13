## Run Locally

### 1. Clone repo

```
$ git clone git@github.com/kamilkahar90/sms-queue.git
$ cd test-laravelapp
```

### 2. Setup Environment

-   Download XAMPP/WAMP, Composer, Node.js

```
$ composer global require laravel/installer
$ cp .env.example .env
$ php artisan key:generate
```

### 3. Install Dependencies

```
$ composer install
```

### 4. Generate database

-   Create database name : sms_queue

```
$ php artisan migrate
```

### 5. Run Project

```
First Terminal
$ php artisan serve
Second Terminal
$ php artisan queue:work
```
