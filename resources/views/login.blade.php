@extends('layout/_layout')
@section('title') Login @endsection
<link href="{{asset('site/singin.css')}}" rel="stylesheet">

@section('styles')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center">
        <form class="form-signin" method="POST" action="/login">
            @csrf
            <img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="128" height="128">
            <h1 class="h3 mb-3 font-weight-normal">Welcome to Dailytasks</h1>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password"  required>

            @include('layout/messages')

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; Dailytasks | 2021</p>
        </form>
    </div>
@endsection
