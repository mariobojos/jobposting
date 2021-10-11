<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use function random_int;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $tags = \App\Models\Tag::factory(random_int(4, 8))->create();

        // NOTE: Create 10 to 20 User. For each user, create 2 to 5 Listing passing the User->id to Listing as FK
        \App\Models\User::factory(10)->create()->each(function ($user) use ($tags) {
            \App\Models\Listing::factory(random_int(4, 8))->create([
                'user_id' => $user->id
           ])->each(function ($listing) use ($tags) {
                // attach() is a function used in Many-to-Many relationships with parameter (array of
                // Eloquent objects or array of IDs) and populate the pivot table (Listing_Tag table, in this instance)
                $listing->tags()->attach($tags->random(3));
           });
        });

    }
}
