<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>HomePage</h1>
        @foreach($users as $user)
        <p>{{ $user-> name }}</p>
        <p>{{ $user-> email }}</p>
        @endforeach
</body>
</html>
