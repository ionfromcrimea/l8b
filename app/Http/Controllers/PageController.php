<?php

namespace App\Http\Controllers;

use App\Events\CreatePageEvent;
use App\Events\UpdatePageEvent;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller {
    /**
     * Показывает список всех страниц
     */
    public function index() {
        $pages = Page::all();
        return view('page.index', compact('pages'));
    }

    /**
     * Показывает форму для создания страницы
     */
    public function create() {
        return view('page.create');
    }

    /**
     * Сохраняет новую страницу в базу данных
     */
    public function store(Request $request) {
        $page = Page::create($request->all());
        /*
         * возбуждаем событие создания страницы
         */
        event(new CreatePageEvent($page));
        return redirect()->route('page.show', ['page' => $page->id]);
    }

    /**
     * Показывает информацию о странице сайта
     */
    public function show(Page $page) {
        return view('page.show', compact('page'));
    }

    /**
     * Показывает форму для редактирования страницы
     */
    public function edit(Page $page) {
        return view('page.edit', compact('page'));
    }

    /**
     * Обновляет страницу (запись в таблице БД)
     */
    public function update(Request $request, Page $page) {
        $page->update($request->all());
        UpdatePageEvent::dispatch($page);
        return redirect()->route('page.show', ['page' => $page->id]);
    }

    /**
     * Удаляет страницу (запись в таблице БД)
     */
    public function destroy(Page $page) {

        $page->delete();
        return redirect()->route('page.index');
    }
}
