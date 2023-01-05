@extends('diseño')

@if ($message = Session::get('msg'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{$message}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="login">
	<h1>Login</h1>
    <form method="POST" action="{{url("sesion")}}">
        @csrf
    	<input type="text" name="email" placeholder="email" required="required" />
        @error('email')
            <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="password" name="password" placeholder="Password" required="required" />
        @error('password')
            <small class="text-danger">{{$message}}</small>
        @enderror
        <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar sesion</button>
    </form>
    <div style="text-align: center">
        <a href="/registrar">Registrar</a>
    </div>

</div>
