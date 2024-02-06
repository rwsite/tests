<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Тестовое задание PHP Dev

Спроектировать и реализовать БД и сервис для библиотеки
В бд заложить возможность:
- хранить книги(может быть больше 1 экземпляра), 
- возможность поиска по автору(авторов может быть не 1), 
- возможность выдать книгу читателю, возможность списать книгу(утрата и тд).

- Должны быть следующие методы:
- Добавить книгу с указанием авторов
- Получить все книги
- Выдать книгу читателю
- Списать книгу

# БД
https://drive.google.com/file/d/1isffeWNPpMEPpLkW85Mik0DNa8AFnUEl/view?usp=sharing

<img src="https://i.imgur.com/tRczvx5.png">

# Create process

`composer create-project laravel/laravel library --prefer-dist`<br>
`cd library`<br>
`php artisan serve`<br>
`php artisan make:migration create_books_table`<br>
`php artisan make:migration create_authors_table`<br>
`php artisan make:migration create_users_table`<br>
`php artisan make:migration create_catalog_table`<br>
