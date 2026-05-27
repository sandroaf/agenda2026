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
                    <div class="mx-auto max-w-3xl space-y-6">
                        <div class="rounded-lg border border-gray-200 bg-white">
                            <dl class="divide-y divide-gray-100">
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">ID</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $tipoContato->id }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Nome</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $tipoContato->nome }}</dd>
                                </div>
                                <div class="grid grid-cols-1 gap-2 px-4 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-gray-500">Descrição</dt>
                                    <dd class="text-sm text-gray-900 sm:col-span-2">{{ $tipoContato->descricao ?: '-' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="rounded-lg border border-gray-200 bg-white">
                            <div class="border-b border-gray-100 px-4 py-3">
                                <h3 class="text-sm font-semibold text-gray-800">Contatos relacionados</h3>
                            </div>
                            @if ($contatos->isEmpty())
                                <p class="px-4 py-4 text-sm text-gray-600">Nenhum contato relacionado a este tipo.</p>
                            @else
                                <ul class="divide-y divide-gray-100">
                                    @foreach ($contatos as $contato)
                                        <li class="px-4 py-3 text-sm text-gray-700">
                                            <span class="font-medium text-gray-900">{{ $contato->nome }}</span>
                                            <span class="text-gray-500">({{ $contato->email }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-center gap-3">
                            <a href="{{ route('tipo-contatos.edit', $tipoContato->id) }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-green-700 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Alterar</a>
                            <a href="{{ route('tipo-contatos.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
