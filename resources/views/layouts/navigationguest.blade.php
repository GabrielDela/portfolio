<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <x-nav-link :href="route('index')" class="text-gray-800 font-weight-bold">
                        <!-- active="request()->routeIs('index')" -->
                        {{ __('Gabriel DELAHAYE') }}
                    </x-nav-link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="#portfolio" id="btnPortfolio">
                        {{ __('Portfolio') }}
                    </x-nav-link>
                    <x-nav-link href="#experiences" id="btnExperiences">
                        {{ __('Expériences') }}
                    </x-nav-link>
                    <x-nav-link href="#scholarships" id="btnScholarships">
                        {{ __('Scolarité') }}
                    </x-nav-link>
                    <x-nav-link href="#skills" id="btnSkills">
                        {{ __('Compétences') }}
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
            <x-responsive-nav-link href="#portfolio" id="btnPortfolioRES" @click="open = ! open">
                {{ __('Portfolio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#experiences" id="btnExperiencesRES" @click="open = ! open">
                {{ __('Expériences') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#scholarships" id="btnScholarshipsRES" @click="open = ! open">
                {{ __('Scolarité') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#skills" id="btnSkillsRES" @click="open = ! open">
                {{ __('Compétences') }}
            </x-responsive-nav-link>
        </div>
    </div>


    <script>
        var btnPortfolio = document.getElementById("btnPortfolio");
        var btnExperiences = document.getElementById("btnExperiences");
        var btnScholarships = document.getElementById("btnScholarships");
        var btnSkills = document.getElementById("btnSkills");

        var btnPortfolioRES = document.getElementById("btnPortfolioRES");
        var btnExperiencesRES = document.getElementById("btnExperiencesRES");
        var btnScholarshipsRES = document.getElementById("btnScholarshipsRES");
        var btnSkillsRES = document.getElementById("btnSkillsRES");

        var buttons = [btnPortfolio, btnExperiences, btnScholarships, btnSkills, btnPortfolioRES, btnExperiencesRES, btnScholarshipsRES, btnSkillsRES];

        for (var i = 0; i < buttons.length; i++) {
            var element = buttons[i];
            element.classList.remove("border-transparent");
            element.classList.remove("text-gray-500");
            element.classList.remove("hover:text-gray-700");
            element.classList.remove("hover:border-gray-300");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:text-gray-700");
            element.classList.remove("focus:border-gray-300");
            element.classList.remove("border-indigo-400");
            element.classList.remove("text-gray-900");
            element.classList.remove("focus:outline-none");
            element.classList.remove("focus:border-indigo-700");
            if (element.id == "btnPortfolio" || element.id == "btnPortfolioRES") {
                element.classList.add("border-indigo-400");
                element.classList.add("text-gray-900");
                element.classList.add("focus:outline-none");
                element.classList.add("focus:border-indigo-700");
            }
        }

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', (event) => {
                var buttonID = event.path[0].id;
                for (var i = 0; i < buttons.length; i++) {
                    var element = buttons[i];
                    element.classList.remove("border-transparent");
                    element.classList.remove("text-gray-500");
                    element.classList.remove("hover:text-gray-700");
                    element.classList.remove("hover:border-gray-300");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:text-gray-700");
                    element.classList.remove("focus:border-gray-300");
                    element.classList.remove("border-indigo-400");
                    element.classList.remove("text-gray-900");
                    element.classList.remove("focus:outline-none");
                    element.classList.remove("focus:border-indigo-700");
                    if (element.id == buttonID.replace("RES", "") || element.id == buttonID.replace("RES", "") + "RES") {
                        element.classList.add("border-indigo-400");
                        element.classList.add("text-gray-900");
                        element.classList.add("focus:outline-none");
                        element.classList.add("focus:border-indigo-700");
                    }
                }
            });
        }
    </script>
</nav>