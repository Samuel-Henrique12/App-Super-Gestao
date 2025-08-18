@extends('site.layouts.basico')
@section('titulo', 'Esqueci a Senha')

@section('conteudo')
    <div class="flex justify-center items-center py-12">
        <div class="max-w-md w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-800 dark:text-white">Redefinir Senha</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Digite o email para redefinir a senha</p>
            </div>

            @if (session('status'))
                <div class="mt-6 p-4 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 rounded-md text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                    <input id="email" name="email" value="{{ old('email') }}" type="email" required autofocus class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-secondary transition">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full py-3 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark dark:bg-secondary dark:hover:bg-orange-600">
                    Enviar Link de Redefinição
                </button>
            </form>
        </div>
    </div>
@endsection
