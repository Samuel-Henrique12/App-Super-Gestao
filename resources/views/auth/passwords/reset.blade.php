@extends('site.layouts.basico')
@section('titulo', 'Nova Senha')

@section('conteudo')
    <div class="flex justify-center items-center py-12">
        <div class="max-w-md w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-white">Crie sua Nova Senha</h1>
            <form method="POST" action="{{ route('password.update') }}" class="mt-8 space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="block text-sm font-medium">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium">Nova Senha</label>
                    <input id="password" type="password" name="password" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="password-confirm" class="block text-sm font-medium">Confirmar Nova Senha</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <button type="submit" class="w-full py-3 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark">
                    Redefinir Senha
                </button>
            </form>
        </div>
    </div>
@endsection
