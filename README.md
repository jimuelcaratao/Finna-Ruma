# Finna Ruma

---

## A beginner's guide to clone from github.

### Need to Install

-   xampp
-   https://getcomposer.org/download/
-   https://git-scm.com/download/win
-   https://nodejs.org/en/download/

## Step to run

### Locally

-   git clone

-   go to `This PC -> Local Disk (C:) -> xampp -> htdocs` folder.

![Screenshot 2020-10-30 215333](https://user-images.githubusercontent.com/61103022/97713413-c12c8a80-1afa-11eb-8ad6-de787fb453d0.png)
![Screenshot 2020-10-30 215430](https://user-images.githubusercontent.com/61103022/97713405-bf62c700-1afa-11eb-840c-c1b2c6060706.png)
![Screenshot 2020-10-30 215525](https://user-images.githubusercontent.com/61103022/97713410-c093f400-1afa-11eb-89ad-19bc2851dd70.png)

-   right click anywhere and click `Git bash here` and run `git clone https://github.com/jimuelcaratao/CyberPen.git`

![Screenshot 2020-10-30 220722](https://user-images.githubusercontent.com/61103022/97714826-993e2680-1afc-11eb-9363-e32cd30a2a49.png)
![Screenshot 2020-10-30 220837](https://user-images.githubusercontent.com/61103022/97714835-9ba08080-1afc-11eb-8377-32dc40f40eb0.png)

-   Close the Git bash.
-   After clone open the project folder in vscode.
-   reference video: https://www.youtube.com/watch?v=mnkCBLYogD0

### Database config

-   create db in phpmyadmin
-   finna_ruma_db (dbname note: create on phpmyadmin and import given sql file)
-   reference: https://www.youtube.com/watch?v=jW5lrS6EUPM

### Type this in terminal to install dependencies

-   composer install
-   npm install
-   npm run dev
-   php artisan storage:link
-   php artisan route:cache
-   php artisan config:cache
-   php artisan serve (start)
-   php artisan db:seed --class=UserTableSeeder
-   then go to link

[![047b8918-525f-4f62-913c-fe73ad123c1c.png](https://i.postimg.cc/zvZjdJTC/047b8918-525f-4f62-913c-fe73ad123c1c.png)](https://postimg.cc/CB7k5pP5)

## Important after fresh installation. (if this has already have folder, please ignore)

-   Go to public > storage
-   then add 'media' folder (same spelling as this)
-   under 'media' folder add 'booking' and 'listing' folder
-   it should be PUBLIC > STORAGE > MEDIA > LISTING
-   and PUBLIC > STORAGE > MEDIA > BOOKING

[![263192852-592055095224144-8509161078534158323-n.png](https://i.postimg.cc/7ZS5xF9D/263192852-592055095224144-8509161078534158323-n.png)](https://postimg.cc/TKYd0HBH)

### AttemptToAuth (Add this for banning user)

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

[![1.jpg](https://i.postimg.cc/BbmCJ2dg/1.jpg)](https://postimg.cc/QKW7bKN9)

[![2.jpg](https://i.postimg.cc/sfPW7PHH/2.jpg)](https://postimg.cc/4ndnTcgp)

### Step to reset database (Careful resetting all db data)

-   php artisan migrate:fresh

### Booking Status

-   Pending Confirmation
-   Confirmed Reservation
-   Waiting for payment proof
-   Waiting for payment approval
-   Canceled
-   Complete

### Listing Status

-   Pending Approval
-   Denied
-   Approved

### Host booking status

-   Confirmed by Host
-   Denied by Host
-   Waiting for Host

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

#### SAW criteria

-   cost (pesos) auto

    -   > 15,000 (1)
    -   13000 - 14999 (2)
    -   10000 - 12999 (3)
    -   7000 - 9999 (4)
    -   4000 - 6999 (5)
    -   < 3999 (6)

-   location (host input)

    -   None (0)
    -   Close to school (1)

-   room size auto

    -   50+ sq. m (1)
    -   30 sq. m - 49 sq. m (2)
    -   20 sq m - 29 sq m (3)
    -   10 sq m - 19 sq m (4)
    -   < 10 sq m (5)

-   facility (admin input)

    -   9+ amenities (1)
    -   7 - 8 (2)
    -   5 - 6 (3)
    -   3 - 4 (4)
    -   < 2 (5)
