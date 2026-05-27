<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Tipo de Contato - ') }} - {{ $tipoContato->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <ul>
                    <li>ID: {{ $tipoContato->id }}</li>
                    <li>Nome: {{ $tipoContato->nome }}</li>
                    <li>Descrição: {{ $tipoContato->descricao }}</li>
                </ul>
                <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-4">
                    Contatos relacionados:
                </h3>
                <ul>
                    @foreach ($contatos as $contato)
                        <li>{{ $contato->nome }} ({{ $contato->email }})</li>
                    @endforeach
                </ul>
                <br>
                <a href="{{ route('tipo-contatos.index') }}">Voltar para a lista de tipos de contatos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
