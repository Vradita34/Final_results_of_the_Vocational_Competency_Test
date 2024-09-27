<x-layout_backend>
    <section class="section">
        <div class="card">
            <div class="card-header">
                New Permissions
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Book</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$permit->user->name}}</td>
                            <td>{{$permit->book->title}}</td>
                            <td>{{$permit->created_at}}</td>
                            <td>
                                <span class="badge bg-warning">{{$permit->status}}</span>
                            </td>
                            <td>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <!-- Button trigger for login form modal -->
                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                            Handle
                                        </button>

                                        <!--login form Modal -->
                                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Handle Permission {{ $permit->user->username }} </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('handlePermissions',$permit->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <label>Note (Optional): </label>
                                                            <div class="form-group">
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-primary ml-1" name="action" value="approved">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Approved</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-danger ml-1" name="action" value="decline">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Decline</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
