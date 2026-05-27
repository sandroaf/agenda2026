<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Contato - ') }} - {{ $contato->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contatos.update', $contato->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="tipo_contato_id">Tipo de Contato:</label>
                        <select id="tipo_contato_id" name="tipo_contato_id">
                            <option value="">Selecione um tipo de contato</option>
                            @foreach($tipoContatos as $tipoContato)
                                <option value="{{ $tipoContato->id }}" {{ $contato->tipo_contato_id == $tipoContato->id ? 'selected' : '' }}>
                                    {{ $tipoContato->id }} - {{ $tipoContato->nome }}
                                </option>
                            @endforeach
                        </select>
                        <br><br>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="{{ $contato->nome }}" required><br><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $contato->email }}" required><br><br>

                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" value="{{ $contato->telefone }}"><br><br>

                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" value="{{ $contato->cidade }}"><br><br>

                        <label for="estado">Estado:</label>
                        <input type="text" id="estado" name="estado" value="{{ $contato->estado }}"><br><br>

                        <button type="submit">Atualizar</button>
                        <button type="reset">Limpar</button>
                    </form>
                    <br>
                    <br>
                    <a href="{{ route('contatos.index') }}">Voltar para a lista de contatos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
