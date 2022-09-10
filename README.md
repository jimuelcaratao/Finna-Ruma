# Finna Ruma

---

## A beginner's guide to clone from github.

-   go to `This PC -> Local Disk (C:) -> xampp -> htdocs` folder.

![Screenshot 2020-10-30 215333](https://user-images.githubusercontent.com/61103022/97713413-c12c8a80-1afa-11eb-8ad6-de787fb453d0.png)
![Screenshot 2020-10-30 215430](https://user-images.githubusercontent.com/61103022/97713405-bf62c700-1afa-11eb-840c-c1b2c6060706.png)
![Screenshot 2020-10-30 215525](https://user-images.githubusercontent.com/61103022/97713410-c093f400-1afa-11eb-89ad-19bc2851dd70.png)

-   right click anywhere and click `Git bash here` and run `git clone https://github.com/jimuelcaratao/CyberPen.git`

![Screenshot 2020-10-30 220722](https://user-images.githubusercontent.com/61103022/97714826-993e2680-1afc-11eb-9363-e32cd30a2a49.png)
![Screenshot 2020-10-30 220837](https://user-images.githubusercontent.com/61103022/97714835-9ba08080-1afc-11eb-8377-32dc40f40eb0.png)

-   Close the Git bash.

-   right click the `eCommerce-laravel` (Finna Ruma) and click `Git bash here`

![Screenshot 2020-10-30 221236](https://user-images.githubusercontent.com/61103022/97715215-17023200-1afd-11eb-9d8e-6e2d5e6beef1.png)

## Step to run

### Locally

-   git clone
-   create db in phpmyadmin
-   composer install
-   finna_ruma_db (dbname note: create on phpmyadmin and import given sql file)
-   npm install
-   npm run dev
-   php artisan storage:link
-   php artisan route:cache
-   php artisan config:cache
-   php artisan serve (start)

## Important after fresh installation.

-   Go to public > storage
-   then add 'media' folder (same spelling as this)
-   under 'media' folder add 'booking' and 'listing' folder
-   it should be PUBLIC > STORAGE > MEDIA > LISTING
-   and PUBLIC > STORAGE > MEDIA > BOOKING

[![263192852-592055095224144-8509161078534158323-n.png](https://i.postimg.cc/7ZS5xF9D/263192852-592055095224144-8509161078534158323-n.png)](https://postimg.cc/TKYd0HBH)

### AttemptToAuth

-   vendor/laravel/fortify/src/action/AttemptToAuth.php
-   add this code in top of handles function

         $user = User::where('email', $request->email)->first();
          if ($user &&
              $user->is_banned != '') {
              return redirect('/login')->withInfo('Your account is currently Deactivated.');
          }

-   add this in top of namespace

namespace Laravel\Fortify\Actions;

use App\Models\User;

### Step to reset database

-   php artisan migrate:fresh
-   php artisan db:seed --class=UsersTableSeeder (Default accounts)

### Need to Install

-   xampp
-   https://getcomposer.org/download/
-   https://git-scm.com/download/win
-   https://nodejs.org/en/download/

### booking Status

-   Pending Confirmation
-   Confirmed Reservation
-   Waiting for payment proof
-   Waiting for payment approval
-   Canceled
-   Complete

### User Roles and Accounts

Is_admin collumn

#### 0 = Tenant

-   Just Create another acc default user roles

#### 1 = Admin

-   admin 1 -
    'name' => `admin one`,
    'email' => `admin1@gmail.com`,
    'password' => `qweqweqwe`,

-   admin 2 -
    'name' => `admin two`,
    'email' => `admin2@gmail.com`,
    'password' => `qweqweqwe`,

#### 2 = Host

-   host 1 -
    'name' => `host one`,
    'email' => `host1@gmail.com`,
    'password' => `qweqweqwe`,
-   host 2 -
    'name' => `host two`,
    'email' => `host2@gmail.com`,
    'password' => `qweqweqwe`,

#### 0 = Tenant

-   tenant 1 -
    'name' => `Jon Snow `,
    'email' => `jonsnow@gmail.com`,
    'password' => `qweqweqwe`,
