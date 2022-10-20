<table class="table-fixed">
  <thead class="bg-slate-200">
    <tr>
      <th>Nom du livre</th>
      <th>Prix</th>
      <th>Auteur</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($books as $book)
      <tr>
        <td>{{ $book->name }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->author }}</td>
        <td>Editer</td>
      </tr>
    @empty
       <p>Pas de livre actuellement</p> 
    @endforelse
  </tbody>
</table>