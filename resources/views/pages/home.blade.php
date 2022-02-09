@extends('layouts.main-layout')

@section('content')
    
@auth
    
    <h1>Welcome {{ Auth::user() -> name }} :)</h1>

    <a class="btn btn-secondary" href="{{ route('logout') }}">LOGOUT</a>

    <a class="btn btn-primary" href="{{ route('post.create') }}">CREATE</a>

    <table border=1>

        <tr>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Sottotitolo</th>
            <th>Contenuto</th>
            <th>Data</th>
            <th>Categories</th>
            <th>Tags</th>
        </tr>
    
        @foreach ($posts as $post)
    
        <tr>
            <td>{{ $post -> titolo }}</td> 
            <td>{{ $post -> autore }}</td> 
            <td>{{ $post -> sottotitolo }}</td> 
            <td>{{ $post -> contenuto }}</td> 
            <td>{{ $post -> data }}</td> 
            <td>{{ $post -> category -> name}}</td> 
            <td>
                @foreach ($post -> tags as $tag)
                    {{$tag -> name}}
                @endforeach
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('post.edit', $post -> id) }}">EDIT</a>
            </td> <td>
                <a class="btn btn-danger" href="{{ route('post.delete', $post -> id) }}">DELETE</a>
            </td>
        </tr>
    
        @endforeach
        
    </table>

@endauth

@guest

<h1>POSTS</h1>

<h2>Register</h2>
<form action="{{ route('register') }}" method="POST">

    @method('POST')
    @csrf

    <label for="name">Name</label><br>
    <input type="text" name="name" ><br>
    <label for="email">Email</label><br>
    <input type="email" name="email"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password"><br>
    <label for="password_confirmation">Password confirmation</label><br>
    <input type="password"  name="password_confirmation"><br>
    <br>
    <input type="submit" value="REGISTER">

</form>
<hr>        

<h2>Login</h2>
<form action="{{ route('login') }}" method="POST">

    @method('POST')
    @csrf

    <label for="email">Email</label><br>
    <input type="email" name="email"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password"><br>
    <br>
    <input type="submit" value="LOGIN">

</form>

@endguest



{{-- <ul>
     
    @foreach ($posts as $post)

    <li>
        {{ $post -> titolo }} <br>
        {{ $post -> autore }} <br>
        {{ $post -> sottotitolo }} <br>
        {{ $post -> contenuto }} <br>
        {{ $post -> data }} <br>
        {{ $post -> category -> name}} <br>
        @foreach ($post -> tags as $tag)
            {{$tag -> name}}
        @endforeach <br>
    </li>
        
    @endforeach 
 
</ul> --}}

@endsection