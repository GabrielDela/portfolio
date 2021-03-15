<x-portfolio-layout>
    <div class="h-16" id="home"></div>
    @if($hero)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hero">
                <img src="{{ asset('storage/images/' . $hero->image_url) }}" class="image-portfolio">
                <div class="container-text-hero" style="margin: 50px 25px 25px 25px;">
                    <div class="font-semibold text-3xl title-portfolio">{{ $hero->title }}</div>
                    <div class="text-lg">{!! html_entity_decode($hero->text) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
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

    <div class="h-16" id="experiences"></div>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="font-semibold text-3xl title-portfolio" style="margin: 0 60px;">Éxpériences</div><br>
                <div class="container" style="margin-bottom: 4rem;">
                    <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-blue-50">
                        @if(count($jobs) > 0)
                        <div style="display: none;">{{ $count = 1 }}</div>

                        @foreach ($jobs as $job)
                        @if($count % 2 != 0)

                        <!-- left -->
                        <div class="flex flex-row-reverse md:contents">
                            <div class="bg-red-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-lg" style="width: 100%;">
                                <img src="{{ asset('storage/images/' . $job->image_url) }}" style="margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                                <h3 class="font-semibold text-lg mb-1">{{ $job->title }}</h3>
                                <p class="leading-tight text-justify">
                                    {{ $job->description }}
                                </p>

                                <p class="leading-tight text-justify" style="margin: 20px 0 0 0;">
                                    {!! html_entity_decode($job->missions) !!}
                                </p>

                                <div class="flex" style="margin: 20px 0;">
                                    <p class="leading-tight text-justify font-semibold" style="margin: auto 0 auto auto;">
                                        {{ $job->society . " " . $job->location }}
                                </div>
                                <div class="flex">
                                    <p class="leading-tight text-justify bold" style="margin: auto 0 auto auto;">
                                    <h1><span class="badge badge-light">{{ str_replace('-',' / ',date('d-m-Y', strtotime($job->start_date)))  . " - " . str_replace('-',' / ',date('d-m-Y', strtotime($job->end_date))) }}</span></h1>
                                    </p>
                                </div>
                            </div>
                            <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-red-400 pointer-events-none shadow-xl"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-red-500 shadow-xl"></div>
                            </div>
                        </div>
                        @else
                        <!-- right -->
                        <div class="flex md:contents">
                            <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                                <div class="h-full w-6 flex items-center justify-center">
                                    <div class="h-full w-1 bg-red-400 pointer-events-none shadow-xl"></div>
                                </div>
                                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-red-500 shadow-xl"></div>
                            </div>
                            <div class="bg-red-400 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-lg" style="width: 100%;">
                                <img src="{{ asset('storage/images/' . $job->image_url) }}" style="margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                                <h3 class="font-semibold text-lg mb-1">{{ $job->title }}</h3>
                                <p class="leading-tight text-justify">
                                    {{ $job->description }}
                                </p>

                                <p class="leading-tight text-justify" style="margin: 20px 0 0 0;">
                                    {!! html_entity_decode($job->missions) !!}
                                </p>

                                <div class="flex" style="margin: 20px 0;">
                                    <p class="leading-tight text-justify font-semibold" style="margin: auto 0 auto auto;">
                                        {{ $job->society . " " . $job->location }}
                                </div>
                                <div class="flex">
                                    <p class="leading-tight text-justify bold" style="margin: auto 0 auto auto;">
                                    <h1><span class="badge badge-light">{{ str_replace('-',' / ',date('d-m-Y', strtotime($job->start_date)))  . " - " . str_replace('-',' / ',date('d-m-Y', strtotime($job->end_date))) }}</span></h1>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div style="display: none;">{{ $count++ }}</div>

                        @endforeach
                        @else
                    </div>
                </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <p>De nouvelles expériences bientot ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    <hr>

    <div class="h-16" id="experiences"></div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-text-portfolio">
                <div class="font-semibold text-3xl title-portfolio">TEST</div>
                <div class="text-lg">TEST
                </div>
            </div>
        </div>
    </div>

    <div class="h-16" id="schools"></div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-text-portfolio">
                <div class="font-semibold text-3xl title-portfolio">TEST</div>
                <div class="text-lg">TEST
                </div>
            </div>
        </div>
    </div>

    <div class="h-16" id="skills"></div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-text-portfolio">
                <div class="font-semibold text-3xl title-portfolio">TEST</div>
                <div class="text-lg">TEST
                </div>
            </div>
        </div>
    </div>

    <div class="h-16" id="contact"></div>
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
                <div class="flex flex-wrap mb-6">
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
                <div class="flex flex-wrap mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-password">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="email" id="email" type="email" placeholder="jhondoe@gmail.xyz">
                        <!-- <p class="text-gray-600 text-xs italic">Some tips - as long as needed</p> -->
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" style="color: white;" for="grid-password">
                            Message
                        </label>
                        <textarea class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" name="message" id="message" placeholder="Votre message ..."></textarea>
                        <!-- <p class="text-gray-600 text-xs italic">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p> -->
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
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