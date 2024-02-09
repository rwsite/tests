<!--suppress HtmlDeprecatedAttribute -->
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Тестовое задание PHP Dev

Спроектировать и реализовать БД и сервис для библиотеки.     
В БД заложить возможность:

- хранить книги (может быть больше 1 экземпляра),
- возможность поиска по автору(авторов может быть не 1), 
- возможность выдать книгу читателю,
- возможность списать книгу(утрата и тд).

---
Должны быть следующие методы:
- Добавить книгу с указанием авторов
- Получить все книги
- Выдать книгу читателю
- Списать книгу

# БД

https://drive.google.com/file/d/1isffeWNPpMEPpLkW85Mik0DNa8AFnUEl/view?usp=sharing

# Этапы создания api

`composer create-project laravel/laravel library --prefer-dist`     
`cd library`    
`php artisan serve`

Создадим миграции (users уже есть) - таблицы в БД   
`php artisan make:migration create_books_table`     
`php artisan make:migration create_authors_table`   
`php artisan make:migration create_author_book_table`   
`php artisan make:migration create_books_log_table`     
`php artisan migrate`
Настроим таблицы и ограничения

Создадим модели для взаимодействия с БД (User уже есть, отредактируем)  
`php artisan make:model Book`   
`php artisan make:model Author`   
`php artisan make:model BookLog`    
установим связи, установим заполняемые и защищенные поля

Пропишем роуты и создадим API контроллеры с запросами к ним (Update и Store, создаются автоматически при команде)  
`php artisan make:controller Api/BooksController --model=Book --resource --requests`    
Изменим тип роутов на apiResource, добавим ограничения методов

Создадим ресурсы для коррекции отдаваемых данных в API   
`php artisan make:resource BookResource`    
`php artisan make:resource AuthorResource`
`php artisan make:resource BookLogResource`

Создадим `ForceJsonResponse` middleware для преобразования всех ответов api в JSON

В реквестах пропишем основные правила валидации
Изменим содержимое контроллеров под требования ТЗ. Все ответы будем отдавать через ресурсы.
Для удаления будем отдавать 204 или 400 код в случае ошибки.

Просмотр доступных API роутов   
`php artisan route:list`
