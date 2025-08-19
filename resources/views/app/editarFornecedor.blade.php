@extends ('app.layouts.basico')

@section('titulo', 'Editar Produto')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Editar Produto: {{ $produto->nome }}</h1>
        </div>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg p-8">
            <form action="{{ route('app.produto.update', ['id' => $produto->id]) }}" method="post" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome" class="block text-sm font-medium">Nome do Produto</label>
                    <input id="nome" name="nome" value="{{ $produto->nome ?? old('nome') }}" type="text" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium">Descrição</label>
                    <textarea id="descricao" name="descricao" class="mt-1 w-full p-3 h-24 rounded-md bg-gray-200 dark:bg-gray-700">{{ $produto->descricao ?? old('descricao') }}</textarea>
                </div>

                <div>
                    <label for="peso" class="block text-sm font-medium">Peso (em gramas)</label>
                    <input id="peso" name="peso" value="{{ $produto->peso ?? old('peso') }}" type="number" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div>
                    <label for="unidade_id" class="block text-sm font-medium">Unidade de Medida</label>
                    <select id="unidade_id" name="unidade_id" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark">
                        Salvar Alterações
                    </button>
                    <a href="{{ route('app.produto') }}" class="w-full text-center py-3 px-6 font-semibold text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
