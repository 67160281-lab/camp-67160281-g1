@extends('template.default')

@section('content')
<div class="container mt-4">
    {{-- ใช้ Card ของ Bootstrap เพื่อกรอบข้อมูลให้ดูสวยงาม --}}
    <div class="card">

        {{-- ส่วนหัวการ์ด: แสดงชื่อโปเกมอน --}}
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">รายละเอียด: {{ $pokedex->name }}</h2>
        </div>

        <div class="card-body">
            <div class="row">

                {{-- 1. คอลัมน์ซ้าย (กว้าง 4/12) : สำหรับแสดงรูปภาพ --}}
                <div class="col-md-4 text-center">

                    {{-- ตรวจสอบว่ามีลิงก์รูปภาพหรือไม่? --}}
                    @if ($pokedex->image_url)
                        {{-- ถ้ามี: ให้แสดงรูป --}}
                        <img src="{{ $pokedex->image_url }}" alt="{{ $pokedex->name }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                    @else
                        {{-- ถ้าไม่มี: ให้แสดงกล่องสี่เหลี่ยมเขียนว่า "ไม่มีรูปภาพ" --}}
                        <div class="bg-light d-flex align-items-center justify-content-center border rounded" style="height: 250px;">
                            <span class="text-muted">ไม่มีรูปภาพ</span>
                        </div>
                    @endif
                </div>

                {{-- 2. คอลัมน์ขวา (กว้าง 8/12) : สำหรับแสดงตารางค่าพลัง --}}
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%" class="bg-light">Type:</th>
                            {{-- ใช้ Badge เพื่อทำไฮไลท์สีให้ตรง Type ดูเด่นขึ้น --}}
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

        {{-- ส่วนท้ายการ์ด: ปุ่มกด --}}
        <div class="card-footer text-end">
            {{-- ปุ่มย้อนกลับไปหน้ารวม --}}
            <a href="{{ url('/pokedexs') }}" class="btn btn-secondary">ย้อนกลับ</a>

            {{-- ปุ่มแก้ไข (ส่ง ID ไปด้วย) --}}
            <a href="{{ url('/pokedexs/' . $pokedex->id . '/edit') }}" class="btn btn-warning">แก้ไขข้อมูล</a>
        </div>
    </div>
</div>
@endsection
