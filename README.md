<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Стек
- PHP 8.2
- Mysql

## Начало работы
- Развернуть проект из репозитория
- Запустить проект
- - **php artisan serve**
- Создать базу данных
- - **create schema `test-ocean` collate utf8mb4_general_ci;**
- Пример моего .env
- - DB_DATABASE=test-ocean
- - DB_USERNAME=root
- - DB_PASSWORD=Xxxxxxxxx
- Создаем таблицы
- - **php artisan migrate**
- Добавляем данные по умолчанию
- - **php artisan db:seed DatabaseSeeder**

## Endpoints
Все необходимы эндпоинты сохрнены в файле
**postman_collection.json** он предназначен для импорта в Postmen



**Створити**

POST {{baseUrl}}/api/posts/store

Request
```json
{
    "title": "Статья 5",
    "content": "Текст Статьи 5",
    "category_id": 1
}
```

Response Ok
```json
{
    "message": "ok"
}
```

Response Error
```json
{
    "success": false,
    "message": "Ошибка авторизации",
    "error": "Необходимо авторизоваться для доступа к этому ресурсу",
    "code": 401
}
```

**Редагувати**

PATCH {{baseUrl}}/api/posts/update/4

Request
```json
{
    "title": "Статья 4.2",
    "content": "Текст Статьи 4",
    "category_id": 1
}
```

Response
```json
{
    "message": "ok"
}
```

**Вилучення**

DELETE {{baseUrl}}/api/posts/destroy/4

Response
```json
{
    "message": "ok"
}
```

**Список статей**

GET {{baseUrl}}/api/posts

Request
```json
{
    "page": 1,
    "sort_by": "title",
    "sort_order": "asc"
}
```

Response
```json
{
    "data": [
        {
            "id": 1,
            "title": "Стаття 1",
            "content": "Текст до Статті 1",
            "category_id": 1,
            "created_at": "2025-09-03T06:44:00.000000Z",
            "updated_at": "2025-09-03T06:44:00.000000Z",
            "category": {
                "id": 1,
                "name": "Новини",
                "created_at": "2025-09-03T06:44:00.000000Z",
                "updated_at": "2025-09-03T06:44:00.000000Z"
            }
        },
        {
            "id": 2,
            "title": "Стаття 2",
            "content": "Текст до Статті 2",
            "category_id": 1,
            "created_at": "2025-09-03T06:44:00.000000Z",
            "updated_at": "2025-09-03T06:44:00.000000Z",
            "category": {
                "id": 1,
                "name": "Новини",
                "created_at": "2025-09-03T06:44:00.000000Z",
                "updated_at": "2025-09-03T06:44:00.000000Z"
            }
        }
    ],
    "pagination": {
        "current_page": 1,
        "per_page": 10,
        "total": 2,
        "last_page": 1,
        "from": 1,
        "to": 2
    }
}
```

**Пошук статті**

GET {{baseUrl}}/api/posts/search

Request
```json
{
    "title": "Стаття"
}
```

Response
```json
[
    {
        "id": 1,
        "title": "Стаття 1",
        "content": "Текст до Статті 1",
        "category_id": 1,
        "created_at": "2025-09-03T06:44:00.000000Z",
        "updated_at": "2025-09-03T06:44:00.000000Z"
    }
]
```

*Докладна інформація про статтю.*

GET {{baseUrl}}/api/posts/1

Response
```json
{
    "id": 1,
    "title": "Стаття 1",
    "content": "Текст до Статті 1",
    "category_id": 1,
    "created_at": "2025-09-03T06:44:00.000000Z",
    "updated_at": "2025-09-03T06:44:00.000000Z",
    "comments": [
        {
            "id": 1,
            "content": "Комментарий 1",
            "post_id": 1,
            "created_at": "2025-09-03T07:30:14.000000Z",
            "updated_at": "2025-09-03T07:30:14.000000Z"
        }
    ]
}
```

**Додати коментар**

POST {{baseUrl}}/api/posts/1/comments

Request
```json
{
    "post_id": 1,
    "content": "Комментарий 1"
}
```

Response
```json
{
    "message": "ok"
}
```


**авторизація та отримання API-токена**

POST {{baseUrl}}/api/login

Request
```json
{
    "email": "admin@test.com",
    "password": "adminTest"
}
```

Response
```json
{
    "token": "3|crFtCstKNrUs7Qml82uAChgozdY8DI8ZBoLwLbLcc59f8577"
}
```





## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
