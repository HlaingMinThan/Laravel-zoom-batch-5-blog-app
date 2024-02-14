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

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >


</head>

<body>

    <div class="container">
        {{-- session flash --}}
        @if (session('success'))
        <h1>{{session('success')}}</h1>
        @endif
        <nav>
            <ul>
                @if (!auth()->user())
                <li><a href="/login">login</a></li>
                <li><a href="/register">register</a></li>
                @else
                <li>{{auth()->user()->name}}</li>
                <li>
                    <form
                        action="/logout"
                        method="POST"
                    >
                        @csrf
                        <button>logout</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
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
                Username - <a href="/authors/{{$blog->author->username}}">
                    {{$blog->author->name}} ({{$blog->author->username}})
                </a>
            </p>
            <p>published at -
                {{$blog->created_at;}}
            </p>
        </div>
        @empty
        <p>no blogs found...</p>
        @endforelse

        {{$blogs->links()}}
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"
    ></script>
</body>

</html>