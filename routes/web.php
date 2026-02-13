<?php

use Illuminate\Support\Facades\Route;

// 1. แบบ Closure (เขียนฟังก์ชันใส่ใน Route เลย)
// เหมาะสำหรับหน้า Static นิ่งๆ ที่ไม่มีการคำนวณอะไรซับซ้อน
Route::get('/se', function(){
    // เมื่อเข้า URL /se ให้เปิดไฟล์ view ที่ชื่อ template/default.blade.php
    return view('template.default');
});


// 2. แบบ Manual (กำหนดเองทีละเส้นทาง)
// เหมาะสำหรับฟังก์ชันเฉพาะทาง ที่ไม่ได้เป็นไปตามมาตรฐาน CRUD
Route::get('/', [App\Http\Controllers\MyController::class, 'index']); // หน้าแรก (แสดงผล)
Route::post('/', [App\Http\Controllers\MyController::class, 'store']); // หน้าแรก (รับข้อมูล POST)

Route::get('/calculate', [App\Http\Controllers\MyController::class, 'info']); // หน้าคำนวณ (แสดงฟอร์ม)
Route::post('/calculate', [App\Http\Controllers\MyController::class, 'calculate']); // หน้าคำนวณ (ประมวลผล)


// 3. แบบ Resource (สำเร็จรูป)
// บรรทัดเดียว สร้างให้ครบ 7 เส้นทาง (index, create, store, show, edit, update, destroy)
// เหมาะสำหรับระบบจัดการข้อมูลทั่วไป (CRUD)

// สร้างเส้นทางสำหรับจัดการเที่ยวบิน (Flights)
Route::resource('/flights', App\Http\Controllers\FlightController::class);

// สร้างเส้นทางสำหรับจัดการโปเกมอน (Pokedexs)
// อันนี้จะเชื่อมโยงกับ PokedexController ที่เราเขียนกันไปก่อนหน้านี้ครับ
Route::resource('/pokedexs', App\Http\Controllers\PokedexController::class);
