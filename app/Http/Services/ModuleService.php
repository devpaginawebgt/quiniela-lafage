<?php

namespace App\Http\Services;

use App\Models\Line;
use App\Models\Module;

class ModuleService {

    public function getModule($module_code)
    {
        return Module::where('code', $module_code)->first();
    }

}