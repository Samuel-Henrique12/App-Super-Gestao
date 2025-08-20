@extends ('app.layouts.basico')

@section('titulo', 'Editar Cliente')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Editar Cliente: {{ $cliente->nome }}</h1>
        </div>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg p-8">
            <form action="{{ route('app.cliente.atualizar', ['cliente' => $cliente->id]) }}" method="post" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class="block text-sm font-medium">Nome do Cliente</label>
                    <input id="nome" name="nome" value="{{ $cliente->nome ?? old('nome') }}" type="text"
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark">
                        Salvar Alterações
                    </button>
                    <a href="{{ route('app.cliente') }}" class="w-full text-center py-3 px-6 font-semibold text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
