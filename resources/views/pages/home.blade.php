<x-layout.main-layout  title="Home">
  <div class="flex justify-center pt-24 pb-6 w-full text-center">

    {{-- Table displaying all books of the DB --}}
    <table class="table-fixed w-2/3">
      <thead class="bg-slate-200">
        <tr>
          <th>Nom du livre</th>
          <th>Prix</th>
          <th>Auteur</th>
          <th>Éditer</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($books as $book)
          <tr>
            <td class="px-4 py-2">{{ $book->title }}</td>
            <td class="px-4 py-2">{{ $book->price }}€</td>
            <td class="px-4 py-2">{{ $book->author }}</td>
            <td class="px-4 py-2 font-bold text-lg text-green-700"><a href="books/{{ $book->id }}">Voir</a> </td>
          </tr>
        @empty
          <p>Pas de livre actuellement</p> 
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="py-12 block">
    {{ $books->links('pagination::tailwind') }}
  </div>
</x-layout.main-layout>