@extends('layout')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success m-2">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger m-2">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="m-2">
        <a class="btn btn-primary" href="{{ route('get-token') }}">Geri</a>
    </div>
@endsection
