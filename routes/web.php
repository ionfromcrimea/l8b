<?php

use App\Http\Controllers\ImageController;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

///////////////////////////////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

///////////////////////////////////////////////////////////////////////

Route::resource('page', PageController::class)
    ->middleware('auth');

Route::get('image/index', [ImageController::class, 'index']);
Route::post('image/upload', [ImageController::class, 'upload']);

Route::get('/dbtest', function () {
//    $pages = DB::table('pages')
//        ->where('name', 'like', '%Q%')
//        ->get();
//    foreach ($pages as $key => $page) {
//        echo $key . ' - ' . $page->name . "<br>";
//    }
//    echo "<br>";

//    $pages = DB::table('pages')
//        ->orderBy('user_id', 'asc')
//        ->orderBy('created_at', 'asc')
//        ->get();
//    foreach ($pages as $key => $page) {
//        echo $key . ' - ' . $page->user_id . ' - ' . $page->created_at . "<br>";
//    }

//    DB::table('pages')->insertOrIgnore([
//        ['id' => 1, 'name' => 'sisko@example.com'],
//        ['id' => 9, 'name' => 'archer@example.com'],
//    ]);
//    echo "All Ok! <br>";

//    $id = DB::table('PAGEs')->insertGetId(
//        ['name' => 'john@example.com', 'user_id' => 2, 'slug' => 'testslug']
//    );
//    echo $id . "<br>";

    $pages = DB::table('pages')
        ->orderBy('user_id', 'asc')
        ->orderBy('created_at', 'asc')
        ->paginate(3);
    return view('page.index', ['pages' => $pages]);

});

Route::get('/chunk', function () {
    Page::where('user_id', 2)
        ->chunkById(3, function ($pages) {
            $pages->each->update(['slug' => 'QQQ']);
        }, $column = 'id');
//    phpinfo();
    xdebug_info();
});

Route::get('/deltest', function () {
    $deletedRows = Page::where('slug', 'QQQ')->delete();
    return($deletedRows);
});
