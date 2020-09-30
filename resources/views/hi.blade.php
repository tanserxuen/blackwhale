@extends('layouts.app')

@section('content')
<div class="links">
    <a href="{{ route('alert','basic')}}">basic</a>
    <a href="{{ route('alert','success')}}">success</a>
    <a href="{{ route('alert','warning')}}">warning</a>
    <a href="{{ route('alert','info')}}">info</a>
    <a href="{{ route('alert','error')}}">error</a>
    </div>
@endsection