<!DOCTYPE html>
<html>

<head>
    {{-- 1. ส่วนกำหนด Title ของ Tab Browser --}}
    {{-- @yield('title') คือการเจาะช่องไว้ ให้หน้าลูกๆ ส่งชื่อหน้ามาใส่ตรงนี้ --}}
    <title>@yield('title')</title>

    {{-- 2. โหลดไฟล์ CSS จากเครื่อง (ในโฟลเดอร์ public/css) --}}
    {{-- ข้อสังเกต: ตรง bootstrap..css มีจุดเกินมา 1 จุดนะครับ น่าจะเป็น .css เฉยๆ --}}
    <link rel="stylesheet" href="{{ url('css/bootstrap..css')}}">

    {{-- 3. โหลด Bootstrap 5 จาก CDN (โหลดผ่านเน็ต) --}}
    {{-- ถ้าเครื่องไม่ได้ต่อเน็ต บรรทัดนี้จะไม่ทำงาน --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- 4. ส่วนเตรียมโหลด Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- 5. ดึงฟอนต์ "Sarabun" (สารบรรณ) มาใช้ --}}
    {{-- เป็นฟอนต์มาตรฐานราชการไทย อ่านง่าย สุภาพ --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <style>
        /* 6. กำหนด CSS บังคับให้ทั้งเว็บใช้ฟอนต์ Sarabun */
        body {
            font-family: "Sarabun", sans-serif;
        }
    </style>

    {{-- 7. @stack('styles') --}}
    {{-- เอาไว้เผื่อหน้าลูกๆ อยากฝากไฟล์ CSS พิเศษเพิ่มเติมมาใส่ตรงนี้ --}}
    @stack('styles')
</head>

<body>

    {{-- container = จัดเนื้อหาให้อยู่ตรงกลาง ไม่ชิดขอบจอเกินไป --}}
    {{-- mt-4 = Margin Top 4 (เว้นระยะห่างด้านบนนิดหน่อย) --}}
    <div class="container mt-4">

        {{-- 8. พื้นที่สำหรับใส่หัวข้อ (Header) --}}
        <h1>@yield('header')</h1>

        {{-- 9. พื้นที่สำหรับใส่เนื้อหาหลัก (Content) --}}
        {{-- ตรงนี้คือหัวใจสำคัญ เนื้อหาของแต่ละหน้าจะถูกนำมาแปะทับตรงนี้ --}}
        @yield('content')
    </div>

    {{-- 10. @stack('scripts') --}}
    {{-- เอาไว้เผื่อหน้าลูกๆ อยากฝากไฟล์ JavaScript พิเศษมาใส่ก่อนปิด Body --}}
    @stack('scripts')
</body>

</html>
