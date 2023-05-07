<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    </head>
    <h1>Welcome to Leah's Math book!</h1>

        <ul class="links-group">
            <a href="{{ route('quiz') }}">Quiz</a>
            <a href="{{ route('setting') }}">Setting</a>
            <a href="{{ route('history') }}">History</a>
            <a href="{{ route('reward') }}">Reward</a>
        </ul>
    <body>
        <div class="container">
  <h1>Settings</h1>

  <form action="/setting-save" method="POST">
    @csrf
    <!-- form content here -->

    <div class="form-group">
      <label for="max">Maximum Value:</label>
      <input type="number" class="form-control" id="max" name="max" value="{{ $settings->max}}" required>
    </div>

    <div class="form-group">
      <label for="min">Minimum Value:</label>
      <input type="number" class="form-control" id="min" name="min" value="{{  $settings->min }}" required>
    </div>

    <div class="form-group">
      <label for="number_of_questions">Number of Questions:</label>
      <input type="number" class="form-control" id="number_of_questions" name="number_of_questions" value="{{  $settings->numberOfQuestion}}" required>
    </div>

    <div class="form-group">
      <label for="percentage_for_pass">Percentage for Pass:</label>
      <input type="number" class="form-control" id="percentage_for_pass" name="percentage_for_pass" value="{{ $settings->percentageForPass }}" required>
    </div>

    <div class="form-group">
      <label for="factor">Number of factor:</label>
      <input type="number" class="form-control" id="factor" name="factor" value="{{ $settings->factor}}" required>
    </div>

    <div class="form-group">
      <label for="reward_rate">Reward rate:</label>
      <input type="number" class="form-control" id="reward_rate" name="reward_rate" value="{{ $settings->rewardRate }}" required>
    </div>

    <div class="form-group">
      <label for="time_limitation">Time Limitation (Seconds):</label>
      <input type="number" class="form-control" id="time_limitation" name="time_limitation" value="{{ $settings->timeLimitaion }}" required>
    </div>

    <div class="form-group">
      <label>Operators:</label><br>
      <div class="custom-control custom-switch">
        <label for="addition">Addition:</label>
        <input type="hidden" name="addition" value="0">
        <label class="switch">
          <input type="checkbox" class="switch-input" id="addition" name="addition" {{ $settings->addition ? 'checked' : '' }}>
          <span class="slider"></span>
        </label>
      </div>
      <div class="custom-control custom-switch">
        <label for="subtraction">Subtraction:</label>
        <input type="hidden" name="subtraction" value="0">
        <label class="switch">
          <input type="checkbox" class="switch-input" id="subtraction" name="subtraction" {{$settings->subtraction ? 'checked' : '' }}>
          <span class="slider"></span>
        </label>
      </div>
      <div class="custom-control custom-switch">
        <label for="multiplication">Multiplication:</label>
        <input type="hidden" name="multiplication" value="0">
        <label class="switch">
          <input type="checkbox" class="switch-input" id="multiplication" name="multiplication" {{ $settings->multiplication ? 'checked' : '' }}>
          <span class="slider"></span>
        </label>
      </div>
      <div class="custom-control custom-switch">
        <label for="division">Division:</label>
        <input type="hidden" name="division" value="0">
        <label class="switch">
          <input type="checkbox" class="switch-input" id="division" name="division" {{ $settings->division ? 'checked' : '' }}>
          <span class="slider"></span>
        </label>
      </div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-save">Save</button>
    </div>

  </form>
</div>        
    </body>
</html>