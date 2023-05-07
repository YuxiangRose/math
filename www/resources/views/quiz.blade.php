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
<div class="container">
  <h1>QUIZ</h1>

  <form action="/quiz-submit" method="POST">
    @csrf
    <!-- form content here -->
    <p id="countdown">{{ gmdate("i:s", $settings->timeLimitaion) }}</p>
    <script>
        $(function() {
            // Set the initial countdown value (in seconds)
            var timeLeft = {{ $settings->timeLimitaion }};

            // Define a function to update the countdown label
            function updateTimeLeft() {
                // Convert the remaining time to minutes and seconds
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;

                // Use string interpolation to format the time as MM:SS
                var formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                // Update the countdown label with the new time left
                $('#countdown').html(formattedTime);
                $('#submitCountDown').val(timeLeft);

                // Decrement the time left by 1 second
                timeLeft--;

                // If there's no time left, stop the countdown
                if (timeLeft < 0) {
                    clearInterval(timer);
                }
            }

            // Call the updateTimeLeft function every second
            var timer = setInterval(updateTimeLeft, 1000);
        });
    </script>

    @foreach($questions as $key => $question)
    <div class="form-group">
        <label>{{ $question }} = </label>
        <input type="number" class="form-control" name="{{$key}}" value="" required>
    </div>
    @endforeach

    <input type="hidden" name="questions" value="{{ json_encode($questions) }}">
    <input type="hidden" id="submitCountDown" name="countdown" value="">

    <div class="text-center">
      <button type="submit" class="btn btn-save">Save</button>
    </div>

  </form>
</div>

        
    </body>
</html>