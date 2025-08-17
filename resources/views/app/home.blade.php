@extends ('app.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')

    <div class="space-y-10">
        {{-- Seção de Boas-Vindas --}}
        <div class="bg-white dark:bg-gray-900/50 p-8 rounded-2xl shadow-lg text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                Bem-vindo ao Super Gestão
            </h1>
            <p class="max-w-3xl mx-auto text-gray-600 dark:text-gray-300">
                O seu sistema completo para gerenciamento de produtos e estoque. Comece a usar as funcionalidades abaixo.
            </p>
        </div>

        {{-- Cartões de Acesso Rápido --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Card: Cadastro de Produtos --}}
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300">
                <div class="p-6 flex-grow flex flex-col text-center">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Cadastro de Produtos</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 flex-grow">Adicione novos produtos ao seu inventário de forma rápida e fácil.</p>
                    {{-- Substitua '#' pela rota correspondente, ex: {{ route('produto.create') }} --}}
                    <a href="{{ route('app.produto') }}" class="mt-auto block w-full bg-primary hover:bg-primary-dark dark:bg-secondary dark:hover:bg-orange-600 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300">
                        Cadastrar Produto
                    </a>
                </div>
            </div>

            {{-- Card: Clientes --}}
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300">
                <div class="p-6 flex-grow flex flex-col text-center">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Clientes</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 flex-grow">Consulte e gerencie a sua base de clientes.</p>
                    <a href="{{ route('app.cliente') }}" class="mt-auto block w-full bg-purple-500 hover:bg-gray-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300">Ver Clientes</a>
                </div>
            </div>

            {{-- Card: Fornecedores --}}
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300">
                <div class="p-6 flex-grow flex flex-col text-center">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Fornecedores</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 flex-grow">Gerencie seus fornecedores e os produtos associados a eles.</p>
                    <a href="{{ route('app.fornecedor') }}" class="mt-auto block w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300">Ver Fornecedores</a>
                </div>
            </div>
        </div>
    </div>

@endsection
