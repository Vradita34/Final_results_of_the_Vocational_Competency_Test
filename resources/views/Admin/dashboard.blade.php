<x-layout_backend>
    <h1>Dashboard</h1>
    <div class="page-content">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Users Totals</h6>
                                <h6 class="font-extrabold mb-0">{{$usersTotal}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Authors</h6>
                                <h6 class="font-extrabold mb-0">{{$authorsTotal}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Permissions</h6>
                                <h6 class="font-extrabold mb-0">{{$permissionsTotal}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Books</h6>
                                <h6 class="font-extrabold mb-0">{{$booksTotal}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>From Start Date to End Date with Print Data</h4>
            </div>
            <div class="d-flex ">
                <div class="form-group m-2">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
                        Print permissions
                    </button>
                    <!--login form Modal -->
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Permissions Form Date</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <form action="{{route('printPermission')}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <div class="modal-body">
                                        <label>Start Date: </label>
                                        <div class="form-group">
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                        <label>End Date: </label>
                                        <div class="form-group">
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Send</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-2">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#inlineForm2">
                        Print books
                    </button>
                    <!--login form Modal -->
                    <div class="modal fade text-left" id="inlineForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Book Form Print Date</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                </div>
                                <form action="{{route('printBookPopular')}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <div class="modal-body">
                                        <label>Start Date: </label>
                                        <div class="form-group">
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                        <label>End Date: </label>
                                        <div class="form-group">
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Send</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- table permissions -->
    @if(isset($permissions))
    <button class="btn btn-danger m-2" onclick="printDiv('permissionsTable')">Print Permissions</button>
    <section class="section" id="permissionsTable">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Data Permissions </h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Expired_at</th>
                                        <th>Handle By</th>
                                        <th>Request at</th>
                                        <th>Handle at</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($permissions as $permit)
                                    <tr>
                                        <td class="text-bold-500">{{ $loop->iteration}} </td>
                                        <td>{{$permit->user->username}}</td>
                                        <td class="text-bold-500">{{$permit->book->title}}</td>
                                        <td>{{$permit->status}}</td>
                                        <td>{{$permit->expired_date}}</td>
                                        <td>{{$permit->librarian}}</td>
                                        <td>{{$permit->created_at->diffForHumans()}}</td>
                                    </tr>
                                    @empty
                                    <p>No Data</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- table books -->
    @if(isset($books))
    <button class="btn btn-danger m-2" onclick="printDiv('booksTable')">Print Books Popular</button>
    <section class="section" id="booksTable">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Data Permissions </h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th>Category</th>
                                        <th>Release date</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($books as $book)
                                    <tr>
                                        <td class="text-bold-500">{{ $loop->iteration}} </td>
                                        <td>{{$book->title}}</td>
                                        <td class="text-bold-500">{{$book->author->name}}</td>
                                        <td>{{$book->publisher->name}}</td>
                                        <td>{{$book->category->name}}</td>
                                        <td>{{$book->release_date}}</td>
                                        <td>{{$book->created_at}}</td>
                                    </tr>
                                    @empty
                                    <p>No users</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    <script>
        function printDiv(divId) {
            let tablePrint = document.getElementById(divId).innerHTML;
            let originalContent = document.body.innerHTML;

            document.body.innerHTML = tablePrint;

            window.print();

            document.body.innerHTML = originalContent;
        }
    </script>
</x-layout_backend>
