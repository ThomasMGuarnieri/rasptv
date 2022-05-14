<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RapsTV-Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div>
                    <h2>Rasp TV</h2>
                </div>
                <div class="pull-right mb-3 mt-4">
                    <a class="btn btn-success" href="{{ route('devices.create') }}"> Adicionar novo dispositivo</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Device Name</th>
                <th>Device Location</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
                <td>{{ $device->location }}</td>
                <td>
                    <form action="{{ route('devices.destroy',$device->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('devices.edit',$device->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $devices->links() !!}
</body>

</html>
