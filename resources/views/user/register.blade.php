@extends('app')
@section('content')

<div class="container">
    <div class="row align-items-center">

        <div class="col-md-1"></div>
            <div class="col-md-7 m-auto">

                <div class="card mt-3">
            
                    <div class="card-body p-2 border-info">
                        
                    <h4 class="text-center text-warning mt-2 mb-4">Ajouter un Utilisateur : </h4>

                        <form method="POST" action="{{route('register.action')}}" class="form-horizontal">
                        @csrf
                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                                <label class="col-md-2 col-sm-6 col-form-label">Name <span class="text-danger"></span> </label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name')}}" />
                                    @error('name')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label">Username <span class="text-danger"></span> </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username')}}" />
                                @error('username')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label"> Passsword </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="password" class="form-control" placeholder="........." name="password" />
                                @error('password')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                            <label class="col-md-2 col-sm-6 col-form-label"> Passsword Confirmation  </label>
                            <div class="col-md-8 col-sm-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="........."/>
                            </div>
                        </div>

                        <div class="row form-group mb-3 mt-2">
                        <div class="col-1"></div>
                                <label class="col-md-2 col-sm-6 col-form-label">E-mail </span> </label>
                                <div class="col-md-8 col-sm-6">
                                    <input type="text" class="form-control" name="email" placeholder="exemple@gmail.com" value="{{ old('email')}}" />
                                    @error('email')
                                    <p class="alert alert-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                        </div>

                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a href="{{route('user')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
    </div>
</div>
@endsection