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
