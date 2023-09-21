@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
        @if (Session::has('success'))
            <p class="alert alert-success"> {{ Session::get('success') }}</p>
        @endif

          
            @if($errors->any())
                @foreach($errors->all() as $err)
                    <p class="alert alert-danger"> {{$err}}</p>
                @endforeach
            @endif
            <form method="POST" action="{{route('password.action')}}">
                @csrf
               
                <div class="mb-3">
                    <label>Old Passsword <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="old_password" />
                </div>

                <div class="mb-3">
                    <label>New Passsword <span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="new_password" />
                </div>

                <div class="mb-3">
                    <label>New Passsword Confirmation<span class="text-danger">*</span> </label>
                    <input type="password" class="form-control" name="new_password_confirmation" />
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Change</button>
                    <a href="{{route('home')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection