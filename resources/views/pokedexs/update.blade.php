@extends('template.default')

@section('content')
    <h1>Pokedex Update</h1>

    {{-- 1. ส่วนแสดง Error: ถ้าแก้ไขแล้วข้อมูลไม่ผ่านเงื่อนไข (เช่น ลบชื่อออกจนว่าง) ก็จะแจ้งเตือนตรงนี้ --}}
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
        2. Form Action:
        ต้องระบุ ID ของตัวที่จะแก้ลงไปใน URL ด้วย
        เช่น /pokedexs/1, /pokedexs/5
        ตัวแปร $pokedex_update ถูกส่งมาจาก Controller ฟังก์ชัน edit()
    --}}
    <form action="{{ url('/pokedexs/' . $pokedex_update->id) }}" method="post">

        {{-- กุญแจความปลอดภัย --}}
        @csrf

        {{--
            3. @method('PUT'):
            หัวใจสำคัญของหน้า Edit!
            HTML Form ส่งได้แค่ GET/POST แต่ Laravel Resource ต้องการ PUT สำหรับการ Update
            บรรทัดนี้จะแปลง POST เป็น PUT ให้
        --}}
        @method('PUT')

        {{--
            4. การ Pre-fill ข้อมูล (value="..."):
            เราต้องเอาข้อมูลเก่าจากฐานข้อมูลมาใส่ใน attribute value=""
            เพื่อให้ User เห็นว่าของเดิมคืออะไร ก่อนที่จะแก้
        --}}

        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name"
               value="{{ $pokedex_update->name }}">

        <label for="type">Type:</label>
        <input class="form-control" type="text" name="type" id="type"
               value="{{ $pokedex_update->type }}">

        <label for="species">Species:</label>
        <input class="form-control" type="text" name="species" id="species"
               value="{{ $pokedex_update->species }}">

        {{--
            ข้อแนะนำ: สำหรับ input type="number" ที่เป็นทศนิยม (Height, Weight)
            ควรเพิ่ม step="any" หรือ step="0.01" ด้วยครับ ไม่งั้นอาจจะแก้ค่าเป็นทศนิยมไม่ได้
        --}}
        <label for="height">Height:</label>
        <input class="form-control" type="number" step="any" name="height" id="height"
               value="{{ $pokedex_update->height }}">

        <label for="weight">Weight:</label>
        <input class="form-control" type="number" step="any" name="weight" id="weight"
               value="{{ $pokedex_update->weight }}">

        <label for="hp">HP:</label>
        <input class="form-control" type="number" name="hp" id="hp"
               value="{{ $pokedex_update->hp }}">

        <label for="attack">Attack:</label>
        <input class="form-control" type="number" name="attack" id="attack"
               value="{{ $pokedex_update->attack }}">

        <label for="defense">Defense:</label>
        <input class="form-control" type="number" name="defense" id="defense"
               value="{{ $pokedex_update->defense }}">

        <label for="image_url">Image URL:</label>
        <input class="form-control" type="text" name="image_url" id="image_url"
               value="{{ $pokedex_update->image_url }}">

        <button class="btn btn-primary mt-3" type="submit">Update Pokedex</button>
        {{-- ปุ่มยกเลิก (ควรมี) --}}
        <a href="{{ url('/pokedexs') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>

    {{-- แสดงตารางด้านล่างด้วย --}}
    @include('pokedexs.table')
@endsection
