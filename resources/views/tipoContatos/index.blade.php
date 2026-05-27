<script>
    function confirmDelete(tiposcontatoId) {
        if (confirm('Tem certeza que deseja excluir este tipo de contato: '+ tiposcontatoId+"?")) {
            document.getElementById('deleteform-' + tiposcontatoId).submit();
        }
    }
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Tipos de Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                        <p class="text-sm text-gray-600">Gerencie os tipos de contato disponíveis.</p>
                        <a href="{{ route('tipo-contatos.create') }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-green-700 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Novo Tipo</a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($tiposContatos->isEmpty())
                        <div class="rounded-md border border-gray-200 bg-gray-50 px-4 py-10 text-center text-sm text-gray-600">
                            Nenhum tipo de contato cadastrado até o momento.
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Nome</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Descrição</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Contatos</th>
                                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-600">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    @foreach ($tiposContatos as $tipocontato)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $tipocontato->id }}</td>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $tipocontato->nome }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $tipocontato->descricao ?: '-' }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $tipocontato->contatos->count() }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <a href="{{ route('tipo-contatos.show', $tipocontato->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-50">Ver</a>
                                                    <a href="{{ route('tipo-contatos.edit', $tipocontato->id) }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:border-green-700 hover:bg-green-700">Editar</a>
                                                    <button type="button" onclick="confirmDelete({{ $tipocontato->id }});" class="inline-flex items-center rounded-md border border-red-600 bg-red-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:border-red-700 hover:bg-red-700">Excluir</button>
                                                    <form id="deleteform-{{ $tipocontato->id }}" action="{{ route('tipo-contatos.destroy', $tipocontato->id) }}" method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
