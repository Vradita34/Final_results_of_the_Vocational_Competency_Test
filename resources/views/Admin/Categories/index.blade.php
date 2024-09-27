<x-layout_backend>
    <a href="{{route('category.create')}}">
        <button class="btn btn-outline-info m-2">Add Category</button>
    </a>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Categories
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('category.edit',$category->id)}}">
                                        <button class="btn btn-outline-warning">Edit</button>
                                    </a>
                                    <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</x-layout_backend>
