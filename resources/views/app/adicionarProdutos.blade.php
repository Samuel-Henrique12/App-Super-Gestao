@extends ('app.layouts.basico')

@section('titulo', 'Adicionar Produto')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                Adicionar Novo Produto
            </h1>
        </div>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg p-8">
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-400 text-red-700 dark:text-red-300 rounded-md text-sm" role="alert">
                    <strong>Ocorreram alguns erros:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('app.produto.guardar') }}" method="post" class="space-y-6" novalidate>
                @csrf

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome do Produto</label>
                    <input id="nome" name="nome" value="{{ old('nome') }}" type="text"
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-secondary">
                </div>

                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
                    <textarea id="descricao" name="descricao" class="mt-1 w-full p-3 h-24 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-secondary">{{ old('descricao') }}</textarea>
                </div>

                <div>
                    <label for="peso" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Peso (em gramas)</label>
                    <input id="peso" name="peso" value="{{ old('peso') }}" type="number"
                           class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-secondary">
                </div>

                <div>
                    <label for="unidade_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidade de Medida</label>
                    <select id="unidade_id" name="unidade_id" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-secondary">
                        <option value="">Selecione a Unidade</option>
                        @foreach($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark dark:bg-secondary dark:hover:bg-orange-600">
                        Cadastrar Produto
                    </button>
                    <a href="{{ route('app.produto') }}" class="w-full text-center py-3 px-6 font-semibold text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
