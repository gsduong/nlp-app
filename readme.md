For the first time install:
**git clone https://github.com/gsduong/nlp-app.git **
**composer install**
Create a local database name ```db_nlp```
Update database config in your **.env** file
Run:
**php artisan migrate**
**php artisan db:seed**
Wait for the seeding process to complete (Login credentials can be found in UsersTableSeeder.php). Then run:
**php artisan serve**
Enjoy!