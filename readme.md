https://github.com/UniSharp/cart
https://github.com/UniSharp/helpers.js
https://github.com/UniSharp/doc-us

php artisan make:command ImportCat --command=import:cat
php artisan make:command ImportProduct --command=import:product
php artisan make:command ImportPrice --command=import:price



https://github.com/andersao/l5-repository#methods


https://docs.spatie.be/laravel-permission/v3/installation-laravel/



use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name' => 'writer']);
$permission = Permission::create(['name' => 'edit articles']);
A permission can be assigned to a role using 1 of these methods:

$role->givePermissionTo($permission);
$permission->assignRole($role);


    "require": {
        "php": "^7.2",
        "doctrine/dbal": "~2.3",
        "fideloper/proxy": "^4.0",
        "infyomlabs/adminlte-templates": "6.0.x-dev",
        "infyomlabs/generator-builder": "dev-master",
        "infyomlabs/laravel-generator": "6.0.x-dev",
        "laravel/framework": "^6.2",
        "laravel/tinker": "^1.0",
        "laravelcollective/html": "^6.0",
        "spatie/laravel-permission": "^3.2"
    },
    "require-dev": {
        "facade/ignition": "^1.4",
        "fzaninotto/faker": "^1.4",
        "laravel/ui": "^1.1",
        "mockery/mockery": "^1.0",
        "nunomaduro/collision": "^3.0",
        "phpunit/phpunit": "^8.0"
    },


Пролог
    Описание изменений
    Руководство по обновлению
    Помощь в разработке фреймворка
    Документация API
Начало работы
    Установка
    Настройка
    Структура директории
    Homestead
    Valet
Основы архитектуры
    Жизненный цикл запроса
    Сервис-контейнер
    Сервис-провайдеры
    Фасады

        Например, этот вызов фасада и этот вызов хелпера эквивалентны:
        return View::make('profile');
        return view('profile');

        use Illuminate\Support\Facades\Cache;
        Route::get('/cache', function () {
            return Cache::get('key');
            return cache('key');
        });    

        {совет} При создании стороннего пакета, который взаимодействует с Laravel, лучше внедрять контракты Laravel вместо использования фасадов. Так как пакеты создаются вне самого Laravel, у вас не будет доступа к хелперам тестирования Laravel.
    Контракты
Основы
    Роутинг
    Посредники
    CSRF-защита
    Контроллеры
    HTTP-запросы
    HTTP-отклики
    Шаблоны
    HTTP сессия
    Валидация
    Ошибки и логирование
Фронтенд
    Шаблоны Blade
    Локализация
    Фронтенд
    Сборка фронтенда
Безопасность
    Authentication
    API аутентификация
    Авторизация
    Шифрование
    Хеширование
    Сброс пароля
Копаем глубже
Консоль Artisan
Широковещание
Кэш
Коллекции
События
Хранение файлов
Хелперы
Mail
Уведомления
Разработка пакетов
Очереди
Планировщик задач
База данных
Основы работы
Конструктор запросов
Страничный вывод
Миграции
Загрузка начальных данных
Redis
Eloquent ORM
Начало работы
Отношения
Коллекции
Мутаторы
Сериализация
Тестирование
Начало работы
HTTP тесты
Тесты браузера
База данных
Мокинг
Официальные пакеты
Cashier
Envoy
Passport
Scout
Socialite