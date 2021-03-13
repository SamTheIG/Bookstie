<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
    @foreach($books as $book)
        <div style="font-size: x-large">
            <a href={{"/books/".$book->id}}>{{$book->Name}}</a>
        </div>
    @endforeach
</body>
</html>
