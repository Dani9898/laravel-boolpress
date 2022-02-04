<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Super-login</title>

    <script src="{{ asset('/js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>
<body>
    
    <div id="app">

        {{-- @include('components.header')
    
        @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <ul> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif  --}}
    
        @yield('content')

        {{-- @include('components.footer') --}}

    </div>
    
</body>
</html>