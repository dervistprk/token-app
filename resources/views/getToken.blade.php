@extends('layout')
@section('content')
    <div class="container">
        <form class="form-control" method="post" action="{{ route('validate-token') }}">
            @csrf
            <div class="form-group">
                <label for="created_token">Oluşturulan Token</label>
                <input type="text" class="form-control" name="created_token" id="created_token" readonly value="{{ $string }}">
            </div>
            <div class="form-group">
                <label for="token">Token</label>
                <input type="text" class="form-control" name="token" id="token" placeholder="Token giriniz" required>
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary mt-2">Gönder</button>
            </div>
        </form>
    </div>
@endsection
