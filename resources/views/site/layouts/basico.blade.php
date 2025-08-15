<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Super Gestão - @yield('titulo')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased font-sans">

<div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 transition-colors duration-300">

    {{-- CABEÇALHO --}}
    <header class="bg-white dark:bg-gray-900 shadow-md sticky top-0 z-10">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <div class="flex items-center">
                    <a href="{{ route('site.index') }}">
                        <img src="{{ asset('img/logog.png') }}" alt="Logo Distribuidora GAMA" class="h-20 mr-3">
                    </a>
                    <a href="{{ route('site.index') }}" class="hidden sm:block text-xl font-bold text-primary dark:text-secondary">
                        Distribuidora GAMA - Super Gestão
                    </a>
                </div>

                    {{-- Links de Navegação --}}
                    <div class="flex items-center space-x-6">
                    <nav class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('site.index') }}" class="hover:text-primary transition-colors dark:hover:text-secondary transition-colors">Principal</a>
                        <a href="{{ route('site.sobrenos') }}" class="hover:text-primary transition-colors dark:hover:text-secondary transition-colors">Sobre Nós</a>
                        <a href="{{ route('site.contato') }}" class="hover:text-primary transition-colors dark:hover:text-secondary transition-colors">Contato</a>
                        <a href="{{ route('site.login') }}" class="hover:text-primary transition-colors dark:hover:text-secondary transition-colors">Login</a>
                    </nav>

                    {{-- Botões de Tema --}}
                    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-secondary">
                        <svg class="h-6 w-6 hidden dark:block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>


                        <svg class="h-6 w-6 block dark:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow container mx-auto p-4 sm:p-6 lg:p-8">
        @yield('conteudo')
    </main>

    {{-- Rodapé --}}
    <footer class="bg-gray-800 dark:bg-gray-700 text-gray-300">
        <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            {{-- Logo & Mensagem / Coluna 1 --}}
                <div class="space-y-4">
                    <a href="{{ route('site.index') }}">
                        <img class="h-20" src="{{ asset('img/logo.png') }}" alt="Logo Gama">
                    </a>
                    <p class="text-sm">
                        Somos uma empresa especializada na distribuição eficiente de cosméticos, medicamentos e produtos de cuidado pessoal, conectando marcas aos lares de milhões de brasileiros com agilidade e confiança.
                    </p>
                </div>

            {{-- Navegação / Coluna 2--}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Menu | Navegue no Site</h3>

                    <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm">
                        <a href="{{ route('site.index') }}" class="hover:text-white transition-colors">Principal</a>
                        <a href="{{ route('site.sobrenos') }}" class="hover:text-white transition-colors">Sobre Nós</a>
                        <a href="{{ route('site.contato') }}" class="hover:text-white transition-colors">Contato</a>
                        <a href="{{ route('site.login') }}" class="hover:text-white transition-colors">Login / Cadastro</a>
                    </div>


                    <div class="pt-4">
                        <a href="{{ route('site.contato') }}"
                           class="block text-center bg-primary hover:bg-primaryDark text-white font-bold py-3 px-4 rounded-lg transition-colors duration-300 dark:bg-secondary dark:hover:bg-orange-600"
                        >
                            Entre em Contato
                        </a>
                    </div>
                </div>


            {{-- Canais de Atendimento / Coluna 3 --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Canais de Atendimento</h3>
                    <ul class="space-y-3 text-sm">

                        <li class="flex items-center space-x-3">

                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>0800 723 1744</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>ecommerce@distribuidoragama.com.br</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>cadastro@distribuidoragama.com.br</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/></svg>
                            <span>Rodovia, Rod. Fernão Dias, s/n - km 483,35 - Jardim Piemont Norte, Betim - MG, 32689-898</span>
                        </li>

                        <li class="flex justify-center items-center">
                            <span><strong>9h - 17h | Segunda a Sexta</strong></span>
                        </li>
                    </ul>
                </div>


            {{-- Redes Sociais / Coluna 4--}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-white">Redes Sociais</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/distribuidoragamaoficial/" class="hover:opacity-75"><img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="h-8"></a>
                        <a href="https://www.linkedin.com/company/distribuidoragama/" class="hover:opacity-75"><img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn" class="h-8"></a>
                        <a href="https://www.youtube.com/@distribuidora_gama" class="hover:opacity-75"><img src="{{ asset('img/youtube.png') }}" alt="YouTube" class="h-8"></a>
                        <a href="https://www.instagram.com/distribuidoragama/" class="hover:opacity-75"><img src="{{ asset('img/instagram.png') }}" alt="Instagram" class="h-8"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
