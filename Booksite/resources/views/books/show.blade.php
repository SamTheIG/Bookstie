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
        #categories{
            font-size: xx-large;
            color: cyan;
            padding:1px 90px 7px 60px;
        }
        #links{
            font-size: x-large;
            padding-top: 10px;
            padding-left: 50px;
        }
        p{
            font-size: x-large;
            color: white;
        }
    </style>
    <title>{{$book->Name}}</title>
</head>
<body>
    <div id="links">
        <a href="{{url('/home')}}">Home</a>
        <a href="{{url('/books')}}">Books</a>
        <a href="/books/{{$book->id}}/edit">Edit</a>
    </div>
        <div style="padding:10px 20px;float:left;">
            <pre id="bookdetail">
                <p>Name:</p> {{$book->Name}}
                <p>Pages:</p> {{$book->Pages}}
                <p>ISBN:</p> {{$book->ISBN}}
                <p>Price:</p> {{$book->Price}}
                <p>Published_at:</p> {{$book->Published_at}}
            </pre>
        </div>
        <div style="padding:55px 90px 4px 60px;float:right;">
            <p style="font-size:x-large; color:white;">Authors:</p>
                <p id="categories">
                    @foreach($book->authors as $author)
                        {{$author->name}}
                    @endforeach
                </p >
            
            <p style="font-size:x-large; color:white;">Categories:</p>
                <p id="categories">
                    @foreach($book->categories as $category)
                        {{$category->name}}
                    @endforeach
                </p>
        </div>
    </body>
</html>
