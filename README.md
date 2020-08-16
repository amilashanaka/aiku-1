#### Multi tenancy


CREATE DATABASE master ENCODING 'UTF8' LC_COLLATE = 'en_GB.UTF-8' LC_CTYPE = 'en_GB.UTF-8' TEMPLATE template0 ;
CREATE EXTENSION IF NOT EXISTS timescaledb CASCADE;

##### Landlord database migrations and seeding (only for master)
`art migrate --path=database/migrations/landlord --database=landlord`

`art db:seed` 


##### Tenants database migrations and seddings (for the teneants databses)
`art tenants:artisan "migrate --database=tenant"`
 
`art tenants:artisan "migrate --database=tenant --seed"` 


## create model 
`art make:model Flight --migration`
## create seeder 
`php artisan make:seeder StoreSeeder`


## create factory 
`php artisan make:factory PostFactory`



