### Roadmap demo

Test task

### Run

- specify connect to your MySQL database in `.env` file:
```
DB_CONNECTION=mysql
DB_DATABASE=roadmap-demo
DB_HOST=localhost
DB_PORT=3306
DB_USERNAME=admin
DB_PASSWORD=admin
```
- `$ composer install`
- `$ ./artisan migrate`
- `$ ./artisan serve`
