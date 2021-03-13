<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="list-group">
                        @if(count($stats) > 0)
                        @foreach ($stats as $stat)
                        
                        <div class="flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-gray-800 font-weight-bold"> {{ $stat->ip_address }} </h5>
                            </div>
                            <p class="mb-1">{{ $stat->action }}</p>
                            <div class="d-flex w-100 justify-content-between">
                                <small style="margin: 0 0 0 auto;"><span class="badge badge-secondary" style="font-size: 12px;">{{ $stat->created_at}}</span></small>
                            </div>
                        </div>
                        <hr style="margin: 15px;">

                        @endforeach
                        @else

                        <p>No recent activity.</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>