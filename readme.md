# RestApi Best Practise with laravel5.6
### how to run it
 -  ```composer install```
 -  ``` make .env from .env.example ```
 -  ``` put your database deatils in .env ```
 -  ``` php artisan key:generate ```
 -  ``` php artisan jwt:secret ```
 -  ``` php artisan migrate --seed ```
 -  ``` php artisan serve ```

For runnig test you have to run 
``` ./vendor/bin/phpunit ```


In this Rest Api i cover user authorization with jwt and also product, categort CRUD.

In this sample i use laravel 5.6 and what i write here as best practice are located in these directory
 - phpUnit test: test for all endpoints in tests/Feature/
 - controllers: into app/Http/Controllers
 - resources : for showing json responce into app/Http/Resources
 - request:  for request validation into app/Http/Requests
 - Middleware: filtering HTTP requests inot app/Http/Middleware
 - interface classes: for controller controllers 
 - models : into app/Models
 - migration: database/migrations
 - seed: database/seed
 - factor: database/factories
