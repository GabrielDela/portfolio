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
    <div class="py-12" style="padding-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($jobs) > 0)
            <div class="font-semibold text-3xl title-portfolio" style="margin: 0 20px;">Éxpériences</div><br>
            <div class="container">
                <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-blue-50">
                    <div style="display: none;">{{ $count = 1 }}</div>

                    @foreach ($jobs as $job)
                    @if($count % 2 != 0)

                    <!-- left -->
                    <div class="flex flex-row-reverse md:contents">
                        <div class="bg-dark col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-lg" style="width: 100%;">
                            <img src="{{ asset('storage/images/' . $job->image_url) }}" style="object-fit: cover; margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                            <h3 class="font-semibold text-xl mb-1">{{ $job->title }}</h3>
                            <p class="leading-tight text-justify text-base text-gray-200">
                                {{ $job->description }}
                            </p>

                            <p class="leading-tight text-justify text-base text-gray-200" style="margin: 20px 0 0 0;">
                                {!! html_entity_decode($job->missions) !!}
                            </p>

                            <div class="flex" style="margin: 20px 0;">
                                <p class="leading-tight text-justify font-semibold " style="margin: auto 0 auto auto;">
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
                                <div class="h-full w-1 bg-gray-500 pointer-events-none shadow-xl"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-gray-800 shadow-xl"></div>
                        </div>
                    </div>
                    @else
                    <!-- right -->
                    <div class="flex md:contents">
                        <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-gray-500 pointer-events-none shadow-xl"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-gray-800 shadow-xl"></div>
                        </div>
                        <div class="bg-dark col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-lg" style="width: 100%;">
                            <img src="{{ asset('storage/images/' . $job->image_url) }}" style="object-fit: cover; margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                            <h3 class="font-semibold text-xl mb-1">{{ $job->title }}</h3>
                            <p class="leading-tight text-justify text-base text-gray-200">
                                {{ $job->description }}
                            </p>

                            <p class="leading-tight text-justify text-base text-gray-200" style="margin: 20px 0 0 0;">
                                {!! html_entity_decode($job->missions) !!}
                            </p>

                            <div class="flex" style="margin: 20px 0;">
                                <p class="leading-tight text-justify font-semibold " style="margin: auto 0 auto auto;">
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
                </div>
            </div>
            @else

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
    <hr>

    <div class="h-16" id="schools"></div>
    <div class="py-12" style="padding-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($schools) > 0)
            <div class="font-semibold text-3xl title-portfolio" style="margin: 0 20px;">Scolarité</div><br>
            <div class="container">
                <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-blue-50">
                    <div style="display: none;">{{ $count = 1 }}</div>

                    @foreach ($schools as $school)
                    @if($count % 2 != 0)

                    <!-- left -->
                    <div class="flex flex-row-reverse md:contents">
                        <div class="bg-dark col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-lg" style="width: 100%;">
                            <img src="{{ asset('storage/images/' . $school->image_url) }}" style="margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white; object-fit: cover;">
                            <h3 class="font-semibold text-xl mb-1">{{ $school->title }}</h3>
                            <p class="leading-tight text-justify text-base text-gray-200">
                                {{ $school->description }}
                            </p>

                            <p class="leading-tight text-justify text-base text-gray-200" style="margin: 20px 0 0 0;">
                                {!! html_entity_decode($school->missions) !!}
                            </p>

                            <div class="flex" style="margin: 20px 0;">
                                <p class="leading-tight text-justify font-semibold " style="margin: auto 0 auto auto;">
                                    {{ $school->society . " " . $school->location }}
                            </div>
                            <div class="flex">
                                <p class="leading-tight text-justify bold" style="margin: auto 0 auto auto;">
                                <h1><span class="badge badge-light">{{ str_replace('-',' / ',date('d-m-Y', strtotime($school->start_date)))  . " - " . str_replace('-',' / ',date('d-m-Y', strtotime($school->end_date))) }}</span></h1>
                                </p>
                            </div>
                        </div>
                        <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-gray-500 pointer-events-none shadow-xl"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-gray-800 shadow-xl"></div>
                        </div>
                    </div>
                    @else
                    <!-- right -->
                    <div class="flex md:contents">
                        <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                            <div class="h-full w-6 flex items-center justify-center">
                                <div class="h-full w-1 bg-gray-500 pointer-events-none shadow-xl"></div>
                            </div>
                            <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-gray-800 shadow-xl"></div>
                        </div>
                        <div class="bg-dark col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-lg" style="width: 100%;">
                            <img src="{{ asset('storage/images/' . $school->image_url) }}" style="object-fit: cover; margin: 10px auto 25px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                            <h3 class="font-semibold text-xl mb-1">{{ $school->title }}</h3>
                            <p class="leading-tight text-justify text-base text-gray-200">
                                {{ $school->description }}
                            </p>

                            <p class="leading-tight text-justify text-base text-gray-200" style="margin: 20px 0 0 0;">
                                {!! html_entity_decode($school->missions) !!}
                            </p>

                            <div class="flex" style="margin: 20px 0;">
                                <p class="leading-tight text-justify font-semibold " style="margin: auto 0 auto auto;">
                                    {{ $school->school . " " . $school->location }}
                            </div>
                            <div class="flex">
                                <p class="leading-tight text-justify bold" style="margin: auto 0 auto auto;">
                                <h1><span class="badge badge-light">{{ str_replace('-',' / ',date('d-m-Y', strtotime($school->start_date)))  . " - " . str_replace('-',' / ',date('d-m-Y', strtotime($school->end_date))) }}</span></h1>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div style="display: none;">{{ $count++ }}</div>
                    @endforeach
                </div>
            </div>
            @else

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
    <hr>

    <div class="h-16" id="skills"></div>
    <div class="py-12" style="padding-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($skills) > 0)
            <div class="font-semibold text-3xl title-portfolio" style="margin: 0 20px;">Compétences</div>
            <div class="container">
                <div class="flex flex-col mx-auto p-2 text-blue-50">
                    @foreach ($skills as $skill)
                    <div style="margin: 5px 0; display: flex;flex-wrap: wrap;flex-direction: row;">
                        <img src="{{ asset('storage/images/' . $skill->image_url) }}" class="shadow-xl" style="object-fit: cover; margin: 30px auto 30px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                        <div style="margin: 0px auto; width: 600px;">
                            <div class="font-semibold text-3xl title-portfolio" style="color: black;">{{ $skill->name }}</div>
                            <div class="text-lg" style="color: black;">{!! html_entity_decode($skill->description) !!}
                            </div>
                        </div>

                        <div style="width: 100%; margin: 30px;">
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200 shadow-xl">
                                <div style="width: {{ $skill->level*10 }}%;" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="relative pt-1">
                        <div class="flex">
                            <img src="{{ asset('storage/images/' . $skill->image_url) }}" class="shadow-xl" style="object-fit: cover; margin: 30px auto; width: 100px; height: 100px; border-radius: 5px; background-color: white;">
                            <div class="flex" style="flex-direction: row; margin: auto;">
                                <div class="text-xl text-gray-50" style="color: black; margin: auto 30px">{{ $skill->name }}
                                    <div class="text-base text-gray-800" style="margin-top: 10px;">{{ $skill->description }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200 shadow-xl">
                            <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"></div>
                        </div>
                    </div> -->
                    @endforeach
                </div>
            </div>
            @else

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p>De nouvelles compétences bientot ...</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="h-16" id="contact"></div>
    <div class="py-12 bg-dark" style="padding: 60px 10px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="w-full max-w-lg " style="margin: auto;" action="{{ route('store') }}" method="POST">
                <div class="flex flex-wrap mb-6">
                    <div class="w-full px-3">
                        <div class="text-3xl text-gray-50">Pour me contacter, suivez ce formulaire.</div>
                        <div class="text-base text-gray-400">Tout les champs sont requis.</div>
                    </div>
                </div>

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
                <div class="flex flex-wrap">
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
            Copyright © Gabriel DELAHAYE 2021 | <a href="{{ route('dashboard.home') }}" class="btn-admin">Panneau d'administration</a>
        </div>
    </div>
</x-portfolio-layout>