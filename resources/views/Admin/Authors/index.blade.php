<x-layout_backend>
    <a href="{{route('authors.create')}}">
        <button class="btn btn-outline-info">Add Author</button>
    </a>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Authors
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
                        @foreach ($authors as $author)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$author->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('authors.edit',$author->id)}}">
                                        <button class="btn btn-outline-warning">Edit</button>
                                    </a>
                                    <form action="{{route('authors.destroy',$author->id)}}" method="POST">
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
