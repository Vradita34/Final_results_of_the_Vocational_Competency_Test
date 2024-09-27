    <!-- Button trigger for login form modal -->
    <!-- <button type="button" class="btn btn-outline-success" >
        Launch Modal
    </button> -->
    <p class="m-2">
        <span class="icon_profile text-white" data-bs-toggle="modal" data-bs-target="#inlineFormProfile"></span>
    </p>

    <!--login form Modal -->
    <div class="modal fade text-left" id="inlineFormProfile" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Update  My Profile </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Username: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Username" name="username" value="{{auth()->user()->username}}" class="form-control">
                            @error('username')
                            <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <label>Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" value="{{auth()->user()->name}}" class="form-control">
                            @error('name')
                            <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <label>Address: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Address" name="address" value="{{auth()->user()->address}}" class="form-control">
                            @error('address')
                            <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <label>OldPassword: </label>
                        <div class="form-group">
                            <input type="password" name="oldPassword" placeholder="oldPassword" class="form-control">
                            @error('oldPassword')
                            <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <label>NewPassword: </label>
                        <div class="form-group">
                            <input type="password" name="newPassword" placeholder="newPassword" class="form-control">
                            @error('newPassword')
                            <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
