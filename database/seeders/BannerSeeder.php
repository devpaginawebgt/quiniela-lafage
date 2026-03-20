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
                'name'      => 'banner-neurotazarol',
                'url'       => '/images/banners/Banner-Principal-Neurotazarol-1080x660.png',
                'module_id' => 1,
                'line_id'   => 1,
            ],
            [
                'name'      => 'banner-neurotazarol-hn',
                'url'       => '/images/banners/Banner-Principal-Neurotazarol-1080x660.png',
                'module_id' => 2,
                'line_id'   => 1,
            ],
        ];

        foreach($banners as $banner) {
            Banner::create($banner);
        }
    }
}
