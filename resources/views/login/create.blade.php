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
    <h1>Login form</h1>
    <form
        action=""
        method="POST"
    >
        @csrf
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

        <button type="submit">Login</button>
    </form>
</body>

</html>