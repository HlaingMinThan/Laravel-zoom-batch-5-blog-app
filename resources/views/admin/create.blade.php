<x-admin-layout>
    <h1>Blog create form</h1>
    <form
        action="/admin/blogs/store"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="mb-3">
            <label
                for="exampleInputEmail1"
                class="form-label"
            >Title</label>
            <input
                value="{{old('title')}}"
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
                value="{{old('slug')}}"
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
                value="{{old('intro')}}"
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
                <option value="{{$category->id}}">{{$category->name}}</option>
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
                id="blog-create-body"
                cols="30"
                rows="10"
            >{{old('body')}}</textarea>
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