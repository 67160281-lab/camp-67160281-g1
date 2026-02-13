<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    // --- ส่วนนี้สำคัญมากครับ ---

    // protected $table เอาไว้ระบุว่า Model นี้คู่กับตารางชื่ออะไรใน Database
    // ปกติ Laravel ฉลาดมาก มันจะเดาชื่อตารางให้อัตโนมัติโดยการทำเป็นพหูพจน์ภาษาอังกฤษ
    // เช่น Model ชื่อ "Pokedex" -> Laravel จะไปหาตารางชื่อ "pokedexes" (เติม es)

    // แต่ถ้าในฐานข้อมูลจริง เราตั้งชื่อตารางว่า "pokedexs" (เติม s เฉยๆ)
    // เราจึงต้องเขียนบรรทัดนี้ เพื่อบังคับให้ Laravel ไปคุยกับตาราง "pokedexs" ครับ
    protected $table = 'pokedexs';

    // ถ้าเราลบบรรทัดนี้ออก Laravel อาจจะฟ้อง Error ว่า:
    // "Base table or view not found: 1146 Table 'your_db.pokedexes' doesn't exist"
}
