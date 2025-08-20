@extends ('app.layouts.basico')

@section('titulo', 'Adicionar Cliente')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                Adicionar Novo Cliente
            </h1>
        </div>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg p-8">

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-400 text-red-700 dark:text-red-300 rounded-md text-sm">
                    <strong>Ocorreram alguns erros:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('app.cliente.guardar') }}" method="post" class="space-y-6" novalidate>
                @csrf
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome do Cliente</label>
                    <input id="nome" name="nome" value="{{ old('nome') }}" type="text"
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600 dark:focus:ring-orange-600">
                        Cadastrar
                    </button>
                    <a href="{{ route('app.cliente') }}" class="w-full text-center py-3 px-6 font-semibold text-gray-800 dark:text-gray-200 bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
