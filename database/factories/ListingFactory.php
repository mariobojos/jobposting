<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use function basename;
use function random_int;
use function storage_path;
use function ucfirst;
use function ucwords;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(random_int(5, 9));

        $content = '';
        for ($i = 0; $i < 6; $i++) {
            $content .= '<p>';
            $content .= $this->faker->sentence(random_int(6, 9), true);
            $content .= '</p>';
        }

        $dateTime = $this->faker->dateTimeBetween('-1 month', now());

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . random_int(1111, 9999),
            'company' => $this->faker->company,
            'location' => $this->faker->country(),
            'logo' => basename($this->faker->image(storage_path('app/public'))),
            'is_highlighted' => random_int(0,1) === 0,
            'is_active' => true,
            'content' => $content,
            'apply_link' => $this->faker->url(),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ];
    }
}
