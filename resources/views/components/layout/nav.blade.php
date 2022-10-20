<div class="flex justify-between bg-green-200 text-red-700 py-4 px-12 border-b-2 mb-4">
  <div class="font-black text-xl" id="logo">
    <a href="/">Book_ <span class="text-orange-500">Store</span></a>
  </div>
  <div class="text-xl font-black text-orange-500 space-x-8 flex items-center" id="navitem">
    @guest
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @endguest
    @auth
      @if (Auth::user()->is_admin == 1)
        <a href="{{ route('books.create') }}">Ajouter un livre</a>
      @endif
      <x-btn-logout />
    @endauth
  </div>
</div>