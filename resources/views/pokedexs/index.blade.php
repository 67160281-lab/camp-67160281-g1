{{-- 1. สืบทอดโครงสร้างหลักจาก template/default --}}
@extends('template.default')

@section('content')
    <h1>Pokedex Create</h1>

    {{--
        2. ส่วนแสดง Error (Validation Error):
        ถ้าฟังก์ชัน check() ใน Controller บอกว่าข้อมูลไม่ผ่าน (เช่น ลืมกรอกชื่อ)
        Laravel จะส่งตัวแปร $errors กลับมาที่หน้านี้ เราก็วนลูปแสดงข้อความแจ้งเตือน
    --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--
        3. ฟอร์มสำหรับส่งข้อมูล:
        action="{{ url('/pokedexs') }}" -> ส่งไปที่ Route '/pokedexs'
        method="post" -> ส่งแบบ POST (เพื่อวิ่งไปหา PokedexController::store)
    --}}
    <form action="{{ url('/pokedexs') }}" method="post">

        {{-- 4. @csrf : กุญแจความปลอดภัย ห้ามลืมใส่ในฟอร์ม POST ทุกครั้ง --}}
        @csrf

        {{-- กลุ่มกรอกข้อมูล (Text) --}}
        <label for="name">Name:</label>
        {{-- name="..." ต้องตรงกับที่เขียนใน Controller ($request->input('name')) --}}
        <input class="form-control" type="text" name="name" id="name">

        <label for="type">Type:</label>
        <input class="form-control" type="text" name="type" id="type">

        <label for="species">Species:</label>
        <input class="form-control" type="text" name="species" id="species">

        {{--
            กลุ่มกรอกข้อมูลตัวเลข (Number)
            หมายเหตุ: ถ้าต้องการให้กรอกทศนิยมได้ (เช่น ส่วนสูง 1.5)
            ควรเติม step="any" หรือ step="0.01" ใน input ด้วยครับ
        --}}
        <label for="height">Height:</label>
        <input class="form-control" type="number" name="height" id="height">

        <label for="weight">Weight:</label>
        <input class="form-control" type="number" name="weight" id="weight">

        <label for="hp">HP:</label>
        <input class="form-control" type="number" name="hp" id="hp">

        <label for="attack">Attack:</label>
        <input class="form-control" type="number" name="attack" id="attack">

        <label for="defense">Defense:</label>
        <input class="form-control" type="number" name="defense" id="defense">

        <label for="image_url">Image URL:</label>
        <input class="form-control" type="text" name="image_url" id="image_url">

        {{-- ปุ่มกด Submit --}}
        <button class="btn btn-primary" type="submit">Create Pokedex</button>
    </form>

    {{-- 5. ดึงตารางรายชื่อมาแสดงด้านล่าง (เพื่อให้เห็นว่าข้อมูลถูกเพิ่มแล้วหรือยัง) --}}
    @include('pokedexs.table')

@endsection
