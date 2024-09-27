<x-layout_backend>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Permission Handled
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
                            <th>Expired at</th>
                            <th>Handle By</th>
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
                                <span
                                    class="badge
                                    @if($permit->status == 'approved')
                                        bg-success
                                    @elseif($permit->status == 'decline')
                                        bg-danger
                                    @else
                                        bg-warning
                                    @endif
                                    ">
                                    {{$permit->status}}
                                </span>
                            </td>
                            <td>{{$permit->expired_date}}</td>
                            <td>{{$permit->librarian}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</x-layout_backend>
