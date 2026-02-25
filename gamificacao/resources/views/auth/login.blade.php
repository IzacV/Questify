@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container">

    <div class="login-box">
        <h2>SIGN IN</h2>

        <form>
            <div class="input-group">
                <input type="text" placeholder="Username">
            </div>

            <div class="input-group">
                <input type="password" placeholder="Password">
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>

    <div class="banner">
        <div>
            <h1>Questify</h1>
            <p>Sistema de Gamificação</p>
        </div>
    </div>

</div>

@endsection