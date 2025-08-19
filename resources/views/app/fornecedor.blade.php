@extends ('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')

    <div class="space-y-8">
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                Fornecedores
            </h1>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <form action="{{ route('app.fornecedor') }}" method="GET" class="w-full sm:w-auto flex gap-2">
                <input type="text" name="pesquisa" placeholder="Pesquisar"
                       value="{{ request('pesquisa') }}"
                       class="w-full sm:w-64 p-3 rounded-md bg-gray-200 dark:bg-gray-700 border border-transparent focus:outline-none focus:ring-2 focus:ring-primary transition dark:focus:ring-secondary transition">
                <button type="submit" class="py-3 px-5 font-semibold text-white bg-primary rounded-md hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-offset-gray-800 transition-colors dark:bg-secondary dark:hover:bg-orange-600 dark:focus:ring-orange-600">
                    Buscar
                </button>
            </form>

            <a href="{{ route('app.fornecedor.adicionar') }}" class="w-full sm:w-auto text-center py-3 px-5 font-semibold text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800 transition-colors">
                Novo Fornecedor
            </a>
        </div>

        <div class="bg-white dark:bg-gray-900/50 rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-4">Nome</th>
                        <th scope="col" class="px-6 py-4">Site</th>
                        <th scope="col" class="px-6 py-4">UF</th>
                        <th scope="col" class="px-6 py-4">E-mail</th>
                        <th scope="col" class="px-6 py-4 text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($fornecedores as $fornecedor)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $fornecedor->nome }}
                            </th>
                            <td class="px-6 py-4">
                                <a href="{{ $fornecedor->site }}" target="_blank" class="text-primary hover:text-primaryDark dark:text-secondary dark:hover:text-orange-600">
                                    {{ $fornecedor->site }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $fornecedor->uf }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $fornecedor->email }}
                            </td>
                            <td class="px-6 py-4 flex justify-center items-center gap-3">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-700">Editar</a>
                                <a href="#" class="font-medium text-red-600 hover:text-red-700">Excluir</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                Nenhum fornecedor cadastrado
                                <a href="{{ route('app.fornecedor.adicionar') }}" class="text-primary hover:text-primaryDark font-semibold dark:text-secondary dark:hover:text-orange-600">Clique aqui para adicionar!</a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    <div class="mt-6">
        {{ $fornecedores->appends(request()->query())->links() }}
    </div>
    </div>

@endsection
