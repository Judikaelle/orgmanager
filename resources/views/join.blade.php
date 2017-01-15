<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Join {{ $org->name }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
    <link href="{{ url('/css/join.css') }}" rel="stylesheet">
    <link href="{{ url('/css/flatty.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                  <img src="{{ $org->avatar }}" class="logo"><br>
                    Join {{ $org->name }}
                    @if ($org->description)
                    <blockquote>{{ $org->description }}</blockquote>
                    @endif
                </div>
                <div class="join">
                  Enter your GitHub username @if ($org->password != null && trim($org->password) != "")and the password @endif to join {{ $org->name }}:<br><br>
                    <form id="join" method="POST" href="{{ url('join/'.$org->id) }}">
                      {{ csrf_field() }}
                      <input type="text" name="username" class="textbox" placeholder="Your GitHub username"><br><br>
                      @if ($org->password != null && trim($org->password) != "")
                      <input type="password" name="password" class="textbox" placeholder="password"><br><br>
                      @endif
                      <button type="submit" class="submit-button" name="submit">Join!</button>
                    </form>
                </div>
                <p class="by">Added by <a href="https://github.com/{{ $org->username }}" target="_blank">{{ $org->username }}</a></p>
            </div>
        </div>
        <div class="using-github">
          Using <span class="octicon octicon-logo-github"></span>
        </div>
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/toastr.min.js') }}"></script>
        {!! Toastr::render() !!}
    </body>
</html>