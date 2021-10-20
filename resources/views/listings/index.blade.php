<x-app-layout>
    <x-hero></x-hero>
    <section class="container px-5 py-4 mx-auto">
        <div class="mb-8">
            <div class="flex justify-center">
                @foreach($tags as $tag)
                    <a href="{{ route('listings.index', ['tag' => $tag->slug]) }}"
                       class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500'  }}"
                    >{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="mb-12">
            <h2 class="text-2xl text-gray-900 font-medium title-font px-4">
                All jobss ({{ $listingsCount->count() }})
            </h2>
        </div>
        <div class="-my-6">
            @foreach($listings as $listing)
                <a href="{{ $listing->url }}"
                   class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $listing->is_highlighted ? 'bg-red-500 text-white' : 'bg-white' }}"
                >
                    <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                        <img src="/storage/{{ $listing->logo }}" alt="{{ $listing->company }}"
                             class="w-16 h-16 rounded-full object-cover" />
                    </div>
                    <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">
                            {{ $listing->title }}
                        </h2>
                        <p class="leading-relaxed text-gray-900">
                            {{ $listing->company }} &mdash;
                            <span class="text-gray-600">{{ $listing->location }}</span>
                        </p>
                    </div>
                    <div class="md:flex-grow mr-8 flex items-center">
                        @foreach($listing->tags as $tag)
                            <span href="{{ route('listings.index', ['tag' => $tag->slug]) }}"
                               class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $tag->slug === request()->get('tag') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500'  }}"
                            >{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <div class="md:flex-grow flex items-center">
                        <span>
                            {{ $listing->created_at->diffForHumans() }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="my-16">
            {{ $listings->links() }}
        </div>
    </section>
</x-app-layout>
