<form action="{{ route('removeCollection', $review->id) }}" method="POST">
     @csrf
     @method('DELETE')
     <button type="submit" class="badge btn-danger m-2 text-white">Delete</button>
 </form>
