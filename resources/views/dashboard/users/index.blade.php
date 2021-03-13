<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2" style="margin: 0 0 0 auto;">
                    <a href="{{ route('dashboard.users.create') }}">
                        <x-button class="ml-3">
                            {{ __('Create a new User') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- BOUCLE -->
            @if(count($users) > 0)
            @foreach ($users as $user)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 20px;">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <div class="ml-3">
                            <div class="font-medium text-base text-gray-800">{{ $user->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $user->email }}</div>
                        </div>
                    </div><br>

                    <div class="ml-3" style="display: flex; margin: auto;">
                        <div class="p-2" style="margin: 0 0 0 auto;">
                            <a href="{{ route('dashboard.users.edit', $user) }}">
                                <x-button class="ml-3" style="padding: 0px; margin: 0px;">
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px;"></i>
                                </x-button>
                            </a>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <x-button class="ml-3" style="padding: 0px; margin: 0px;">
                                    <i class="fa fa-trash" aria-hidden="true" style="font-size: 18px;"></i>
                                </x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p>No user in database.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- FIN BOUCLE -->
        </div>
    </div>
</x-app-layout>