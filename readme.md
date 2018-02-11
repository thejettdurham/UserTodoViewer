# User Todo Viewer

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
- In screen or another terminal, start a queue worker with `php artisan queue:work`
- `php artisan import:user --all` to perform the initial import of all users from the data source. (This work will be done on the queue worker)
- In `/resources/assets/js/bootstrap.js`, update the `key` parameter in the `Echo` constructor in the bottom of the file to use your pusher app key (this will eventually be read from the server's .env at asset build time)
- `npm run dev` to compile CSS and JS assets for dev (via Laravel Mix)
- `php artisan key:generate` to generate the app key
- Ensure your nginx configuration points to the `/public` folder
- Open the app in a web browser. You should now see a list of users with their todos below.
- While keeping the browser window open, issue the `php artisan import:user` command to update user data for a user at random.
- When the user info is up-to-date, you should see a blue notification pop up in the lower right hand side of the screen in the browser. This notification will tell you the name of the user for which the data was updated.

## Data Api

All api routes start at `(your-hostname)/api`.

- `GET /users`: Get all users
- `GET /users/{id}`: Get single user by id
- `GET /users/{id}/todos`: Get all todos for given user
- `GET /users/{id}/todos/{id}`: Get specific todo for given user

## This is a change
