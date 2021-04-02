<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            background-color: darkgoldenrod;
        }
        pre{
            margin-left: 20px;
        }
        #bookdetail{
            font-size: xx-large;
            color: cyan;

        }
        p{
            font-size: x-large;
            color: white;
        }
    </style>
    <title>{{$book->Name}}</title>
</head>
<body>
    <pre id="bookdetail">
        <p>Name:</p> {{$book->Name}}
        <p>Pages:</p> {{$book->Pages}}
        <p>ISBN:</p> {{$book->ISBN}}
        <p>Price:</p> {{$book->Price}}
        <p>Published_at:</p> {{$book->Published_at}}
    </pre>
</body>
</html>
