@extends('site.layouts.basico')

@section('titulo', 'Sobre Nós')

@section('conteudo')

    <div class="max-w-5xl mx-auto bg-white dark:bg-gray-900 rounded-xl shadow-lg p-8 md:p-12">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 dark:text-white">
                Sobre Este Projeto
            </h1>
            <p class="mt-4 max-w-3xl mx-auto text-lg text-gray-600 dark:text-gray-400">
                Este site é um projeto de estudo ao framework Laravel.
            </p>
        </div>


        <hr class="my-10 border-gray-200 dark:border-gray-700">
        <div class="prose prose-lg dark:prose-invert max-w-none mx-auto text-gray-700 dark:text-gray-300">
            <p>
                O Super Gestão foi desenvolvido como um exercício prático, acompanhando um curso da plataforma <strong>Udemy</strong>
            </p>

            <h2 class="font-bold text-2xl mt-8">Tecnologias:</h2>
            <p>
                Ao longo do projeto utilizamos: Laravel 10.48, PHP 8.4, Composer 2.8.10, Workbench SQL
            </p>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700 text-center">
            <p class="mt-4 max-w-3xl mx-auto text-gray-600 dark:text-gray-400">
                Este projeto de estudo e desenvolvimento profissional foi realizado com o apoio e patrocínio da
                <strong class="font-semibold text-primary dark:text-secondary">Distribuidora Gama</strong>.
            </p>
        </div>

    </div>
@endsection
