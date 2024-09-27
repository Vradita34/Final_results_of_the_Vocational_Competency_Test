<x-layout_frontend>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="/Image/BOOKS.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label">E - Library Digital</div>
                                <h2>Happy reading :D</h2>
                                <!-- <a href="#"><span> Now</span> <i class="fa fa-angle-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>All Book</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($books as $book)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('storage/'.$book->cover)}}">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i>{{count($book->reviews)}}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{count($book->perizinans)}}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            @foreach($book->genres as $genre)
                                                <li>{{ $genre->name }}</li>
                                            @endforeach
                                        </ul>
                                        <h5><a href="{{route('book_detail',$book->id)}}">{{$book->title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Book with Send request </h5>
                            </div>
                            <!-- <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul> -->
                            <div class="filter__gallery">
                                @foreach($topViews as $data )
                                <div class="product__sidebar__view__item set-bg mix day years"
                                    data-setbg="{{asset('storage/'.$data->cover)}}">
                                    <div class="duration permit">{{$data->read_duration}}</div>
                                    <!-- <div class="view"><i class="fa fa-eye"></i> 9141</div> -->
                                    <h5><a href="{{route('book_detail',$book->id)}}">{{$data->title}}</a></h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <!-- Hero Section End -->
</x-layout_frontend>
