<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Top jobs in the industry</h1>
            <p class="mb-8 leading-relaxed">Whether you're looking to move to a new role or just seeing what's availabe,
                we've gathered this comprehensive list of open positions from a variety of companies and locations for
                you to choose from.
            </p>
            <form class="flex justify-center items-end"
                action="{{ route('listings.index') }}" method="get">
                <div class="relative">
                    <input class="w-full bg-white outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        type="text" id="s" name="s" value="{{ request()->input('s') }}">
                </div>
                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
            </form>
            <p class="text-sm mt-2 text-gray-500 mb-8 w-full">fullstack php, laravel, vue and node, react native</p>
        </div>
    </div>
</section>
