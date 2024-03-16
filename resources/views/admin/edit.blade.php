<x-admin-layout>
    <h1>Blog Edit form</h1>
    <form
        action="/admin/blogs/{{$blog->id}}/update"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label
                for="exampleInputEmail1"
                class="form-label"
            >Title</label>
            <input
                value="{{old('title',$blog->title)}}"
                name="title"
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
            >
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label
                for="exampleInputEmail1"
                class="form-label"
            >Photo</label>
            <input
                name="photo"
                type="file"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
            >
            <img
                src="{{$blog->photo}}"
                width="100"
                height="100"
                class="my-2"
            >
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPassword1"
                class="form-label"
            >Slug</label>
            <input
                value="{{old('slug',$blog->slug)}}"
                name="slug"
                type="text"
                class="form-control"
                id="exampleInputPassword1"
            >
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPassword1"
                class="form-label"
            >Intro</label>
            <input
                value="{{old('intro',$blog->intro)}}"
                name="intro"
                type="text"
                class="form-control"
                id="exampleInputPassword1"
            >
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPassword1"
                class="form-label"
            >Intro</label>
            <select
                name="category_id"
                id=""
                class="form-control"
            >
                @foreach ($categories as $category)
                <option {{$category->id == $blog->category_id
                    ? 'selected' : ''}}
                    value="{{$category->id}}"
                    >{{$category->name}}</option>
                @endforeach
            </select>
            @error('intro')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label
                for="exampleInputPassword1"
                class="form-label"
            >Body</label>
            <textarea
                class="form-control"
                name="body"
                id=""
                cols="30"
                rows="10"
            >{{old('body',$blog->body)}}</textarea>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >Submit</button>
    </form>
</x-admin-layout>