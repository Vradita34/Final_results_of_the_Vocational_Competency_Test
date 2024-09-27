<x-layout_backend>
    <a href="{{route('category.index')}}">
        <button class="btn btn-outline-info m-2">Data Categories</button>
    </a>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Category</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Name</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Name" name="name" value="{{old('name',$category->name)}}">
                                        </div>
                                        @error('name')
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
