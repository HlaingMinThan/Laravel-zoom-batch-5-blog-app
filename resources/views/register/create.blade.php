<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Document</title>
</head>

<body>
    <h1>Register form</h1>
    <form
        action=""
        method="POST"
    >
        @csrf
        <div>
            <input
                value="{{old('name')}}"
                type="text"
                placeholder="name"
                name="name"
            >
            @error('name')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <input
                value="{{old('username')}}"
                type="text"
                placeholder="username"
                name="username"
            >
            @error('username')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <input
                value="{{old('email')}}"
                type="text"
                placeholder="email"
                name="email"
            >
            @error('email')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <input
                type="text"
                placeholder="password"
                name="password"
            >
            @error('password')
            <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit">create</button>
    </form>
</body>

</html>