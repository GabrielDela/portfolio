<x-portfolio-layout>
    @if($hero)
    <div class="py-12">
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
    <div class="py-12" style="background-color: #E1CCCC;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hero">
                <div class="container-text-portfolio">
                    <div class="font-semibold text-3xl title-portfolio">TEST</div>
                    <div class="text-lg">TEST
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 bg-dark" style="padding: 60px 10px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="w-full max-w-lg " style="margin: auto;" action="{{ route('store') }}" method="POST">
                @csrf
                @method('POST')
                @if ($errors->any())
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <div class="p-6 alert alert-danger" style="margin: 0;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @if ($messages)
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <div class="p-6 alert alert-primary" style="margin: 0;">
                            <ul>
                                @foreach ($messages as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-first-name">
                            Prénom
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" name="firstname" type="text" placeholder="Votre prénom ...">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-last-name">
                            Nom
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="lastname" id="grid-last-name" type="text" placeholder="Votre nom ...">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-password">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="email" id="email" type="email" placeholder="jhondoe@gmail.xyz">
                        <!-- <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p> -->
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-password">
                            Message
                        </label>
                        <textarea class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" name="message" id="message" placeholder="Votre message ..."></textarea>
                        <!-- <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p> -->
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 flex">
                        <button class="shadow focus:shadow-outline focus:outline-none font-bold py-2 px-4 rounded bg-gray-200 text-gray-700 button-contact" style="margin: 0 0 0 auto;" type="submit">
                            Envoyer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="display: flex; padding: 10px; background-color: #2F2F2F;">
        <div style="margin: auto; color: white;">
            Copyright © Gabriel DELAHAYE 2020 | <a href="{{ route('dashboard.home') }}" class="btn-admin">Panneau d'administration</a>
        </div>
    </div>
</x-portfolio-layout>