<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DataResource;
use App\Models\Rarity;
use App\Models\Source;
use App\Models\Tier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $all_rarities = [
            [
                'name' => 'ordinaire',
                'color_frame' => '#808080',
            ],
            [
                'name' => 'insolite',
                'color_frame' => '#34bf48',
            ],
            [
                'name' => 'rare',
                'color_frame' => '#28bfd0',
            ],
            [
                'name' => 'épique',
                'color_frame' => '#e72fe5',
            ],
            [
                'name' => 'légendaire',
                'color_frame' => '#c76b2a',
            ],
        ];

        foreach ($all_rarities as $rarity) {
            Rarity::create($rarity);
        }

        $all_tiers = [
            ['name' => 'I'],
            ['name' => 'II'],
            ['name' => 'III'],
            ['name' => 'IV'],
            ['name' => 'V'],
        ];

        foreach ($all_tiers as $tier) {
            Tier::create($tier);
        }

        $all_categories = [
            ['name' => 'Appât'],
            ['name' => 'Poisson'],
            ['name' => 'Gemme'],
            ['name' => 'Pierre'],
            ['name' => 'Minerai'],
            ['name' => 'Peau'],
            ['name' => 'Bois'],
            ['name' => 'Fibre'],
            ['name' => 'Bloc'],
            ['name' => 'Lingot'],
            ['name' => 'Cuir'],
            ['name' => 'Planche'],
            ['name' => 'Tissu'],
        ];

        foreach ($all_categories as $category) {
            Category::create($category);
        }

        $all_sources = [
            ['name' => 'Récolte'],
            ['name' => 'Craft']
        ];

        foreach ($all_sources as $source) {
            Source::create($source);
        }
    }

}
