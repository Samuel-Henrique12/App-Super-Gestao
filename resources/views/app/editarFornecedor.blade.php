@extends ('app.layouts.basico')

@section('titulo', 'Editar Fornecedor')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Editar Fornecedor: {{ $fornecedor->nome }}</h1>
        </div>

        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg p-8">
            <form action="{{ route('app.fornecedor.update', ['id' => $fornecedor->id]) }}" method="post" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" type="text" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div>
                    <label for="site">Site</label>
                    <input id="site" name="site" value="{{ $fornecedor->site ?? old('site') }}" type="text" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div>
                    <label for="uf">UF (Estado)</label>
                    <input id="uf" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" type="text" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div>
                    <label for="email">E-mail</label>
                    <input id="email" name="email" value="{{ $fornecedor->email ?? old('email') }}" type="email" class="mt-1 w-full p-3 rounded-md bg-gray-200 dark:bg-gray-700">
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="w-full py-3 px-6 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark">
                        Salvar Alterações
                    </button>
                    <a href="{{ route('app.fornecedor') }}" class="w-full text-center py-3 px-6 font-semibold text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
