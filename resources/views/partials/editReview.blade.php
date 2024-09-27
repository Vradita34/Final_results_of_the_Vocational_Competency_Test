<div class="form-group">
    <!-- Button trigger for login form modal -->
    <!-- <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#inlineForm">
        Handle
    </button> -->
    <button class="badge btn-warning m-2 text-white" data-bs-toggle="modal" data-bs-target="#inlineForm">
        Edit
    </button>

    <!--login form Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit My Review</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <form action="{{route('editReview',$review->book->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Review: </label>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Comment" name="reviews">{{old('reviews',$review->reviews)}}</textarea>
                            <input class="mb-2 form-control" type="number" min="1" max="10" name="rate" value="{{old('rate',$review->rate)}}" placeholder="Rate 1 - 10">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-outline-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
