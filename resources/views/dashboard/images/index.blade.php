<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2" style="margin: 0 0 0 auto;">
                    <a href="{{ route('dashboard.images.create') }}">
                        <x-button class="ml-3">
                            {{ __('Create a new Image') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($images) > 0)
            @foreach ($images as $image)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/images/' . $image->image_url) }}" id="preview" alt="preview" style="border-radius: 50%; margin: auto; width: 150px; height: 150px; box-shadow: 6px -6px 20px 0px #0000005e; object-fit: cover; filter: blur(0.5px);">
                        </div>
                        <div class="" style="margin: auto auto auto 40px;">
                            <div class="font-medium text-base text-gray-800">Usage for : {{ $image->usage }}</div>
                        </div>
                    </div>

                    <div class="ml-3" style="display: flex; margin: auto;">
                        <div class="p-2" style="margin: 0 0 0 auto;">
                            <a href="{{ route('dashboard.images.edit', $image) }}">
                                <x-button class="ml-3" style="padding: 0px; margin: 0px;">
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px;"></i>
                                </x-button>
                            </a>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('dashboard.images.destroy', $image) }}" method="POST" class="d-inline">
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
            <br>
            @endforeach
            @else
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p>No image in database.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>