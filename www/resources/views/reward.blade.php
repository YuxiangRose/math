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
        <div style="text-align: center">
            <p><h2>Total Stars: <h2 style="color: red">{{$totalStars}}</h2></h2></p>
        </div>        
        <div class = "reward-container">
            <div class="card-deck">
                @foreach ($rewards as $reward)
                    <div class="card">
                        <img src="{{$reward['url']}}" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">{{ $reward['name'] }}</h2>
                            <input type="hidden" class="rewardId" name="rewardId" value="{{ $reward['rewardId'] }}">
                            <span class="card-text" style="color:red">{{ $reward['stars'] }}</span>   Stars
                            <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <button class="btn btn-primary claim-btn" @if ($reward['isDisabled']) disabled @endif>Claim</button>
                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-danger rm-btn">Remove</button>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="upload">
            <form action="/file-upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="form-group">
                        <label for="file">Select a file:</label>
                        <input class="flie-uploader" type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="rewardName">Reward Name:</label>
                        <input class="flie-uploader-name" type="text" name="rewardName" id="rewardName">
                    </div>
                    <div class="form-group">
                        <label for="factor">How Many stars it worth:</label>
                        <input class="flie-uploader-stars" type="number" class="form-control" id="starNumber" name="starNumber" value="" required>
                    </div>
                </div>
                <button class="file-uploader-btn" type="submit">Upload</button>
            </form>
        </div>

    </body>
</html>