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

    <link
        rel="stylesheet"
        href="/style.css"
    >

</head>

<body>

    <div class="container">
        <h1>
            {{$title}}
        </h1>
        @foreach($blogs as $blog)
        <div
            class="blog-card"
            style="{{$loop->even ? 'background-color: lightgreen;' : ''}}"
        >
            <h3>
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}

                    @if($blog->title === 'Fourth Blog')
                    <span>(Scheduled Blog)</span>
                    @endif
                </a>
            </h3>
            <p>
                {{ $blog->intro}}
            </p>
            <p>published at -
                {{$blog->created_at;}}
            </p>
        </div>
        @endforeach
    </div>
</body>

</html>