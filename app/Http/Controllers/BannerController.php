<?php

namespace App\Http\Controllers;

use App\Http\Resources\Banner\BannerResource;
use App\Http\Services\BannerService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly BannerService $bannerService
    ) {}

    public function index(Request $request, string $module_id)
    {
        $module_id = (int)$module_id;

        if (empty($module_id)) {
            return $this->errorResponse('No se encontró el módulo', 422);
        }

        $user = $request->user();

        $line_id = (int) $user->line_id;

        $banners = $this->bannerService->getBanners($module_id, $line_id);

        $banners = BannerResource::collection($banners);

        return $this->successResponse($banners);
    }
}
