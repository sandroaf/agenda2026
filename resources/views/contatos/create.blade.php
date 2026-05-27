<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div>
                    <form action="{{ route('contatos.store') }}" method="POST">
                        @csrf
                        <label for="tipo_contato_id">Tipo de Contato:</label>
                        <select id="tipo_contato_id" name="tipo_contato_id">
                            <option value="">Selecione um tipo de contato</option>
                            @foreach($tipoContatos as $tipoContato)
                                <option value="{{ $tipoContato->id }}">{{ $tipoContato->id }} -  {{ $tipoContato->nome }}</option>
                            @endforeach
                        </select><br><br>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required><br><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br><br>

                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone"><br><br>

                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade"><br><br>

                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado"><br><br>

                        <button type="submit">Criar</button>
                        <button type="reset">Limpar</button>
                    </form>
                    <br>
                    <br>
                    <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

