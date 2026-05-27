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
                    <div class="mx-auto max-w-3xl">
                        <form action="{{ route('contatos.update', $contato->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div class="space-y-1 md:col-span-2">
                                    <label for="tipo_contato_id" class="block text-sm font-medium text-gray-700">Tipo de Contato</label>
                                    <select id="tipo_contato_id" name="tipo_contato_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">Selecione um tipo de contato</option>
                                        @foreach($tipoContatos as $tipoContato)
                                            <option value="{{ $tipoContato->id }}" {{ $contato->tipo_contato_id == $tipoContato->id ? 'selected' : '' }}>
                                                {{ $tipoContato->id }} - {{ $tipoContato->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="space-y-1 md:col-span-2">
                                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                                    <input type="text" id="nome" name="nome" value="{{ $contato->nome }}" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>

                                <div class="space-y-1 md:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $contato->email }}" required class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>

                                <div class="space-y-1 md:col-span-2">
                                    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" value="{{ $contato->telefone }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>

                                <div class="space-y-1">
                                    <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" value="{{ $contato->cidade }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>

                                <div class="space-y-1">
                                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                    <input type="text" id="estado" name="estado" value="{{ $contato->estado }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center gap-3 pt-2">
                                <button type="submit" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-green-700 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Alterar</button>
                                <button type="reset" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Limpar</button>
                                <a href="{{ route('contatos.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 md:ml-auto">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
