<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2" style="margin: 0 0 0 auto;">
                    <a href="{{ route('dashboard.jobs.create') }}">
                        <x-button class="ml-3">
                            {{ __('Create a new Job') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($jobs) > 0)
            @foreach ($jobs as $job)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/images/' . $job->image_url) }}" class="rounded mx-auto d-block" id="preview" alt="preview" style="width: 100px; height: 100px; object-fit: cover; box-shadow: 0px 0px 7px 0px #0000005e;">
                        </div>
                        <div class="ml-3" style="margin: auto;">
                            <div class="font-medium text-base text-gray-800">{{ $job->society }}</div>
                            <div class="font-medium text-base text-gray-500">{{ $job->title }}</div>
                        </div>
                    </div>

                    <br>

                    <div class="ml-3" style="display: flex; margin: 10px auto;">
                        <div class="font-medium text-sm text-gray-500">{{ $job->description }}</div>
                    </div>
                    <div class="ml-3" style="display: flex; margin: 10px auto;">
                        <div class="font-medium text-sm text-gray-500">{!! html_entity_decode($job->missions) !!}</div>
                    </div>
                    <div class="ml-3" style="display: flex; margin: 10px auto;">
                        <div class="font-medium text-sm text-gray-500">{{ $job->location }}</div>
                    </div>

                    <br>

                    <div style="display: flex; width: 100%; padding: 0;">
                        <div class="font-medium text-sm text-gray-500" style="margin-left: auto;">{{ $job->start_date . " - " . $job->end_date }}</div>
                    </div>

                    <br>

                    <div class="ml-3" style="display: flex; margin: auto;">
                        <div class="p-2" style="margin: 0 0 0 auto;">
                            <a href="{{ route('dashboard.jobs.edit', $job) }}">
                                <x-button class="ml-3" style="padding: 0px; margin: 0px;">
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px;"></i>
                                </x-button>
                            </a>
                        </div>
                        <div class="p-2">
                            <form action="{{ route('dashboard.jobs.destroy', $job) }}" method="POST" class="d-inline">
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
                            <p>No job in database.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>