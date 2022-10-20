@props(['book'])

<div class="">
  <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ?')">
    @csrf
    @method('DELETE')
    <button class="bg-red-600 rounded-lg px-4 py-2 text-white font-bold">Supprimer</button>
  </form>
</div>