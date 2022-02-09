@extends('layouts.main-layout')

@section('content')
    
    <h1>Edit post</h1>

    <form action="{{ route('post.update', $post -> id)}}" method="POST">

        @method('POST')
        @csrf
        
        <label for="titolo">titolo</label>
        <input type="text" name="titolo" value="{{ $post -> titolo }}">

        <label for="sottotitolo">sottotitolo</label>
        <input type="text" name="sottotitolo" value="{{ $post -> sottotitolo }}">

        <label for="contenuto">contenuto</label>
        <textarea cols="30" rows="10" name="contenuto">{{ $post -> contenuto }}</textarea>

        <label for="data">data</label>
        <input type="date" name="data" value="{{ $post -> data }}">

        <label for="category">category</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category -> id }}"
                    
                    @if ($category -> id == $post -> category -> id)
                            selected
                    @endif
                    
                    >{{ $category -> name }}</option>
            @endforeach
        </select>

        <h4>Tags</h4>
        <label for="tags">tags</label>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{ $tag -> id }}"

            @foreach ($post -> tags as $postTag)
                @if ($tag -> id == $postTag -> id)
                    checked     
                @endif
            @endforeach

            > {{ $tag -> name }}
        @endforeach

        <br>
        <input type="submit" value="EDIT">

    </form>

@endsection