<x-layout_frontend>

    <section class="product spad ">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="section-title">
                    <h4>My Permission</h4>
                </div>
            </div>
            <div class="col-12 col-md-12 ">
                <div class="card border-none">
                    <div class="card-header bg-dark">
                        <h4 class="card-title text-white">Data Permissions</h4>
                    </div>
                    <div class="card-content bg-dark">
                        <div class="card-body bg-dark">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive bg-dark">
                                <table class="table table-lg bg-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-white">No</th>
                                            <th class="text-white">Book</th>
                                            <th class="text-white">Created at</th>
                                            <th class="text-white">Expired at</th>
                                            <th class="text-white">Status</th>
                                            <th class="text-white">Created at</th>
                                            <th class="text-white">Handle By</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($permissions as $permit)
                                        <tr>
                                            <td class="text-bold-500 text-white">{{$loop->iteration}}</td>
                                            <td class="text-bold-500 text-white">{{$permit->user->name}}</td>
                                            <td class="text-bold-500 text-white">{{$permit->book->title}}</td>
                                            <td class="text-bold-500 text-white">{{$permit->created_at->diffForHumans()}}</td>
                                            <td class="text-bold-500 text-white">
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
                                            <td class="text-bold-500 text-white">{{$permit->expired_date}}</td>
                                            <td class="text-bold-500 text-white">{{$permit->librarian}}</td>
                                            <td>
                                                @if($permit->status == 'process')
                                                <form action="{{route('cancelPermission',$permit->id)}}" method="POST" onsubmit="confirm('are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-warning">Cancel</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <td class="text-bold-500 text-white">permission empty</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout_frontend>
