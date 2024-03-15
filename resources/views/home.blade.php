<x-layout>
    {{-- session flash --}}
    @if (session('success'))
    <div
        class="alert alert-success"
        role="alert"
    >
        {{session('success')}}
    </div>
    @endif
    <h1>
        {{$title}}
    </h1>
    <form action="/">
        @if (request('category'))
        <input
            type="hidden"
            name="category"
            value="{{request('category')}}"
        >
        @endif
        <input
            value="{{request('search')}}"
            type="text"
            name="search"
            placeholder="search here"
        >
        <button type="submit">search</button>
    </form>
    <div class="dropdown">
        <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
        >
            Filter by category
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            @foreach ($categories as $category)
            <li><a
                    class="dropdown-item"
                    href="/?category={{$category->id}}{{request('search') ? '&search='.request('search') : ''}}"
                >{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
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
            {{ substr($blog->body,0,200)}}...
        </p>
        <p>
            category - <a href="/?category={{$blog->category->id}}">
                {{$blog->category->name}}
            </a>
        </p>
        <p>
            Username - <a href="?/username={{$blog->author->username}}">
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
</x-layout>