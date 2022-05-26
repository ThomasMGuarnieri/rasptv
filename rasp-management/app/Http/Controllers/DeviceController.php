<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Models\Device;

class DeviceController extends Controller
{
    public function needsToRefresh(Device $device)
    {
        $isRefreshed = $device->refresh;

        $date = [
            'refresh' => $isRefreshed
        ];

        return  json_encode($date);
    }

    public function refresh(Device $device)
    {
        $device->alreadyBeenRefreshed();

        return new DeviceResource($device);
    }
}
