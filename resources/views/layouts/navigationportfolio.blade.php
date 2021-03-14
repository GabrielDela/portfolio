<nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style="position: fixed; width: 100vw; z-index: 1;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex" style="width: 100%;">
                <div class="flex-shrink-0 flex items-center">
                    <x-nav-link href="#home" class="text-gray-800 font-weight-bold" style="text-decoration: none;">
                        <!-- active="request()->routeIs('index')" -->
                        {{ __('Gabriel DELAHAYE') }}
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-left: auto;">
                    <x-nav-link href="#experiences" id="btnExperiences" style="text-decoration: none;">
                        {{ __('Expériences') }}
                    </x-nav-link>
                    <x-nav-link href="#schools" id="btnScholarships" style="text-decoration: none;">
                        {{ __('Scolarité') }}
                    </x-nav-link>
                    <x-nav-link href="#skills" id="btnSkills" style="text-decoration: none;">
                        {{ __('Compétences') }}
                    </x-nav-link>
                    <x-nav-link href="#contact" id="btnContact" @click="open = ! open" style="text-decoration: none;">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="#experiences" id="btnExperiencesRES" @click="open = ! open" style="text-decoration: none;">
                {{ __('Expériences') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#schools" id="btnScholarshipsRES" @click="open = ! open" style="text-decoration: none;">
                {{ __('Scolarité') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#skills" id="btnSkillsRES" @click="open = ! open" style="text-decoration: none;">
                {{ __('Compétences') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#contact" id="btnContactRES" @click="open = ! open" style="text-decoration: none;">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>
    </div>


    <script>
        var btnExperiences = document.getElementById("btnExperiences");
        var btnScholarships = document.getElementById("btnScholarships");
        var btnSkills = document.getElementById("btnSkills");
        var btnContact = document.getElementById("btnContact");

        var btnExperiencesRES = document.getElementById("btnExperiencesRES");
        var btnScholarshipsRES = document.getElementById("btnScholarshipsRES");
        var btnSkillsRES = document.getElementById("btnSkillsRES");
        var btnContactRES = document.getElementById("btnContactRES");

        var buttons = [btnExperiences, btnScholarships, btnSkills, btnContact, btnExperiencesRES, btnScholarshipsRES, btnSkillsRES, btnContactRES];

        for (var i = 0; i < buttons.length; i++) {
            var element = buttons[i];

            element.classList.remove("border-transparent");
            element.classList.remove("text-grey-500");
            element.classList.remove("hover:text-red-700");
            element.classList.remove("hover:border-red-300");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:text-red-700");
            element.classList.remove("focus:border-red-300");
            element.classList.remove("border-red-400");
            element.classList.remove("text-red-900");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:border-red-700");
            element.classList.add("border-red-100");
            element.classList.add("hover:border-red-400");
            element.classList.add("hover:border-red-700");
        }

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', (event) => {
                var buttonID = event.path[0].id;
                for (var i = 0; i < buttons.length; i++) {
                    var element = buttons[i];
                    element.classList.remove("border-transparent");
                    element.classList.remove("text-grey-500");
                    element.classList.remove("hover:text-red-700");
                    element.classList.remove("hover:border-red-300");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:text-red-700");
                    element.classList.remove("focus:border-red-300");
                    element.classList.remove("border-red-400");
                    element.classList.remove("text-red-900");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:border-red-700");
                    element.classList.add("border-red-100");
                    element.classList.add("hover:border-red-400");
                    element.classList.add("hover:border-red-700");
                    if (element.id == buttonID.replace("RES", "") || element.id == buttonID.replace("RES", "") + "RES") {
                        element.classList.add("border-red-400");
                        element.classList.add("text-grey-900");
                        element.classList.add("focus:outline-none");
                        element.classList.add("focus:border-red-700");
                    }
                }
            });
        }
    </script>
</nav>