Installation:
```
- Run `git clone https://github.com/gsduong/nlp-app.git`
- Move to `nlp-app`. Run `composer install`
- Create a local database name `db_nlp`
- Update database config in your `.env` file
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Wait for the seeding process to complete (Login credentials can be found in `UsersTableSeeder.php`)
- Run `php artisan serve`
- Enjoy!
```