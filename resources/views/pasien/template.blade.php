<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <header class="bg-dark">
            <nav class="container mx-auto p-4 flex justify-between">
                <a href="#" class="text-white text-xl font-bold">Bendahara</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </nav>
        </header>
    
        <main class="flex-1">
            <div class="container mx-auto p-4">
                @yield('content')
            </div>
        </main>
    </div>
    
    <aside class="fixed left-0 top-0 h-screen w-64 bg-light p-4">
        <ul>
            <li><a href="{{ route('pasien.index') }}" class="block p-2 hover:bg-light">Dashboard</a></li>
            <li><a href="#" class="block p-2 hover:bg-light">Pengeluaran</a></li>
        </ul>
    </aside>
</body>
</html>

