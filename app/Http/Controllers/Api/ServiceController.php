<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function services()
    {
        $services = Service::All();
        $data = [
            "succes" => true,
            "services" => $services
        ];

        return response()->json($data, 200);
    }
}
