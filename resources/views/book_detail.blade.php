<x-layout_frontend>
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{asset('/storage/'.$book->cover)}}" style="background-image: url(&quot;img/anime/details-pic.jpg&quot;);">
                            <div class="comment"><i class="fa fa-comments"></i>{{count($reviews)}}</div>
                            <div class="view"><i class="fa fa-eye"></i>{{count($book->perizinans)}}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$book->title}}</h3>
                                <span>{{$book->author->name}}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>{{ $averageRate }} Rate</span>
                            </div>
                            <p>{{$book->synopsis}}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Category:</span> {{$book->category->name}}</li>
                                            <li><span>Studios:</span> {{$book->publisher->name}}</li>
                                            <li><span>Release Date:</span> {{$book->release_date}}</li>
                                            <li><span>Genre:</span>
                                                @foreach($book->genres as $genre)
                                                {{ $genre->name }}
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Request Permit :</span> {{count($book->perizinans)}}</li>
                                            <li><span>Rating:</span> {{ $averageRate }} </li>
                                            <li><span>Permit Duration:</span> {{$book->read_duration}} Days</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <div class="d-flex">
                                    <form action="{{route('addCollection',$book->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn follow-btn">
                                            <i class="fa fa-heart-o"></i>Add Collection</button>
                                    </form>
                                    @if($isExpired)
                                    @include('partials.form_request_permit',['book_id' => $book->id])
                                    @else
                                    @if($permission)
                                    @if($permission->status == 'approved')
                                    <a href="{{route('book_viewer',$permission->id)}}" class="follow-btn bg-success">Read Now</a>
                                    @elseif($permission->status == 'process')
                                    <button class="btn btn-warning">Process</button>
                                    @elseif($permission->status == 'decline')
                                    @include('partials.form_request_permit',['book_id' => $book->id])
                                    @endif
                                    @else
                                    @include('partials.form_request_permit',['book_id' => $book->id])
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="anime__review__item">
                            @forelse ($reviews as $review)
                            <div class="anime__review__item__pic">
                                <img src="/frontend/img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                            @auth
                                    @if($review->user->id == auth()->user()->id)
                                    <div class="d-flex">
                                        @include('partials.editReview',['review' => $review])
                                        @include('partials.deleteReview',['review' => $review])
                                    </div>
                                    @endif
                                @endauth
                                <h6>{{ $review->user->username }} - <span>{{$review->created_at->diffForHumans()}}</span> - <span><i class="fa fa-star text-warning"></i>{{$review->rate}}</span></h6>
                                <p>{{$review->reviews}}</p>
                            </div>
                            @empty
                            <p class="text-warning">Reviews Empty</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="{{route('addReview',$book->id)}}" method="POST">
                            @csrf
                            <div class="row">
                                <input class="mb-2 form-control" type="number" min="1" max="10" name="rate" value="{{old('rate')}}" placeholder="Rate 1 - 10">
                                <textarea placeholder="Your Comment" name="reviews">{{old('reviews')}}</textarea>
                            </div>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                    <!-- <div class="col-md-6 col-12"> -->

                    <!-- </div> -->
                </div>
                <!-- <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg" style="background-image: url(&quot;img/sidebar/tv-1.jpg&quot;);">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg" style="background-image: url(&quot;img/sidebar/tv-2.jpg&quot;);">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg" style="background-image: url(&quot;img/sidebar/tv-3.jpg&quot;);">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg" style="background-image: url(&quot;img/sidebar/tv-4.jpg&quot;);">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</x-layout_frontend>
