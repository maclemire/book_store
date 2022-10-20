<form action="{{ route('logout') }}" method="POST">
		@csrf
		<button class="bg-green-800 text-white font-semibold rounded-lg px-2 py-1" type="submit">Déconnexion</button>
</form>