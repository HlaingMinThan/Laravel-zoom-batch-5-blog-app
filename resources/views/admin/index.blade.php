<x-admin-layout>
    <h1>Blogs</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">title</th>
                <th scope="col">slug</th>
                <th
                    scope="col"
                    colspan="2"
                >actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                @can('edit',$blog)
                <td><a
                        href="/admin/blogs/{{$blog->id}}/edit"
                        class="btn btn-warning"
                    >edit</a></td>
                @endcan
                @can('delete',$blog)
                <td>
                    <form
                        action="/admin/blogs/{{$blog->id}}/delete"
                        method="POST"
                    >
                        @method("DELETE")
                        @csrf
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >delete</button>
                    </form>
                </td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>