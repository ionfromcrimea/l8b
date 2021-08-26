<p align="center"><b>Установлен Breeze</b></p>

<p align="center"><b>Тестирование "Событие-Слушатель":</b></p>
Route::resource('page', PageController::class)->middleware('auth');

<p align="center"><b>Тестирование "Очередь":</b></p>
Route::get('image/index', [ImageController::class, 'index']);
Route::post('image/upload', [ImageController::class, 'upload']);

<p align="center"><b>Установлен Artisan-gui</b></p>
Route::get('artisan/') - установлено вендором.

<p align="center"><b>Тестирование confirm-password (в проекте LaraShop)</b></p>

<p align="center"><b>Тестирование password-reset</b></p>

<p align="center"><b>База данных · Построитель запросов · Пагинация</b></p>

Route::get('/dbtest', function () { ...

В файле vendor\psy\psysh\src\ReadLine\NUReadLine.php добавить строку после 64-й:
$this->historyFile = 'C:\psysh_history';
Иначе Tinker ругается на лог-файл, если имя юзера - русское!

Разобрался с дебаггером (https://php.zone/post/otladka-php-7-s-pomoshchyu-xdebug-v-phpstorm).
Там же есть для PHP8. Плюс дока по PhpStorm-2021. Плюс офф. дока по Xgebug (3)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax.
We believe development must be an enjoyable and creative experience to be truly fulfilling.
Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
