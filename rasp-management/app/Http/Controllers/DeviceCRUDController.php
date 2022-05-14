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
        $request->validate($this->toValidate());

        $this->save(new Device, $request);

        return redirect()->route('devices.index')
            ->with('success', 'Dispositivo adicionado com sucesso.');
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
        $request->validate($this->toValidate());

        $device = Device::find($id);

        $this->save($device, $request);

        $device->mustBeRefreshed();

        return redirect()->route('devices.index')
            ->with('success', 'Dispositivo atualizado com sucesso');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('devices.index')
            ->with('success', 'Dispositivo removido');
    }

    private function toValidate(): array
    {
        return [
            'name' => 'required|string',
            'location' => 'string',
            'playlist_id' => 'required|string',
            'phrases' => 'required|string'
        ];
    }

    private function save(Device $device, Request $request)
    {
        $device->name = $request->name;
        $device->location = $request->location;
        $device->playlist_id = $request->playlist_id;
        $device->phrases = $request->phrases;
        $device->save();
    }
}
