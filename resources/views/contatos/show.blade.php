<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Contato - ') }} - {{ $contato->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <ul>
                    <li>ID: {{ $contato->id }}</li>
                    <li>Nome: {{ $contato->nome }}</li>
                    <li>Email: {{ $contato->email }}</li>
                    <li>Telefone: {{ $contato->telefone }}</li>
                    <li>cidade: {{ $contato->cidade }}</li>
                    <li>Estado: {{ $contato->estado }}</li>
                </ul>
                <br>
                <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
