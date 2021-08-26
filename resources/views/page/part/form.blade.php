@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Наименование"
           required maxlength="100" value="{{ old('name') ?? $page->name ?? '' }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="ЧПУ (на англ.)"
           required maxlength="100" value="{{ old('slug') ?? $page->slug ?? '' }}">
</div>
<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Контент (html)" required
              id="editor" rows="10">{{ old('content') ?? $page->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
