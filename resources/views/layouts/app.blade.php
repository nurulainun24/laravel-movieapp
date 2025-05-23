<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <main class="min-h-screen py-8">
        @yield('content')
    </main>
    @if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-init="setTimeout(() => show = false, 3000)" 
        x-show="show"
        x-transition
        class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow z-50"
    >
        {{ session('success') }}
    </div>
@endif

</body>
</html>
