<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <!-- Formulário para criar um novo Token de API -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Create API Token') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Crie um novo token de API para acessar seus dados de forma segura.') }}
                    </p>

                    <form method="POST" action="{{ route('profile.tokens.store') }}" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Token Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block
                                w-full" />
                        </div>
                        <div class="flex items-center justify-end">
                            <x-primary-button>
                                {{ __('Create Token') }}
                            </x-primary-button>
                        </div>
                    </form>
                    @if (session('status'))
                        <div class="mt-4 rounded-xl border border-green-300 bg-green-50 px-4 py-6 text-sm text-green-600">
                            <strong>{{ session('status') }}</strong>
                            <p class="mt-1 text-xs text-gray-500">{{ __('Tenha certeza de copiar este token agora. Você não poderá vê-lo novamente!') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Gerenciamento de Tokens de API -->
            <div>
                <!-- Listas os Tokens de API -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg
                    @if (count($tokens) > 0) mb-6 @endif">
                    <div class="max-w-3xl">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('API Tokens') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Gerencie seus tokens de API para serviços de terceiros.') }}
                        </p>

                        @if (count($tokens) > 0)
                            <div class="mt-6">
                                <h3 class="text-md font-medium text-gray-900">
                                    {{ __('Your API Tokens') }}
                                </h3>

                                <ul class="mt-4 space-y-3">
                                    @foreach ($tokens as $token)
                                        <li class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50 px-4 py-4 shadow-sm transition sm:flex-row sm:items-center sm:justify-between">
                                            <div class="min-w-0">
                                                <p class="truncate text-sm font-semibold text-gray-900">{{ $token->name }}</p>
                                                <p class="mt-1 text-xs text-gray-500">{{
                                                $token->last_used_at ? __('Last used: :time', ['time' => $token->last_used_at->diffForHumans()]) : __('Never used') }}</p>
                                                <p class="mt-1 text-xs text-gray-500">{{ __('Token ativo para integrações da conta.') }}</p>
                                            </div>
                                            <form method="POST" action="{{ route('profile.tokens.destroy', $token->id) }}" class="sm:flex-shrink-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex w-full items-center justify-center rounded-md border border-red-200 bg-white px-3 py-2 text-sm font-medium text-red-600 transition hover:border-red-300 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="mt-6 rounded-xl border border-dashed border-gray-300 bg-gray-50 px-4 py-6 text-sm text-gray-600">
                                {{ __('Nenhum token foi criado ainda. Quando você gerar um token, ele aparecerá aqui.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
