<x-layout_backend>
    <a href="{{route('genres.create')}}">
        <button class="btn btn-outline-info m-2">Add Genre</button>
    </a>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Simple Datatable
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
                        @foreach ($genres as $genre)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$genre->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('genres.edit',$genre->id)}}">
                                        <button class="btn btn-outline-warning">Edit</button>
                                    </a>
                                    <form action="{{route('genres.destroy',$genre->id)}}" method="POST">
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
