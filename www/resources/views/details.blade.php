<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <h1>Welcome to Leah's Math book!</h1>

        <ul class="links-group">
            <a href="{{ route('quiz') }}">Quiz</a>
            <a href="{{ route('setting') }}">Setting</a>
            <a href="{{ route('history') }}">History</a>
            <a href="{{ route('reward') }}">Reward</a>
        </ul>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Correction</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>{{ $question->correction ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
    </body>
</html>