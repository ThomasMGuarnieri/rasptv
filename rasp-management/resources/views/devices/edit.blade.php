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
                <div class="pull-left">
                    <h2>Editar dispositivo</h2>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('devices.update',$device->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="name" value="{{ $device->name }}" class="form-control" placeholder="Device name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Local de instalação:</strong>
                        <input type="text" name="location" class="form-control" placeholder="Device Location" value="{{ $device->location }}">
                        @error('location')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID da playlist do Youtube:</strong>
                        <input type="text" name="playlist_id" class="form-control" value="{{ $device->playlist_id }}">
                        @error('playlist_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Frases (separadas por ';'):</strong>
                        <input type="text" name="phrases" class="form-control" value="{{ $device->phrases }}">
                        @error('phrases')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Salvar</button>
                <a class="btn btn-danger ml-1" href="{{ route('devices.index') }}" enctype="multipart/form-data"> Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>
