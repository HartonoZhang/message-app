<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1>Send a Message</h1>
            <form method="post" action="/message">
                @csrf
                <label for="number">Phone Number? <input name="number" id="number" type="text"/></label><br>
                <label for="message">Message? <input name="message" id="message" type="text"/></label><br>
                <input type="submit" />
            </form>
        </div>
    </body>
</html>
