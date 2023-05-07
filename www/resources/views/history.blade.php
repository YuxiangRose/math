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
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Correct</th>
                    <th>Wrong</th>
                    <th>Pecentage</th>
                    <th>Pass</th>
                    <th>Order</th>
                    <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($quizs as $quiz)
                    <tr>
                        <td>{{ $quiz['date'] }}</td>
                        <td>{{ $quiz['duration'] }}</td>
                        <td>{{ $quiz['correct'] }}</td>
                        <td>{{ $quiz['wrong'] }}</td>
                        <td>{{ $quiz['percentage'] }}</td>
                        <td>{{ $quiz['isPass'] }}</td>
                        <td>{{ $quiz['order'] }}</td>
                        <td><a href="quizDetails/{{$quiz['order']}}">View Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
    </body>
</html>