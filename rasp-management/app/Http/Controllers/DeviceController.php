<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Models\Device;
use App\Models\Phrase;
use App\Models\Playlist;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function needsToRefresh(Device $device)
    {
        $device->alreadyBeenRefreshed();

        return $device->refresh;
    }

    public function refresh(Device $device)
    {
        return new DeviceResource($device);
    }

    public function store(Request $request)
    {
        $device = new Device();
        $device->name = $request->name;
        $device->location = $request->location;
        $device->save();

        return response(['id' => $device->id], 200);
    }

    public function setPlaylist(Device $device, Request $request)
    {
        $playlist = Playlist::updateOrCreate(['external_id' => $request->get('external_id')]);

        $device->mustBeRefreshed();

        $device->playlist()->associate($playlist);
    }

    public function setPhrase(Device $device, Request $request)
    {
        $phrase = Phrase::updateOrCreate(['phrase' => $request->get('phrase')]);

        $device->mustBeRefreshed();

        $device->phrases()->attach($phrase);
    }

    public function unsetPhrase(Device $device, Phrase $phrase)
    {
        $device->mustBeRefreshed();

        $device->phrases()->detach([$phrase->id]);
    }
}
