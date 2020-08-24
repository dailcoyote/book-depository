<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Book depository project</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

Структура проекта
-------------------

      admin/              Административная часть. Vue.js приложение (см.в описании в этой папке)
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      frontend/           Публичная часть сайта. Vue.js приложение (см.в описании в этой папке)
      migrations          Миграции в БД
      modules/v1          содержит REST API  
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      web/                contains the entry script and Web resources



Требования
------------

- PHP minimum 5.6.0. Yii framework (~2.0.14)
- MySQL (MariaDB)
- Apache
- node.js (>=14.5.0). Vue ~4.5.0


Установка
------------

### Install via Composer

Установка зависимостей:

~~~
composer install
~~~


Конфигурация
-------------

### База данных

1. Создайте базу `book_depository` в системе MySQL и затем проведите миграцию.

2. Отредактируйте файл `config/db.php` в проекте исходя из ваших настроек MySQL:

    ```php
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=book_depository',
        'username' => 'root',
        'password' => '<YOUR_PASSWORD>',
        'charset' => 'utf8',
    ];
    ```
    
3. Миграция базы:

    ```
    php yii migrate
    ```


Запуск сервера
------------

~~~
php yii serve
~~~

Сервер по умолчанию доступен по адресу:
~~~
http://localhost:8080
~~~

