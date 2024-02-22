<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
</head>

<body>
    <h1> {{ $blog->title }}

        <form
            action="/blogs/{{$blog->id}}/subscribe"
            method="POST"
        >
            @csrf
            <button type="submit">

                {{ !auth()->user()->isSubscribed($blog) ? 'subscribe' : 'unsubscribe'}}
            </button>
        </form>
    </h1>
    <p> {{ $blog->body }}</p>

    <h1>Comments</h1>
    <label for="">Comment body</label>
    <form
        action="/blogs/{{$blog->id}}/comments/store"
        method="POST"
    >
        @csrf
        <textarea
            name="body"
            id=""
            cols="30"
            rows="10"
        ></textarea>
        @error("body")
        <p>{{$message}}</p>
        @enderror
        <button type="submit">Comment</button>
    </form>
    @foreach ($comments as $comment)
    <div>
        <h4>
            {{$comment->user->name}}

            <span>
                ({{$comment->created_at->diffForHumans()}})
            </span>
        </h4>

        <p>{{$comment->body}}</p>
    </div>
    @endforeach

    {{$comments->links()}}
</body>

</html>