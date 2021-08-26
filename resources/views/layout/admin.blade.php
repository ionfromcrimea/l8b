<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Панель управления' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
{{--    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"--}}
{{--          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"--}}
{{--          crossorigin="anonymous"/>--}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-ru-RU.min.js"></script>--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--    <script src="{{ asset('js/admin.js') }}"></script>--}}
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
{{--    <script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.js') }}" type="module"></script>

</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-12">
{{--            @if ($message = Session::get('success'))--}}
{{--                <div class="alert alert-success alert-dismissible mt-0" role="alert">--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}
{{--            @endif--}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible mt-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
