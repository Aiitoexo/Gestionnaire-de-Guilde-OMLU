<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DataResource;
use App\Models\Gold;
use App\Models\Rarity;
use App\Models\Role;
use App\Models\Source;
use App\Models\Tier;
use App\Models\User;
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
            ['name' => 'appât'],
            ['name' => 'poisson'],
            ['name' => 'gemme'],
            ['name' => 'gemme taillée'],
            ['name' => 'pierre'],
            ['name' => 'minerai'],
            ['name' => 'peau'],
            ['name' => 'bois'],
            ['name' => 'fibre'],
            ['name' => 'bloc'],
            ['name' => 'lingot'],
            ['name' => 'cuir'],
            ['name' => 'planche'],
            ['name' => 'tissu'],
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

        $all_users = [
            [
                'name' => 'Aiito',
                'email' => 'aiitoexo@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '339814984521613312'
            ],
            [
                'name' => 'Caton',
                'email' => 'maxime.korsakoff@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '290926024924069908'
            ],
            [
                'name' => 'Psyko\'s wrath',
                'email' => 'psykoswrath@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '191583944158740480'
            ],
            [
                'name' => 'Eratalis',
                'email' => 'nicolasweber95590@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '102391380130697216'
            ],
            [
                'name' => 'Cerid',
                'email' => '07v5.z91217@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '257970504323956737'
            ],
            [
                'name' => 'Daikon',
                'email' => 'alexstbellie@gmail.com',
                'password' => '$2y$10$dGmRlZdtpfJnUVAVtMEyG.JzKCJWEmgVZZ4pJxXIpg2K.Ys7H7Tta',
                'discord' => '626110672454811661'
            ],
        ];

        foreach ($all_users as $user) {
            User::create($user);
        }

        $gold = ["gold" => 0];

        Gold::create($gold);

        $all_role = [
            [
                'name' => 'Gouverneur',
                'id_discord_role' => '839595989777514587',
            ],
            [
                'name' => 'Consul',
                'id_discord_role' => '839598015148064808',
            ],
            [
                'name' => 'Élu(e)',
                'id_discord_role' => '839334944739819570',
            ],
            [
                'name' => 'Artisan',
                'id_discord_role' => '840270639402188870',
            ],
            [
                'name' => 'Escadron progress 1',
                'id_discord_role' => '883183930797351003',
            ],
            [
                'name' => 'Escadron progress 2',
                'id_discord_role' => '883184282863013919',
            ],
            [
                'name' => 'Escadron progress 3',
                'id_discord_role' => '883184336348799036',
            ],
            [
                'name' => 'Escadron progress 4',
                'id_discord_role' => '883184434872983562',
            ],
            [
                'name' => 'Escadron progress 5',
                'id_discord_role' => '883184490736939099',
            ],
            [
                'name' => 'Escadron progress 6',
                'id_discord_role' => '883184574388142081',
            ],
            [
                'name' => 'Escadron progress 7',
                'id_discord_role' => '883184631212568596',
            ],
            [
                'name' => 'Escadron progress 8',
                'id_discord_role' => '883184688980697098',
            ],
            [
                'name' => 'Escadron progress 9',
                'id_discord_role' => '883184734858014730',
            ],
            [
                'name' => 'Escadron progress 10',
                'id_discord_role' => '883184783511912498',
            ],
            [
                'name' => 'Escadron progress 11',
                'id_discord_role' => '883184852269158450',
            ],
            [
                'name' => 'Escadron progress 12',
                'id_discord_role' => '883184926940364870',
            ],
            [
                'name' => 'Escadron progress 13',
                'id_discord_role' => '883184975153881138',
            ],
            [
                'name' => 'Escadron progress 14',
                'id_discord_role' => '883185027943387176',
            ],
            [
                'name' => 'Escadron progress 15',
                'id_discord_role' => '883185074118463488',
            ],
            [
                'name' => 'Escadron progress 16',
                'id_discord_role' => '883185120692019270',
            ],
            [
                'name' => 'Escadron progress 17',
                'id_discord_role' => '883185187268223007',
            ],
            [
                'name' => 'Escadron progress 18',
                'id_discord_role' => '883185235137818654',
            ],
            [
                'name' => 'Escadron progress 19',
                'id_discord_role' => '883185281870753833',
            ],
            [
                'name' => 'Escadron progress 20',
                'id_discord_role' => '883185336971296779',
            ],
        ];

        foreach ($all_role as $role) {
            Role::create($role);
        }
    }

}
