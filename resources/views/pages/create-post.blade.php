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

        <label for="category">category</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
            @endforeach
        </select>

        <h4>Tags</h4>
        <label for="tags">tags</label>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"> {{ $tag -> name }}
        @endforeach

        <input type="submit" value="CREATE">

    </form>

@endsection