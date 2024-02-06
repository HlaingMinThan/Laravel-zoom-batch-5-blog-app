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
        <form action="/">
            <input
                value="{{request('search')}}"
                type="text"
                name="search"
                placeholder="search here"
            >
            <button type="submit">search</button>
        </form>
        @forelse($blogs as $blog)
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
            <p>
                category - <a href="/categories/{{$blog->category->id}}">
                    {{$blog->category->name}}
                </a>
            </p>
            <p>
                Username - <a href="">Mg mg</a>
            </p>
            <p>published at -
                {{$blog->created_at;}}
            </p>
        </div>
        @empty
        <p>no blogs found...</p>
        @endforelse
    </div>
</body>

</html>