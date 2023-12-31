## About Appplication Requirements

At NeuroNation, we offer brain training courses to our users to train several domain categories, such as: memory, reasoning, perception, etc.
Each of these courses is composed of a list of exercises and each exercise belongs to one of the aforementioned categories.
Users train throughout several sessions on different dates, each of which is composed of a subset of exercises. When a session finishes, 
users obtain a certain score based on the points they win for each of the exercises included in that session depending on how good 
or bad they resolved them.
On the user's private area, we offer –among others– a section called Progress in which the users can follow their own progress in all the categories. 
These points also serve the purpose of calculating the ranking of the users in their countries and worldwide.
In that section, we want to have a new component that displays a graph with the history of the last 12 sessions. 
Your task is to take care of the API endpoint, while another team member is responsible for the frontend part. 
Fig. 1 shows how this component will then look like visually:


## Code challenge

Using the brand new performing database schema that you created, you are required to implement a new REST resource to add to our existing 
API that should offer the following functionality to the frontend layer, so that it can display the above graph to the users:
It must provide an object containing an array of sessions called "**history**".
It must provide the following information for each session in the list:
1. "**score**" (integer): total points achieved in the session.
2. "**date**" (integer): unix timestamp of the session.
Optional (extra points)
Imagine that now business also wants to display the name of the categories trained within the very last session below the diagram 
(i.e.: to show the user a text: "Recently trained: Memory, Concentration"). 
Please extend your API accordingly.

## Optional (extra points)

Imagine that now business also wants to display the name of the categories trained within the very last session below the diagram 
(i.e.: to show the user a text: "Recently trained: Memory, Concentration"). 
Please extend your API accordingly.

## Requirments

* MySQL 5.7
* PHP 8.x
* Raw SQL statements
* Laravel / Lumen or Slim
* Unit tests
* Simple Docker Compose Setup to enable us to review your submission
* Utilizing any 3rd-party library as support is permitted.
* Please provide a simple diagram or any kind of easy-to-do visual overview / screenshot of your database.

## Installation

Follow the steps below to execute the app:

- `git clone https://github.com/mbbhatti/NeuroNation.git`
- composer install
- copy .env.example to env
	- DB_CONNECTION=mysql
	- DB_HOST=127.0.0.1
	- DB_PORT=3306
	- DB_DATABASE=neuronation
	- DB_USERNAME=root
	- DB_PASSWORD=?????
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan passport:install
- (composer dumpautoload -o)  or (php artisan dump-autoload)
- run server
	- php artisan serve --port=8080

## API Endpoints
	
### Register API

`curl -X POST http://localhost:8080/api/v1/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "Hazem", "email": "wehbihazem@gmail.com", "password": "password", "confirm_password": "password"}'
`

### Loin API

` curl -X POST http://localhost:8080/api/v1/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{ "email": "test@example.com", "password": "password"}'
`

### User course sessions API

`curl -X GET http://localhost:8080/api/v1/users/{user_id}/get-user-sessions \
-H "Accept: application/json" \
-H "Authorization: Bearer token-from-login"
`

### User session exercises API

`curl -X GET http://localhost:8080/api/v1/users/{user_id}/get-user-exercises \
-H "Accept: application/json" \
-H "Authorization: Bearer token-from-login"
`

## How To Test

'vendor/bin/phpunit'

## API Postman Collection

You can find it attached with project directory. (**NeuroNation API.postman_collection.json**)

### Docker
BookStore management is very easy to install and deploy in a Docker container. Simply use the docker-compose build to build the image.

```sh
$ docker-compose build
```
Once done, run the Docker image by using docker-compose up command.

```sh
$ docker-compose up -d
```

Setup the DB migration by using docker-compose exec command.
```sh

$ docker-compose exec app  php artisan key:generate
$ docker-compose exec app  php artisan migrate
$ docker-compose exec app  php artisan db:seed
$ docker-compose exec app  php artisan passport:install
$ docker-compose exec php artisan dump-autoload
$ docker-compose exec
$ docker-compose exec composer install
$ docker-compose exec npm install

```

Verify the application by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```

Stop application could be done with docker-compose stop command.
```sh
$ docker-compose stop
```

