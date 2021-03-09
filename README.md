<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Library API

This is a simple API CRUD for the management of the books of the library. Between its functionalities we have:

- Create a book.
- Edit a book.
- Delete a book.
- Show a paginated list/table with all the books.
- Filter the list/table mentioned above.
- Consult if the book has been borrowed, or if it is available.
- Change the status of a book from available to not available.

## Requirements

This project needs you to install the following dependencies:

- PHP 8.0.3.
- Laravel Framework 8.31.0.
- Mysql Database.

## Setup instrunctions

### Mysql Database:
 You need to have a running Mysql database and set the following variables on the .env file in the project folder:

- <b>DB_HOST</b>: IP Address where the databse is running.
- <b>DB_PORT</b>: Port where the databse is listening.
- <b>DB_DATABASE</b>: Name of the that the application will use.
- <b>DB_USERNAME</b>: User to login on the database.
- <b>DB_PASSWORD</b>: Password to login on the database.

### Running Project
 On the project folder run this commands:

- <b>`composer install`</b>: install composer dependencies.
- <b>`php artisan migrate`</b>: create databse schemas.
- <b>`php artisan db:seed --class=DatabaseSeeder`</b>: insert dummy data on the databse.
- <b>`php artisan serve --class=DatabaseSeeder`</b>: run the project.

## Endpoints

### GET

- <b>`ip_address:8000/api/book?page=i`</b>:get a paginated list of the books. There are 12 books per page.
#### Query params
```
    page: is the page you want to query.
```
#### Response
```
{
    "current_page": 1,
    "data": [
        {
            "id": 2,
            "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
            "author": "Arlo Blanda PhD",
            "userBorrowing": null,
            "publicationDate": "1988-04-30 07:42:45",
            "category_id": 3
        },
    ],
    "first_page_url": "http://127.0.0.1:8000/api/book?page=1",
    "from": 1,
    "last_page": 5,
    "last_page_url": "http://127.0.0.1:8000/api/book?page=5",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://127.0.0.1:8000/api/book?page=1",
            "label": "1",
            "active": true
        }
    ],
    "next_page_url": "http://127.0.0.1:8000/api/book?page=2",
    "path": "http://127.0.0.1:8000/api/book",
    "per_page": 12,
    "prev_page_url": null,
    "to": 12,
    "total": 56
}
```

- <b>`ip_address:8000/api/book/{id}`</b>: get book information by id.
#### Params
```
    id: id of the book.
```
#### Response
```
{
    "id": 2,
    "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
    "author": "Arlo Blanda PhD",
    "userBorrowing": null,
    "publicationDate": "1988-04-30 07:42:45",
    "category_id": 3
}
```

- <b>`ip_address:8000/api/book/search/{keyword}`</b>: get a list of the books where its name or author match with the keyword parameter.
#### Params
```
    keyword: keyword that could match with the name or author of the books.
```
#### Response
```
[
    {
        "id": 2,
        "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
        "author": "Arlo Blanda PhD",
        "userBorrowing": null,
        "publicationDate": "1988-04-30 07:42:45",
        "category_id": 3
    }
]
```

- <b>`ip_address:8000/api/category`</b>: get a list of the categories.
#### Response
```
[
    {
        "id": 1,
        "name": "Gilda Osinski",
        "description": "Eius autem odit ut possimus qui veritatis aspernatur. Velit doloremque velit quaerat porro accusamus consectetur qui in. Quam voluptatem ullam sed molestias quas."
    },
    {
        "id": 2,
        "name": "Gerry Ernser",
        "description": "Qui ratione magni eos. Voluptas quae placeat consequuntur in ipsa voluptatem beatae."
    }
]
```
- <b>`ip_address:8000/api/category/{id}`</b>: get category information by id.
#### Params
```
    id: id of the category.
```
#### Response
```
{
    "id": 1,
    "name": "Gilda Osinski",
    "description": "Eius autem odit ut possimus qui veritatis aspernatur. Velit doloremque velit quaerat porro accusamus consectetur qui in. Quam voluptatem ullam sed molestias quasi."
}
```

### POST

- <b>`ip_address:8000/api/book`</b>: Create a new book.
#### Request
```
    {
        "id": 2,
        "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
        "author": "Arlo Blanda PhD",
        "userBorrowing": null,
        "publicationDate": "1988-04-30 07:42:45",
        "category_id": 3
    }
```
#### Response
```
{
    "id": 2,
    "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
    "author": "Arlo Blanda PhD",
    "userBorrowing": null,
    "publicationDate": "1988-04-30 07:42:45",
    "category_id": 3
}
```

### PUT

- <b>`ip_address:8000/api/book/{id}`</b>: Modify a book.
#### Params
```
    id: id of the book to modify.
```
#### Request
```
    {
        "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
        "author": "Arlo Blanda PhD",
        "userBorrowing": null,
        "publicationDate": "1988-04-30 07:42:45",
        "category_id": 3
    }
```
#### Response
```
{
    "id": 2,
    "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
    "author": "Arlo Blanda PhD",
    "userBorrowing": null,
    "publicationDate": "1988-04-30 07:42:45",
    "category_id": 3
}
```

### DELETE

- <b>`ip_address:8000/api/book/{id}`</b>: Delete a book.
#### Params
```
    id: id of the book to delete.
```
#### Response
```
{
    "id": 2,
    "name": "Praesentium voluptatibus qui maxime culpa harum harum ullam nam.",
    "author": "Arlo Blanda PhD",
    "userBorrowing": null,
    "publicationDate": "1988-04-30 07:42:45",
    "category_id": 3
}
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
