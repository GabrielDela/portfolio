<x-portfolio-layout>
    <div class="py-12">
        @if($hero)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hero">
                <img src="{{ asset('storage/images/' . $hero->image_url) }}" class="image-portfolio">
                <div class="container-text-portfolio">
                    <div class="font-semibold text-3xl title-portfolio">{{ $hero->title }}</div>
                    <div class="text-lg">{!! html_entity_decode($hero->text) !!}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p>EN TRAVAUX !</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-portfolio-layout>