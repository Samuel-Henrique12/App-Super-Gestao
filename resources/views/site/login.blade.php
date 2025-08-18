@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')

    <div class="flex justify-center items-center">
        <div class="max-w-md w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">

            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Acesse sua Conta</h1>
            </div>

            @if(session('sucesso'))
                <div class="mt-6 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 text-green-700 dark:text-green-300 rounded-md text-sm" role="alert">
                    {{ session('sucesso') }}
                </div>
            @endif

            @if(isset($erro) && $erro != '')
                <div class="mt-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-400 text-red-700 dark:text-red-300 rounded-md text-sm" role="alert">
                    {{ $erro }}
                </div>
            @endif

            <form action="{{ route('site.login') }}" method="post" class="mt-8 space-y-6">
                @csrf

                {{-- E-mail e Senha --}}
                <div>
                    <label for="usuario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                    <input id="usuario" name="usuario" value="{{ old('usuario') }}" type="usuario" required
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                    @error('usuario')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="senha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                    <input id="senha" name="senha" type="password" required
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                    @error('senha ')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Lembrar-me e Esqueceu a senha --}}
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded text-primary focus:ring-primary border-gray-300 dark:border-gray-600 dark:hover:-bg-secondary">
                        <label for="remember" class="ml-2 block text-gray-900 dark:text-gray-200">Lembrar-me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="font-medium text-primary hover:text-primaryDark dark:text-secondary dark:hover:text-orange-600">Esqueceu sua senha?</a>
                </div>

                {{-- Acessar e Cadastro --}}
                <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600 dark:focus:ring-secondary transition">
                    Acessar
                </button>
            </form>
            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Não tem uma conta?
                <a href="{{ route('site.registro') }}" class="font-medium text-primary hover:text-primaryDark dark:text-secondary dark:hover:text-orange-600 ">Cadastre-se</a>
            </p>
        </div>
    </div>

@endsection
