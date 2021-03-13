<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Skills') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2">
                    <a href="{{ route('dashboard.skills.index') }}">
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
                        Editing a skill
                    </div>
                    <form method="POST" action="{{ route('dashboard.skills.update', $skill) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $skill->name }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $skill->description }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="level" :value="__('Level')" />
                            <input name="level" id="level" type="range" class="slider" min="0" max="10" style="width: 100%;" value="{{ $skill->level }}">
                            <p id="range" style="margin: auto; width: fit-content;"></p>
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Image')" />
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image" id="imgLabel">Choose file...</label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Preview')" />
                            <img src="{{ asset('storage/images/' .$skill->image_url) }}" class="rounded mx-auto d-block" id="preview" alt="preview" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Validate') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                var slider = document.getElementById("level");
                var output = document.getElementById("range");
                output.innerHTML = slider.value;
                slider.oninput = function() {
                    output.innerHTML = this.value;
                };

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#preview').attr('src', e.target.result);
                        }
                        
                        imageLabel.textContent = input.files[0]["name"];
                        reader.readAsDataURL(input.files[0]); // convert to base64 string
                    }
                };

                var imageLabel = document.getElementById('imgLabel');
                var imageFile = document.getElementById("image");
                imageFile.addEventListener("change", function() {
                    readURL(this);
                });
            </script>
</x-app-layout>