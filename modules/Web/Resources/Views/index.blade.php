<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('web::head')
</head>
<body>
@include('web::header')
@include('web::main-tabs')

@yield('content')

@include('web::footer')
</body>
</html>
