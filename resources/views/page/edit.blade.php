@extends('layout.admin', ['title' => 'Редактирование страницы'])

@section('content')
    <h1>Редактирование страницы</h1>
    <form method="post" action="{{ route('page.update', ['page' => $page->id]) }}">
        @method('PUT')
        @include('page.part.form')
    </form>
@endsection
