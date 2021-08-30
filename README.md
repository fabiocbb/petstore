# Petstore challenge project

Petstore is built with a microservice architectural style. We have 3 microservices (user, store, pet); each one is a Laravel Lumen project with its own database. We have then an api gateway tha will maintain the connection with the microservices (not implemented).

The pet microservicet has 5 working routes, models, a controller, a database seeder and one test file PetTest.php (run './vendor/bin/phpunit' from pet folder)
There is a Postman collection to test the pet routes

Installation (pet microservice)
------------
1. Clone project
2. Copy `.env.example` to `.env`
3. Make sure to set APP_URL in your .env file. Set your database credentials
4. Run `php artisan key:generate`
5. Create database 'pet'
6. Run `php artisan migrate:fresh --seed`
7. Done!

API documentation
---------------
Navigate to https://petstore.swagger.io/

