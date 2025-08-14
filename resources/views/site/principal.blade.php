@extends('site.layouts.basico')

@section('titulo', 'Principal')

@section('conteudo')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        {{-- Principal --}}
        <div class="space-y-6 text-center lg:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 dark:text-white">
                Sistema Super Gestão
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                O Super Gestão é um software que armazena informações passadas através de requests por via do método POST e envia para o banco de dados. O sistema foi feito para estudo do framework Laravel e PHP.
            </p>

            <ul class="space-y-3 inline-block text-left">
                <li class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Autentificação com token</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Armazenamento no banco de dados</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Redirecionamento de rotas</span>
                </li>
            </ul>

            <div class="pt-4">
                <a href="{{ route('site.sobrenos') }}" class="inline-block bg-primary hover:bg-primaryDark text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300 dark:bg-secondary dark:hover:bg-orange-600">
                    Saiba Mais
                </a>
            </div>
        </div>

        {{-- CAIXA DE CONTATO --}}
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-center mb-6">Entre em Contato</h2>
            <p class="text-center text-gray-600 dark:text-gray-400 mb-6">
                Caso tenha qualquer dúvida, por favor entre em contato com nossa equipe pelo formulário abaixo.
            </p>

            @component('site.layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
                <p class="text-center text-sm text-gray-500 mt-4">Nossa equipe analisará sua mensagem e retornará em breve.</p>
            @endcomponent
        </div>

    </div>

@endsection
