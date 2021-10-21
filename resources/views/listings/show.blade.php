<x-app-layout>
    <section class="text-gray-600 overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-12">
                <h2 class="text-2xl font-medium text-gray-900 items-center justify-start">
                    {{ $listing->title }}
                </h2>
                <div class="md:flex-grow mr-8 mt-3 flex items-center justify-start">
                    @foreach($listing->tags as $tag)
                        <span class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase bg-white text-indigo-500"
                        >{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="my-3.5">
                    <div class="flex flex-wrap md:flex-nowrap">
                        <div class="content w-full md:w-3/4 pr-4 leading-relaxed text-base">
                            {!! $listing->content !!}
                        </div>
                        <div class="w-1/4 md:w-1/4 pl-4">
                            <img class="max-w-full mb-4"
                                src="/storage/{{ $listing->logo }}" alt="{{ $listing->company }} logo" />
                            <p class="leading-relaxed text-base">
                                <strong>Location: </strong>{{ $listing->location }} <br />
                                <strong>Company: </strong>{{ $listing->company }}
                            </p>
                            <a class="block text-center my-4 tracking-wide bg-white font-medium py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase"
                               href="#" >Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
