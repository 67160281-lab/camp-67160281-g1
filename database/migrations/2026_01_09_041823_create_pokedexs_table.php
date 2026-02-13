<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * ฟังก์ชันนี้จะทำงานเมื่อคุณพิมพ์คำสั่ง: php artisan migrate
     * หน้าที่: สร้างตารางใหม่ลงในฐานข้อมูล
     */
    public function up(): void
    {
        // คำสั่งสร้างตารางชื่อ 'pokedexs'
        Schema::create('pokedexs', function (Blueprint $table) {

            // $table->id(); สร้างคอลัมน์ 'id' เป็น Primary Key (รหัสหลัก)
            // และเป็น Auto Increment (เพิ่มเลขเองอัตโนมัติ 1, 2, 3...)
            $table->id();

            // $table->string(...); สร้างคอลัมน์เก็บ "ข้อความ" (VARCHAR)
            $table->string('name');    // ชื่อโปเกมอน
            $table->string('type');    // ธาตุ
            $table->string('species'); // สายพันธุ์

            // $table->double(...); สร้างคอลัมน์เก็บ "ตัวเลขทศนิยม"
            // เหมาะกับ ส่วนสูง, น้ำหนัก และค่าสเตตัส (เผื่อมีการคำนวณที่ละเอียด)
            $table->double('height');
            $table->double('weight');
            $table->double('hp');
            $table->double('attack');
            $table->double('defense');

            // เก็บ URL ของรูปภาพเป็นข้อความ
            $table->string('image_url');

            // $table->timestamps(); คำสั่งพิเศษ!
            // จะสร้างคอลัมน์ให้ 2 อันอัตโนมัติ คือ:
            // 1. created_at (วันที่เวลาที่สร้างข้อมูล)
            // 2. updated_at (วันที่เวลาที่แก้ไขข้อมูลล่าสุด)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * ฟังก์ชันนี้จะทำงานเมื่อคุณพิมพ์คำสั่ง: php artisan migrate:rollback
     * หน้าที่: ยกเลิกการกระทำ (ในที่นี้คือ ลบตารางทิ้ง)
     */
    public function down(): void
    {
        // ลบตาราง 'pokedexs' ทิ้ง ถ้าตารางนี้มีอยู่
        Schema::dropIfExists('pokedexs');
    }
};
