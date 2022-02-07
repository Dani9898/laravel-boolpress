@extends('layouts.main-layout')

@section('content')
    
    <h1>Create post</h1>

    <form action="{{ route('post.store') }}" method="POST">

        @method('POST')
        @csrf
        
        <label for="titolo">titolo</label>
        <input type="text" name="titolo">

        <label for="sottotitolo">sottotitolo</label>
        <input type="text" name="sottotitolo">

        <label for="contenuto">contenuto</label>
        <input type="textarea" name="contenuto">
        <label for="data">data</label>
        <input type="date" name="data">

        <input type="submit" value="CREATE">

    </form>

@endsection