<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>

    <div class="py-6" style="padding-bottom: 0;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ml-3" style="display: flex; margin: auto;">
                <div class="p-2">
                    <a href="{{ route('dashboard.jobs.index') }}">
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
                        Creating a new job
                    </div>
                    <form method="POST" action="{{ route('dashboard.jobs.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mt-4">
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="society" :value="__('Society')" />
                            <x-input id="society" class="block mt-1 w-full" type="text" name="society" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="missions" :value="__('Missions')" />
                            <x-input id="missions" class="block mt-1 w-full" type="text" name="missions" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="location" :value="__('Location')" />
                            <x-input id="location" class="block mt-1 w-full" type="text" name="location" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="start_date" :value="__('Start date')" />
                            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="end_date" :value="__('End Date')" />
                            <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" required autofocus />
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
                            <img src="https://belleneige.com/wp-content/uploads/2014/09/200x200.gif" class="rounded mx-auto d-block" id="preview" alt="preview" style="width: 200px; height: 200px; object-fit: cover; box-shadow: 0px 0px 7px 0px #0000005e;">
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