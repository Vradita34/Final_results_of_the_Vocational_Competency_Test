<form action="{{ route('addIzin', $book_id) }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="btn follow-btn"> Send Permision</button>
</form>
