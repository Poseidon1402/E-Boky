<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href={{ asset('css/card.css') }}>
        <title>All Books</title>
    </head>
    
    <body>
        <div class="grid-container">
            @foreach ($books as $book)
                <div>
                    <x-book.card :book="$book" />
                </div>
            @endforeach
        </div>
        <style>
            
        </style>
    </body>
</html>