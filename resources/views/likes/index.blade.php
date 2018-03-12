@extends('layouts.app')
@section('content')
    <h1>Chusqer ID ->  {{$likes[0]->chusqer->id}}</h1>
    <h2>Ordenado por orden cronologico </h2>
    @foreach($likes as $like)
        @include('likes.users')
    @endforeach
@endsection