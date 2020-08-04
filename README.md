#### Multi tenancy

##### Landlord database migrations
`art migrate --path=database/migrations/landlord --database=landlord`

##### Tenants database migrations
`art tenants:artisan "migrate --database=tenant"`
##### Tenants database seeding
`art tenants:artisan "migrate --database=tenant --seed"`


## create model 
`art make:model Flight --migration`
