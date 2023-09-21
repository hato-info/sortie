<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Login</title>
</head>
<body>
    
<section>
    <div class="form-container">
   <h1>login form</h1>
        @if (Session::has('success'))
            <p class="alert alert-success"> {{ Session::get('success') }}</p>
        @endif
          
            @if($errors->any())
                @foreach($errors->all() as $err)
                    <p class="alert alert-danger"> {{$err}}</p>
                @endforeach
            @endif
            <form method="POST" action="{{route('login.action')}}">
                @csrf
                
                <div class="control">
                    <label for="name">User Name <span class="text-danger"></span> </label>
                    <input type="text" class="form-control" id="name" name="username" value="{{ old('username')}}" />
                </div>
                <div class="control">
                    <label for="psw">Passsword <span class="text-danger"></span> </label>
                    <input type="password" id="psw" class="form-control" name="password" />
                </div>
                <span><input type="checkbox">Remember me.</span>
                <div class="control">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>
</section>

</body>
</html>