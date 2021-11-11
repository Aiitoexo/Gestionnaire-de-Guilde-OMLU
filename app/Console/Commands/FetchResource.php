<?php

namespace App\Console\Commands;

use App\Models\DataResource;
use App\Models\Resource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all_pages = [
            'https://newworldfans.com/db/category/Resource/Bait?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Fish?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Fish?page=2&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Gem?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Gem?page=2&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Gem?page=3&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Stone?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Ore?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Rawhide?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Wood?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Fiber?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Block?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Ingot?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Leather?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Timber?page=1&attributes=&perks=&sort=name&dir=asc',
            'https://newworldfans.com/db/category/Resource/Cloth?page=1&attributes=&perks=&sort=name&dir=asc',
        ];

        $array_data = [];

        $all_data_resource = DataResource::all();

        foreach ($all_pages as $page) {
            $response = Http::acceptJson()->get($page);

            $response->json();

//            dd($response);
            $all_items = $response['subjects']['data'];

            $category = [];

            foreach ($all_items as $item) {
//                dd($item['attributes']['name']);
                $data = [];

//                foreach ($all_data_resource as $data_resource) {
//                    if (str_contains($data_resource->key, $item['attributes']['icon_path']) && str_contains($data_resource->key, 'MasterName')) {
//                        $name = $data_resource->name;
//                    }
//                }

//                if ($name !== null && str_contains($item['attributes']['slug'], 'ingot') && $item['attributes']['item_class_en'] === 'Ingot' && !str_contains($item['attributes']['slug'], 'fae')) {

                    $data['name'] = $item['attributes']['name'];
                    $data['category_id'] = $item['attributes']['item_class_en'];

                    switch ($data['category_id']) {
                        case 'Bait':
                            $data['category_id'] = 1;
                            break;
                        case 'Fish':
                            $data['category_id'] = 2;
                            break;
                        case 'Gem':
                            if (str_contains( $item['attributes']['slug'], 'cut')) {
                                $data['category_id'] = 4;
                            } else {
                                $data['category_id'] = 3;
                            }
                            break;
                        case 'Stone':
                            $data['category_id'] = 5;
                            break;
                        case 'Ore':
                            $data['category_id'] = 6;
                            break;
                        case 'Rawhide':
                            $data['category_id'] = 7;
                            break;
                        case 'Wood':
                            $data['category_id'] = 8;
                            break;
                        case 'Fiber':
                            $data['category_id'] = 9;
                            break;
                        case 'Block':
                            $data['category_id'] = 10;
                            break;
                        case 'Ingot':
                            $data['category_id'] = 11;
                            break;
                        case 'Leather':
                            $data['category_id'] = 12;
                            break;
                        case 'Timber':
                            $data['category_id'] = 13;
                            break;
                        case 'Cloth':
                            $data['category_id'] = 14;
                            break;
                    }

                    $data['img'] = $item['attributes']['cdn_asset_path'];
                    $data['rarity_id'] = $item['attributes']['rarity'];

                    if ($data['rarity_id'] === 'common') {
                        $data['rarity_id'] = 1;
                    } elseif ($data['rarity_id'] === 'uncommon') {
                        $data['rarity_id'] = 2;
                    } elseif ($data['rarity_id'] === 'rare') {
                        $data['rarity_id'] = 3;
                    } elseif ($data['rarity_id'] === 'epic') {
                        $data['rarity_id'] = 4;
                    } elseif ($data['rarity_id'] === 'legendary') {
                        $data['rarity_id'] = 5;
                    }

                    $data['tier_id'] = $item['attributes']['tier'];

                    $data['source_id'] = $item['attributes']['source'];

                    if ($data['source_id'] === null) {
                        $data['source_id'] = 1;
                    } else {
                        $data['source_id'] = 2;
                    }

                    array_push($array_data, $data);

//                } elseif ($name !== null && !str_contains($item['attributes']['slug'], 'ingot') && $item['attributes']['item_class_en'] !== 'Ingot' && !str_contains($item['attributes']['slug'], 'fae')) {
//
//                    $data['name'] = $name;
//                    $data['category_id'] = $item['attributes']['item_class_en'];
//
//                    switch ($data['category_id']) {
//                        case 'Bait':
//                            $data['category_id'] = 1;
//                            break;
//                        case 'Fish':
//                            $data['category_id'] = 2;
//                            break;
//                        case 'Gem':
//                            if (str_contains( $item['attributes']['slug'], 'cut')) {
//                                $data['category_id'] = 4;
//                            } else {
//                                $data['category_id'] = 3;
//                            }
//                            break;
//                        case 'Stone':
//                            $data['category_id'] = 5;
//                            break;
//                        case 'Ore':
//                            $data['category_id'] = 6;
//                            break;
//                        case 'Rawhide':
//                            $data['category_id'] = 7;
//                            break;
//                        case 'Wood':
//                            $data['category_id'] = 8;
//                            break;
//                        case 'Fiber':
//                            $data['category_id'] = 9;
//                            break;
//                        case 'Block':
//                            $data['category_id'] = 10;
//                            break;
//                        case 'Ingot':
//                            $data['category_id'] = 11;
//                            break;
//                        case 'Leather':
//                            $data['category_id'] = 12;
//                            break;
//                        case 'Timber':
//                            $data['category_id'] = 13;
//                            break;
//                        case 'Cloth':
//                            $data['category_id'] = 14;
//                            break;
//                    }
//
//                    $data['img'] = $item['attributes']['cdn_asset_path'];
//                    $data['rarity_id'] = $item['attributes']['rarity'];
//
//                    if ($data['rarity_id'] === 'common') {
//                        $data['rarity_id'] = 1;
//                    } elseif ($data['rarity_id'] === 'uncommon') {
//                        $data['rarity_id'] = 2;
//                    } elseif ($data['rarity_id'] === 'rare') {
//                        $data['rarity_id'] = 3;
//                    } elseif ($data['rarity_id'] === 'epic') {
//                        $data['rarity_id'] = 4;
//                    } elseif ($data['rarity_id'] === 'legendary') {
//                        $data['rarity_id'] = 5;
//                    }
//
//                    $data['tier_id'] = $item['attributes']['tier'];
//
//                    $data['source_id'] = $item['attributes']['source'];
//
//                    if ($data['source_id'] === null) {
//                        $data['source_id'] = 1;
//                    } else {
//                        $data['source_id'] = 2;
//                    }
//
//                    array_push($array_data, $data);
//                }
            }

        }
//        dd($array_data);

        foreach ($array_data as $item) {
            $exists = Resource::where('name', '=', $item['name'])->exists();

            if (!$exists && $item['category_id'] !== 'OutpostRushOnly') {
                Resource::create($item);
            }
        }
    }
}
