# Steps to run The project

- git clone of the master branch
- run composer install
- renaming .env.example to .env with the connections according to the environment.
- run php artisan migrate
- run php artisan db:seed (to fill data to customers and items tables)
- run php -S localhost:8000

## Endpoints

- get all store items Pagination (http://localhost:8000/api/items?page=1)
- add or update an item to customer cart with the quantity (http://localhost:8000/api/cart/addOrUpdateItem)
- remove an item of customer cart (http://localhost:8000/api/cart/removeItem)
- get customer cart selected items checkout (http://localhost:8000/api/cart/checkout/1)
- get total price of the purchase items (http://localhost:8000/api/order/TotalPurchase/1)
- make an order and check for store credit, update it and reset customer cart(http://localhost:8000/api/order/make) 


## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
