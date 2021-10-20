<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function strtolower;

class ListingController extends Controller
{
    /**
     * Display a listings of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listings = Listing::where('is_active', true)
            ->with('tags')
            ->latest()
            ->get()
//            ->cursorPaginate(20);
        ;

        $listingsCount = Listing::where('is_active', true)->get();

//        $titles = [];
//        $index = 0;
//        foreach ($listings as $listing) {
//            $titles[$index]['title'] = $listing->title;
//            $titles[$index]['tags'] = $listing->tags->map(function ($tag) {
//                return $tag->slug;
//            });
//            $index++;
//        }

        $tags = Tag::orderBy('name')->get();

        if (\request()->has('s')) {
            $query = strtolower(\request()->input('s'));
            $listings = $listings->filter(function ($listing) use ($query) {
                if (Str::contains(strtolower($listing->title), $query)) {
                    return true;
                }

                if (Str::contains(strtolower($listing->company), $query)) {
                    return true;
                }

                if (Str::contains(strtolower($listing->location), $query)) {
                    return true;
                }

                if (Str::contains(strtolower($listing->content), $query)) {
                    return true;
                }

                return false;
            });
        }

        if (\request()->has('tag')) {
            $tag = \request()->input('tag');
            $listings = $listings->filter(function ($listing) use ($tag) {
                return $listing->tags->contains('slug', $tag);
            });
        }

        return view('listings.index', compact('listings', 'tags', 'listingsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
