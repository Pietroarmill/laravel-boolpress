@extends('layouts.dashboard')

@section('content')
    <h2>Ciao {{ $user->name }}! Sei nella pagina home di back office</h2>
    <p>{{ $userInfo->phone }}</p>
    <p>{{ $userInfo->address }}</p>
@endsection