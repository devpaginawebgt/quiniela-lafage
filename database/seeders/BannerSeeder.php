<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'name'      => 'banner-validal',
                'url'       => '/images/banners/banner.png',
                'module_id' => 1,
                'line_id'   => 1,
            ],
            [
                'name'      => 'banner-tazarol',
                'url'       => '/images/banners/banner2.png',
                'module_id' => 1,
                'line_id'   => 1,
            ],

            [
                'name'      => 'banner-validal',
                'url'       => '/images/banners/banner.png',
                'module_id' => 1,
                'line_id'   => 2,
            ],
            [
                'name'      => 'banner-tazarol',
                'url'       => '/images/banners/banner2.png',
                'module_id' => 1,
                'line_id'   => 2,
            ],
        ];

        foreach($banners as $banner) {
            Banner::create($banner);
        }
    }
}
