@props(['title'])
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Book-store | {{ $title }}</title>
    {{-- import tailwind --}}
    @vite('resources/css/app.css')
  </head>
  <body>
    @include('components.layout.nav')
    <div class="rounded-lg mx-auto w-1/3 px-2 text-center text-lg font-semibold bg-green-500 text-green-100">
      {{ Session::get('status')}}
    </div>
    {{ $slot }}
    @vite('resources/js/app.js')
  </body>
</html>