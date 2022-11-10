<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Books</title>
        @vite('resources/css/app.css')
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
            @import url('https://fonts.googleapis.com/css2?family=Jost:wght@300;400&display=swap');
        
            .card-header {
                width: 250px;
                height: 150px;
                border-radius: 25px 25px 0px 0px;
            }
            .card-body {
                width: 250px;
                height: 130px;
                background: rgba(245, 245, 245, 0.15);
                border-radius: 1px;
                top: 148px;
                margin-top: 0px;
            }
            .card-footer {
                top: 278px;
                
                width: 250px;
                height: 55px;
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
                background: linear-gradient(180deg, #D98B60 13.02%, #D5395E 94.27%);
                border-radius: 4px 4px 20px 20px;
            }
            p {
                margin-top: 2px;
                font-family: 'Jost';
                font-style: normal;
                font-weight: 600;
                font-size: 15px;
                text-align: center;
                color: #FFFFFF;
            }
            .line {
                width: 0;
                border: 1px solid #797373;
                opacity: 0.5;
            }
            .difference {
                font-family: 'Jost';
                font-style: normal;
                font-weight: 600;
                font-size: 16px;
                text-align: center;
                color: #E07057;
            }
            .grid-container {
                display: inline-grid;
                grid-template-columns: auto auto auto;
            }
            .title {
                margin-top: 10px;
                font-family: 'Jost';
                font-style: normal;
                font-weight: 600;
                font-size: 22px;
                line-height: 15px;
                text-align: center;
                color: #000000c4;
            }
            .description {
                font-family: 'Jost';
                font-style: normal;
                font-weight: 400;
                font-size: 13px;
                margin-top: 8px;
                line-height: 18px;
                text-align: center;
                color: rgba(0, 0, 0, 0.49);
            }
            #card {
                margin: 10px;
                position: relative;
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            }
        </style>
    </body>
</html>