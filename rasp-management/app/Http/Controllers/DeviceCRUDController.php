<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceCRUDController extends Controller
{

    public function index()
    {
        $data['devices'] = Device::orderBy('id', 'desc')->paginate(5);
        return view('devices.index', $data);
    }

    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string|nullable'
        ]);

        $device = new Device;
        $device->name = $request->name;
        $device->location = $request->location;
        $device->save();

        return redirect()->route('devices.index')
            ->with('success', 'Device has been created successfully.');
    }

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'required|string|nullable'
        ]);

        $device = Device::find($id);
        $device->name = $request->name;
        $device->location = $request->location;
        $device->save();

        return redirect()->route('devices.index')
            ->with('success', 'Device Has Been updated successfully');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')
            ->with('success', 'Device has been deleted successfully');
    }
}
