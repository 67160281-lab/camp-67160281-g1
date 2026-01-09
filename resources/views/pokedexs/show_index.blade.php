@extends('template.default')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">รายละเอียด: {{ $pokedex->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($pokedex->image_url)
                        <img src="{{ $pokedex->image_url }}" alt="{{ $pokedex->name }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center border rounded" style="height: 250px;">
                            <span class="text-muted">ไม่มีรูปภาพ</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%" class="bg-light">Type:</th>
                            <td><span class="badge bg-info text-dark">{{ $pokedex->type }}</span></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Species:</th>
                            <td>{{ $pokedex->species }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Height:</th>
                            <td>{{ $pokedex->height }} m</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Weight:</th>
                            <td>{{ $pokedex->weight }} kg</td>
                        </tr>
                        <tr>
                            <th class="bg-light">HP:</th>
                            <td>{{ $pokedex->hp }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Attack:</th>
                            <td>{{ $pokedex->attack }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Defense:</th>
                            <td>{{ $pokedex->defense }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ url('/pokedexs') }}" class="btn btn-secondary">ย้อนกลับ</a>
            <a href="{{ url('/pokedexs/' . $pokedex->id . '/edit') }}" class="btn btn-warning">แก้ไขข้อมูล</a>
        </div>
    </div>
</div>
@endsection
