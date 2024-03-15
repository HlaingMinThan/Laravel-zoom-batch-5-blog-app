<x-layout>
    <div class="row my-3">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/admin">Blog List</a>
                </li>
                <li class="list-group-item">
                    <a href="/admin/blogs/create">Blog create</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            {{$slot}}
        </div>
    </div>
</x-layout>