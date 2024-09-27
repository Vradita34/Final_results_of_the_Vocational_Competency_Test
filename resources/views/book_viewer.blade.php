<x-layout_frontend>
        <!-- Normal Breadcrumb Begin -->
        <section class="normal-breadcrumb set-bg" data-setbg="{{asset('storage/'.$permission->book->cover)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{$permission->book->title}}</h2>
                        <p>Happy reading :D.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
    <section class="product spad">
        <!-- <div class="container"> -->
            <iframe src="{{asset('storage/'.$permission->book->file)}}#toolbar=0" frameborder="0" width="100%" height="900vh"></iframe>
        <!-- </div> -->
    </section>
</x-layout_frontend>
