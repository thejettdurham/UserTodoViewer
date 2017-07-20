# User Todo API

A simple Laravel project to demonstrate my knowledge of the framework and ability to work within it.

## Application Spec

- Provide a simple website where users can see other users and the items on their todo list.
- Users and Todo data is provided by [JSONPlaceholder](https://jsonplaceholder.typicode.com/)
- The user and todo data should be kept up-to-date by the minute
- When the user and todo data updates, the website should update asynchronously.

## Implementation Detail

- The website data will be stored and read from a SQL database (no vendor-specific functionality will be used to allow for flexibility)
- Redis will serve as a queue, cache, and pub-sub mechanism for keeping the client and server in-sync
- Data will be imported from the API every minute via a scheduled job. 
- For fun, only a single user's data will be imported every minute, and that user will be chosen at random
- The scheduler will offload the import jobs to a queue for asynchronous processing and to minimize the scheduler run-time.
- The user and todo data will be exposed to the front-end via a REST API.
- The server will publish a message to redis when an import/update job is complete
- The client will subscribe to the messages published by the server and dynamically update the displayed data in real-time as needed

## Running instructions

This little toy app was developed directly on a fresh [Laravel Homestead](https://laravel.com/docs/5.4/homestead) environment, and these directions assume you're in the same environment.

- Clone repository
- `composer install` to install PHP dependencies
- `npm install` to install JS dependencies for the front-end
- Copy `.env.example` to `.env`
- Update the `DB_DATABASE` and `PUSHER_*` variables as needed
- Ensure your local database specified by `DB_DATABASE` is empty
- `php artisan migrate`
- `php artisan import:users --all` to perform the initial import of all users from the data source.