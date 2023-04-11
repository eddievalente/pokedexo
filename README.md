#Pokedex-o

A private pokedex using Laravel and Vue.js.

> Find out which pokemons you already have and which ones are yet to be caught..

## Laravel Setup

- Download this source code into a working directory.

- Install Laravel using artisan:

    ```sh
    composer install
    # This will install all the required packages and libraries for laravel
    ```

- Set up the local development environment:

    ```sh
    Edit `.env` and set your database connection details
    ```

- Run migration using the following command:

    ```sh
    php artisan migrate
    ```

- Run backend using the following command:

    ```sh
    php artisan serve
    ```

### Postman Tests

At this point you already can test the backend:

```sh
GET http://localhost:8000/api/list
#this will list all the pokemons stored in your database

GET http://localhost:8000/api/pokemon/951
#if you have the pokemon stored into your database, it returns the pokemon, otherwise it will
#access PokeAPI to retrieve information about this pokemon and store it into your database
```

## Vue Setup

```sh
npm install
# this will install all the files you need for vue
```


## Running the application

When finished browse http://localhost:8000 and you will find the pokemon list. 

If your database is empty, use Postman to get the Pokemon first and then run the application on browser

The images/sprites fo the pokemons are not stored locally.

## Next Steps

- create a pokemon search feature
- show if the pokemon is available on Pokemon GO
- create a more detailed page for each pokemon, showing all the specs


