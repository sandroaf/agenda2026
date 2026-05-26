<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tipo de Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div>
                    <form action="{{ route('tipo-contatos.update', $tipoContato->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="{{ $tipoContato->nome }}" required><br><br>

                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" value="{{ $tipoContato->descricao }}"><br><br>

                        <button type="submit">Atualizar</button>
                        <button type="reset">Limpar</button>
                    </form>
                    <br>
                    <br>
                    <a href="{{ route('tipo-contatos.index') }}">Voltar para a lista de tipos de contatos</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

