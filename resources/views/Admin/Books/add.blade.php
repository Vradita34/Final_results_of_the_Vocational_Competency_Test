<x-layout_backend>
    <a href="{{route('books.index')}}">
        <button class="btn btn-outline-info">Data Books</button>
    </a>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Book</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Title</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Title" name="title" value="{{old('title')}}">
                                        </div>
                                        @error('title')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Synopsis</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="synopsis">{{old('synopsis')}}</textarea>
                                        </div>
                                        @error('synopsis')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Release_date</label>
                                            <input type="date" id="last-name-column" class="form-control" placeholder="Release_date" name="release_date" value="{{old('release_date')}}">
                                        </div>
                                        @error('release_date')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Read Duration</label>
                                            <input type="number" min="1" max="30" id="last-name-column" class="form-control" placeholder="Read Duration" name="read_duration" value="{{old('read_duration')}}">
                                        </div>
                                        @error('read_duration')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <h6>Genres</h6>

                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="genres[]">
                                                <optgroup label="Genres">
                                                    @foreach($genres as $genre)
                                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                        @error('genres[]')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <h6>Author</h6>
                                        <div class="form-group">
                                            <select class="choices form-select" name="author_id">
                                                @foreach($authors as $author)
                                                <option value="{{$author->id}}">{{$author->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('author_id')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <h6>Category</h6>
                                        <div class="form-group">
                                            <select class="choices form-select" name="category_id">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('category_id')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Cover (Optional)</label>
                                            <input type="file" accept="image/*" id="city-column" class="form-control" placeholder="Cover" name="cover">
                                        </div>
                                        @error('cover')
                                        <p class="text-warning">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">File</label>
                                            <input type="file" accept="application/pdf application/msword plain/text" id="city-column" class="form-control" placeholder="File" name="file">
                                        </div>
                                        @error('file')
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
