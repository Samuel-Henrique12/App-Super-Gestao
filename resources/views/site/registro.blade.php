@extends('site.layouts.basico')

@section('titulo', 'Cadastro')

@section('conteudo')

    <div class="flex justify-center items-center">
        <div class="max-w-md w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">

            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Crie sua Conta</h1>
            </div>

            <form action="{{ route('site.registro') }}" method="post" class="mt-8 space-y-6">
                @csrf
                {{-- Campo E-mail --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                    <input id="email" name="email" value="{{ old('email') }}" type="email" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                    <input id="name" name="name" value="{{ old('name') }}" type="text" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Campos Senha --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Senha</label>
                    <input id="password" name="password" type="password" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>


                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 ">Confirmar Senha</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                </div>

                <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600">
                    Cadastrar
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                Já tem uma conta?
                <a href="{{ route('site.login') }}" class="font-medium text-primary hover:text-primaryDark dark:text-secondary dark:hover:text-orange-600">Faça login</a>
            </p>
        </div>
    </div>

@endsection
