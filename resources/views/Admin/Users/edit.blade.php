<x-layout_backend>
<a href="{{route('genres.index')}}">
        <button class="btn btn-outline-info m-2">Data Genres</button>
    </a>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Email</label>
                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{old('username',$user->email)}}" readonly>
                                            </div>
                                            @error('email')
                                            <p class="text-warning">{{$message}}</p>
                                            @enderror
                                        </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Username" name="username" value="{{old('username',$user->username)}}">
                                        </div>
                                        @error('username')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Name" name="name" value="{{old('name',$user->name)}}">
                                        </div>
                                        @error('name')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6>Role</h6>
                                        <div class="form-group">
                                            <select class="choices form-select" name="role">
                                                <option value="reader" {{ $user->role == 'reader' ? 'selected' : '' }}>Reader</option>
                                                <option value="librarian" {{ $user->role == 'librarian' ? 'selected' : '' }}>Librarian</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </div>
                                        @error('role')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Address</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{old('address',$user->address)}}</textarea>
                                        </div>
                                        @error('address')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout_backend>
