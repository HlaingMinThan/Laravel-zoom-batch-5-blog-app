<x-layout>
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
    <p> {!! $blog->body !!}</p>

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
        @can('edit',$comment)
        <a
            href=""
            class="btn btn-warning my-2 mx-2"
        >edit</a>
        @endcan

        @can('delete',$comment)
        <a
            href=""
            class="btn btn-danger"
        >delete</a>
        @endcan
    </div>
    @endforeach

    {{$comments->links()}}
</x-layout>