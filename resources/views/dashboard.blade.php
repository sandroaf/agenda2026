<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="rounded-xl border border-blue-200 bg-gradient-to-br from-blue-50 to-blue-100 p-5 shadow-sm">
                            <p class="text-xs font-semibold uppercase tracking-wide text-blue-700">Contatos</p>
                            <p class="mt-2 text-5xl font-extrabold leading-none text-blue-900 sm:text-6xl">{{ $numeroContatos }}</p>
                            <p class="mt-3 text-sm text-blue-800/90">Total cadastrados no sistema</p>
                        </div>

                        <div class="rounded-xl border border-green-200 bg-gradient-to-br from-green-50 to-green-100 p-5 shadow-sm">
                            <p class="text-xs font-semibold uppercase tracking-wide text-green-700">Tipos de Contatos</p>
                            <p class="mt-2 text-5xl font-extrabold leading-none text-green-900 sm:text-6xl">{{ $numeroTipoContatos }}</p>
                            <p class="mt-3 text-sm text-green-800/90">Tipos de contatos disponiveis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
