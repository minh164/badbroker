# Note:

- Because my Subscription Plan of ExchangeRates service does not support "fluctuation" api, I store each rate from ExchangeRates service into DB (rates table) to "fake" data.
- File `rates.sql` in folder `database`.
- You can create extra fake data by  endpoint `rates/store-data-from-service`

# How to:
1. Install packages: `php composer install`.
2. Run `php artisan serve` to open port.
3. Access to _**/rates**_ endpoint.
