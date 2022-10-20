<x-layout.main-layout :title="$book->title">
  
    {{-- Displaying all books informations --}}
    <div class="flex flex-col justify-center text-start px-96 py-10">
        <div class="">
          <p class="font-black text-4xl text-center pb-12">{{ $book->title }}<span class="font-bold underline"></span></p>
          <img class="mx-auto" src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
          <p class="pt-10"><span class="font-black underline pr-2">Description: </span> {{ $book->description }}</p>
          <p class="pt-4"><span class="font-bold underline pr-2">Auteur: </span>{{ $book->author }}</p>
          <p class="pt-4"><span class="font-bold underline pr-2">Prix: </span>{{ $book->price }} €</p>
          <p class="pt-4"><span class="font-bold underline pr-2">Nombre de pages: </span>{{ $book->nombre_pages }}</p>
				</div>
    
    {{-- Only admin is allowed to delete and update --}}
    @if (Auth::user()->is_admin == 1)
			<div class="flex space-x-6 pt-6 justify-center">
					<x-btn-delete :book="$book" />
					<a class="bg-green-800 w-auto text-white font-semibold px-4 py-2 rounded-lg" href="{{ $book->id }}/edit">Modifier</a>
			</div>
		@endif
	</div>
</x-layout.main-layout>