@extends ('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')

    @if(session('sucesso'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md text-sm" role="alert">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                Produtos
            </h1>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <form action="#" method="GET" class="w-full sm:w-auto flex gap-2">
                <input type="text" name="pesquisa" placeholder="Pesquisar"
                       value="{{ request('pesquisa') }}"
                       class="w-full sm:w-64 p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                <button type="submit" class="py-3 px-5 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600 dark:focus:ring-orange-600">
                    Buscar
                </button>
            </form>

            <a href="{{ route('app.produto.adicionar') }}" class="w-full sm:w-auto text-center py-3 px-5 font-semibold text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 transition-colors">
                Novo Produto
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">Descrição</th>
                        <th scope="col" class="px-6 py-4 text-center">Peso</th>
                        <th scope="col" class="px-6 py-4 text-center">Unidade</th>
                        <th scope="col" class="px-6 py-4 text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($produtos as $produto)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $produto->nome }}
                            </th>
                            <td class="px-6 py-4">
                                {{ Str::limit($produto->descricao, 50) }}
                            </td>
                            <td class="px-6 py-4 text-center">{{ $produto->peso }}</td>
                            <td class="px-6 py-4 text-center">
                                {{ $produto->unidade->unidade ?? 'N/D' }}
                            </td>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <a href="{{ route('app.produto.editar', ['id' => $produto->id]) }}" class="font-medium text-blue-600 hover:text-blue-700">Editar</a>
                                <form id="form_produto_{{ $produto->id }}" method="post" action="{{ route('app.produto.excluir', ['id' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_produto_{{ $produto->id }}').submit()" class="font-medium text-red-600 hover:text-red-700">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                Nenhum produto cadastrado
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $produtos->links() }}
        </div>
    </div>

@endsection
