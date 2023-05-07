<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    </head>
    <body>
        <h1>Welcome to Leah's Math book!</h1>

        <ul class="links-group">
            <a href="{{ route('quiz') }}">Quiz</a>
            <a href="{{ route('setting') }}">Setting</a>
            <a href="{{ route('history') }}">History</a>
            <a href="{{ route('reward') }}">Reward</a>
        </ul>
    </body>
</html>