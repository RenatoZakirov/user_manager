# Управление пользователями

Это REST API приложение для управления пользователями при помощи CRUD операций.

# Установка

1. Клонируйте репозиторий:
git clone https://github.com/RenatoZakirov/user_manager.git

2. В файле "/config/database.php" настройте конфигурацию БД.

3. Запустите локальный сервер (например XAMPP)

4. Используйте Postman для тестирования функциональности приложения.

# Использование

1. Создание пользователя
Метод: "POST"
URL: "http://localhost/user_manager/api/user/create"
Тело запроса (JSON):
{
  "username": "Alex",
  "email": "alex@gmail.com",
  "password": "1234"
}
Ответ (JSON):
{
    "id": 1,
    "message": "пользователь создан!"
}

2. Получение пользователя
Метод: "GET"
URL: "http://localhost/user_manager/api/user/get?id=1"
Ответ (JSON):
{
    "id": "1",
    "username": "Alex",
    "email": "alex@gmail.com",
    "password": "$2y$10$.0w91btYjbTKBnGoG63MZuQixyW9qjHwqWgW8LPvHkxPV19SghjZS",
    "created_at": "2024-08-09 14:35:30.002455"
}

3. Обновление пользователя
Метод: "PUT"
URL: "http://localhost/user_manager/api/user/update"
Тело запроса (JSON):
{
    "id": 1,
    "username": "John",
    "email": "john@gmail.com"
}
Ответ (JSON):
{
    "message": "пользователь обновлен!"
}

4. Авторизация пользователя
Метод: "POST"
URL: "http://localhost/user_manager/api/user/login"
Тело запроса (JSON):
{
    "email": "john@gmail.com",
    "password": "1234"
}
Ответ (JSON):
{
    "message": "вы авторизованы!"
}

5. Удаление пользователя
Метод: "DELETE"
URL: "http://localhost/user_manager/api/user/delete"
Тело запроса (JSON):
{
    "id": 1
}
Ответ (JSON):
{
    "message": "пользователь удален!"
}

# Структура проекта

config/ - конфигурация БД (в данном случае PostgreSQL)
lib/ - библиотека для работы с моделями обьектов (в данном случае RedbeanPHP)
public/ - директория с доступными для веб-сервера файлами, включая роутер (index.php) и все методы

# Требования
PHP 7.4 и выше
RedbeanPHP 5.7.4 и выше

# Автор
Ренато Закиров
