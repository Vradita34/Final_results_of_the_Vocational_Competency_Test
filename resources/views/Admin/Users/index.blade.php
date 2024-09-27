<x-layout_backend>
<section class="section">
    <a href="{{route('users.create')}}">
        <button class="btn btn-outline-info">Add Users</button>
    </a>
        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <!-- <th>Avatar</th> -->
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Addres</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <span class="badge bg-success">{{$user->role}}</span>
                            </td>
                            <td>{{$user->address}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('users.edit',$user->id)}}">
                                        <button class="btn btn-outline-warning">Edit</button>
                                    </a>
                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
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
