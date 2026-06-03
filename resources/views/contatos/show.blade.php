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
                    <div class="mx-auto max-w-3xl space-y-6">
                        <div class="rounded-lg border border-gray-200 bg-white">
                            <dl class="divide-y divide-gray-100">
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->id }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Tipo de Contato</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->tipoContato ? $contato->tipoContato->nome : 'N/A' }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Nome</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->nome }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->email }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Telefone</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->telefone ?: '-' }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Cidade</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->cidade ?: '-' }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Estado</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $contato->estado ?: '-' }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Foto</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">
                                    @if ($contato->foto)
                                        <img src="{{ asset('storage/' . $contato->foto) }}" alt="Foto de {{ $contato->nome }}" class="h-32 w-32 object-cover rounded-md">
                                    @else
                                        <span class="text-gray-500">Sem foto</span>
                                    @endif
                                    </dd>
                            </dl>
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            <a href="{{ route('contatos.edit', $contato->id) }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-green-700 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Alterar</a>
                            <a href="{{ route('contatos.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
