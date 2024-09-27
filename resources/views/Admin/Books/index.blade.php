<x-layout_backend>
<a href="{{route('books.create')}}">
        <button class="btn btn-outline-info m-3">Add Book</button>
    </a>
    <section class="content-types">
        <div class="row">
            @foreach($books as $book)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img src="{{asset('storage/'.$book->cover)}}" class="card-img-top img-fluid" alt="singleminded">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->title}}</h5>
                            <p class="card-text">
                                {{ $book->synopsis }}
                            </p>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Author : {{$book->author->name}}</li>
                        <li class="list-group-item">Publisher : {{$book->publisher->name}}</li>
                        <li class="list-group-item">Category : {{$book->category->name}}</li>
                        <li class="list-group-item">Genres :
                            @foreach($book->genres as $genre)
                                {{ $genre->name }}
                            @endforeach
                        </li>
                        <li>
                            <div class="d-flex">
                                <a href="{{route('books.edit',$book->id)}}">
                                    <button class="btn btn-outline-warning">Edit</button>
                                </a>
                                <form action="{{route('books.destroy',$book->id)}}" method="POST" onsubmit="confirm('are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-layout_backend>
