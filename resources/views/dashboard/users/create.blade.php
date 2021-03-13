<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2">
                    <a href="{{ route('dashboard.users.index') }}">
                        <x-button class="ml-3">
                            {{ __('Back') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        Adding a new user
                    </div>
                    <form method="POST" action="{{ route('dashboard.users.store') }}">
                        @csrf
                        @method('POST')

                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="emailConfirm" :value="__('Email Confirmation')" />
                            <x-input id="emailConfirm" class="block mt-1 w-full" type="email" name="emailConfirm" :value="old('emailConfirm')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="passwordConfirm" :value="__('Password Confirmation')" />
                            <x-input id="passwordConfirm" class="block mt-1 w-full" type="password" name="passwordConfirm" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Validate') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
</x-app-layout>