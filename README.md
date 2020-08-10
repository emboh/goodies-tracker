
<p  align="center"><img  src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg"  width="400"></p>

  

## Algostudio Backend Test

How to up & running:

- Create the database, copy .env file and setup the configuration
- Install dependecies and publish assets.
	> composer install && npm install && npm run dev
- Run migration, seed dummy data, and serve in localhost.
	> php artisan migrate:refresh && php artisan db:seed && php artisan serve
	
	
Features:
- Summary : items query and supplier average item supply by month
- Add Item, to add item to listing 
- Reduce Stock (for distributor): 
- Add Stock (for distributor): 
- Detail, for view item detail 

Supplier Login Credential:
> admin@supplier.com / password

Distributor Login Credential:
> admin@distributor.com / password