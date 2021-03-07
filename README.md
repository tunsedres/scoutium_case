## About User Invitation APP

This application consists of following modules;

- Register users
- Login users
- Display user
- Invite others to register to system
- Create invitation codes to reward
- Give reward if user sign up with reference code
- tests coverage for sending invitation feature


## Including Technologies
- Php 8 & Laravel 8
- mysql
- redis queue
- laravel horizon (for displaying queues and errors)
- mailtrap for sending emails as fake(you can set your mailtrap credentials)
- docker


## Installation
1. Go to the project folder 
2. Run "composer install" on the command line
3. Up docker-containers with command "docker-compose up --build -d"
4. "docker exec -it php8 bash" and run "php artisan migrate"
it is done!
   
* For testing
    - run "vendor/bin/phpunit" command (you must run this command inside docker php8 container bash)

