<script>
    function confirmDelete(contatoId) {
        if (confirm('Tem certeza que deseja excluir este contato?')) {
            document.getElementById('deleteform-' + contatoId).submit();
        }
    }
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                        <p class="text-sm text-gray-600">Gerencie os contatos cadastrados.</p>
                        <form action="{{ route('contatos.search') }}" method="GET" class="flex items-center gap-2">
                            <input type="text" name="q" placeholder="Buscar contatos..." class="border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="inline-flex items-center rounded-md border border-blue-600 bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-blue-700 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"><img src="{{ asset('image/lupa.png')}}" alt="Buscar" class="h-5 w-5"></button>
                        </form>
                        <a href="{{ route('contatos.create') }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white transition hover:border-green-700 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Novo Contato</a>
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

                    @if ($contatos->isEmpty())
                        <div class="rounded-md border border-gray-200 bg-gray-50 px-4 py-10 text-center text-sm text-gray-600">
                            Nenhum contato cadastrado até o momento.
                        </div>
                    @else
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">ID</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Nome</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Email</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Telefone</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Cidade</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Estado</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">Tipo</th>
                                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-600">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 bg-white">
                                    @foreach ($contatos as $contato)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->id }}</td>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $contato->nome }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->email }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->telefone ?: '-' }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->cidade ?: '-' }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->estado ?: '-' }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-700">{{ $contato->tipoContato ? $contato->tipoContato->nome : 'N/A' }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <a href="{{ route('contatos.show', $contato->id) }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-50">Ver</a>
                                                    <a href="{{ route('contatos.edit', $contato->id) }}" class="inline-flex items-center rounded-md border border-green-600 bg-green-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:border-green-700 hover:bg-green-700">Editar</a>
                                                    <button type="button" onclick="confirmDelete({{ $contato->id }});" class="inline-flex items-center rounded-md border border-red-600 bg-red-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:border-red-700 hover:bg-red-700">Excluir</button>
                                                    <form id="deleteform-{{ $contato->id }}" action="{{ route('contatos.destroy', $contato->id) }}" method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $contatos->links('pagination::tailwind') }} <!-- Paginação usando Tailwind CSS -->
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
