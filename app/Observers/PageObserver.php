<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver {

    /*
     * Срабатывает перед записью новой страницы
     */
    public function creating(Page $page) {
        $page->content = 'Перед созданием, ' . $page->content;
    }

    /*
     * Срабатывает при извлечении из базы данных
     */
    public function retrieved(Page $page) {
        $page->content = 'При извлечении, ' . $page->content;
    }

    /*
     * Срабатывает перед удалением страницы из БД
     */
    public function deleting(Page $page) {
        return false;
    }
}
