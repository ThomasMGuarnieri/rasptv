<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Models\Device;

class DeviceController extends Controller
{
    public function needsToRefresh(Device $device)
    {
        $isRefreshed = $device->refresh;
        $device->alreadyBeenRefreshed();

        return $isRefreshed;
    }

    public function refresh(Device $device)
    {
        return new DeviceResource($device);
    }
}
