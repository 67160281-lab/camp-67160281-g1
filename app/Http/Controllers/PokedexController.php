<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// เรียกใช้ Model Pokedex เพื่อติดต่อกับตาราง pokedexes ในฐานข้อมูล
use App\Models\Pokedex;

class PokedexController extends Controller
{

    /**
     * 1. หน้าแสดงรายชื่อทั้งหมด (List Page)
     */
    public function index()
    {
        // ดึงข้อมูล Pokedex ทั้งหมดจากฐานข้อมูล
        $data['pokedexs'] = Pokedex::all();
        // ส่งข้อมูลไปแสดงผลที่หน้า view: pokedexs/index.blade.php
        return view('pokedexs.index', $data);
    }

    /**
     * 2. หน้าแสดงฟอร์มสร้างข้อมูลใหม่ (Create Form)
     */
    public function create()
    {
        // ปกติฟังก์ชันนี้จะ return view('pokedexs.create');
        // ตอนนี้ยังว่างอยู่
    }

    /**
     * 3. ฟังก์ชันบันทึกข้อมูลใหม่ (Store/Save)
     */
    public function store(Request $request)
    {
        // เรียกใช้ฟังก์ชัน check() ด้านล่าง เพื่อตรวจสอบความถูกต้องของข้อมูลก่อน
        $this->check($request);

        // สร้าง Object Pokedex ใหม่ เตรียมลง Database
        $pokedex = new Pokedex;

        // รับค่าจากฟอร์มมาใส่ในแต่ละคอลัมน์
        $pokedex->name = $request->input('name');
        $pokedex->type = $request->input('type');
        $pokedex->species = $request->input('species');
        $pokedex->height = $request->input('height');
        $pokedex->weight = $request->input('weight');
        $pokedex->hp = $request->input('hp');
        $pokedex->attack = $request->input('attack');
        $pokedex->defense = $request->input('defense');
        $pokedex->image_url = $request->input('image_url'); // รับลิงก์รูปภาพ

        // สั่งบันทึกลงฐานข้อมูล
        $pokedex->save();

        // กลับไปหน้า index พร้อมข้อความแจ้งเตือน
        return redirect('/pokedexs')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * 4. หน้าแสดงรายละเอียดเจาะจงรายตัว (Show Detail)
     */
    public function show(string $id)
    {
        // ค้นหาข้อมูลตาม ID ที่ส่งมา
        $data['pokedex'] = Pokedex::find($id);
        // ส่งไปแสดงที่หน้า view: pokedexs/show_index.blade.php
        return view('pokedexs.show_index', $data);
    }

    /**
     * 5. หน้าแสดงฟอร์มแก้ไขข้อมูล (Edit Form)
     */
    public function edit(string $id)
    {
        // ค้นหาตัวที่จะแก้ไข ส่งไปในชื่อ 'pokedex_update'
        $data['pokedex_update'] = Pokedex::find($id);
        // ส่งรายชื่อทั้งหมดไปด้วย (เผื่อใช้แสดง list ด้านข้าง)
        $data['pokedexs'] = Pokedex::all();
        // ส่งไปที่หน้า view: pokedexs/update.blade.php
        return view('pokedexs.update', $data);
    }

    /**
     * 6. ฟังก์ชันอัปเดตข้อมูล (Update)
     */
    public function update(Request $request, string $id)
    {
        // เรียกตรวจสอบข้อมูล (ใช้กฎเดียวกับตอน store)
        // ข้อควรระวัง: ถ้า update ไม่ต้องการบังคับรูปภาพ ต้องแก้ฟังก์ชัน check แยกนะครับ
        $this->check($request);

        // ค้นหาตัวที่จะแก้ (ใช้ findOrFail เพื่อกัน error ถ้าหา ID ไม่เจอ)
        $pokedex = Pokedex::findOrFail($id);

        // อัปเดตข้อมูลลงไปใหม่ (ทับของเดิม)
        $pokedex->name = $request->input('name');
        $pokedex->type = $request->input('type');
        $pokedex->species = $request->input('species');
        $pokedex->height = $request->input('height');
        $pokedex->weight = $request->input('weight');
        $pokedex->hp = $request->input('hp');
        $pokedex->attack = $request->input('attack');
        $pokedex->defense = $request->input('defense');

        // เช็คว่าในฟอร์มมีการส่งค่า image_url มาไหม (has check)
        // ถ้ามีส่งมาใหม่ ก็ให้อัปเดต ถ้าไม่ส่งมา ก็ใช้รูปเดิม
        if ($request->has('image_url')) {
            $pokedex->image_url = $request->input('image_url');
        }

        // บันทึกการเปลี่ยนแปลง
        $pokedex->save();

        return redirect('/pokedexs')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * 7. ฟังก์ชันลบข้อมูล (Delete)
     */
    public function destroy(string $id)
    {
        // ค้นหาตาม ID
        $pokedex = Pokedex::find($id);
        // สั่งลบ
        $pokedex->delete();
        // กลับไปหน้า index
        return redirect('/pokedexs');
    }

    /**
     * ฟังก์ชันเสริม: สำหรับตรวจสอบข้อมูล (Validation)
     * เขียนแยกไว้ตรงนี้ เพื่อให้ store() และ update() เรียกใช้ได้เลย (ไม่ต้องเขียนซ้ำ)
     */
    public function check(Request $request)
    {
        $request->validate([
            'name' => 'required',             // ห้ามว่าง
            'type' => 'required',             // ห้ามว่าง
            'species' => 'required',          // ห้ามว่าง
            'height' => 'required|numeric',   // ห้ามว่าง + ต้องเป็นตัวเลข (ทศนิยมได้)
            'weight' => 'required|numeric',   // ห้ามว่าง + ต้องเป็นตัวเลข
            'hp' => 'required|integer',       // ห้ามว่าง + ต้องเป็นจำนวนเต็ม
            'attack' => 'required|integer',   // ห้ามว่าง + ต้องเป็นจำนวนเต็ม
            'defense' => 'required|integer',  // ห้ามว่าง + ต้องเป็นจำนวนเต็ม
            'image_url' => 'required|url',    // ห้ามว่าง + ต้องเป็นรูปแบบลิงก์ (http://...)
        ]);
    }
}
