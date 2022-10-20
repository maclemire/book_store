<x-layout.main-layout title="Éditer le livre">
  <div class="px-24">
    <h1 class="font-bold text-4xl py-10">Éditer le Livre</h1>
    <form  action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="max-w-md">
        {{-- title --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="title" placeholder="Titre du livre" value="{{ old('title', $book->title) }}">
        <x-error-msg name="title"></x-error-msg>
        {{-- description --}}
        <textarea name="description" cols="30" rows="10" class="mt-5 block w-full rounded-lg border-gray-400" placeholder="Description du livre ...">{{ old('description', $book->description) }}</textarea>
        <x-error-msg name="description"></x-error-msg>
        {{-- author --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="author" placeholder="Auteur" value="{{ old('author', $book->author) }}">
        <x-error-msg name="author"></x-error-msg>
        {{-- price --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="price" placeholder="Prix" value="{{ old('price', $book->price) }}">
        <x-error-msg name="price"></x-error-msg>
        {{-- nombre_pages --}}
        <input type="text" class="mt-5 block w-full rounded-lg border-gray-400" name="nombre_pages" placeholder="Nbre de pages" value="{{ old('nombre_pages', $book->nombre_pages) }}">
        <x-error-msg name="nombre_pages"></x-error-msg>
        {{-- image --}}
        <div class="py-4">
          <label for="">Image :</label>
          <input class="block pt-6" type="file" name="image" id="">
          <x-error-msg name="image" />
        </div>
        
        <button class="bg-blue-700 text-white font-bold my-6 w-auto rounded-lg px-4 py-2" type="submit">Envoyer</button>

      </div>
    </form>

  </div>
</x-layout.main-layout>