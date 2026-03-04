<?php

namespace App\Http\Services;

use App\Models\Banner;
use App\Models\Line;

class BannerService {

    public function getBanners($module_id, $line_id)
    {
        return Banner::where('module_id', $module_id)
            ->where('line_id', $line_id)
            ->where('is_active', 1)
            ->get();
    }

}