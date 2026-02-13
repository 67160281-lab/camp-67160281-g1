<style>
    /* CSS สำหรับทำให้แถวในตารางดูเหมือนคลิกได้ */
    .clickable-row {
        cursor: pointer; /* เปลี่ยนเมาส์เป็นรูปมือ */
        transition: background-color 0.2s; /* เอฟเฟกต์เปลี่ยนสีนุ่มๆ */
    }
    /* เมื่อเอาเมาส์ชี้ ให้เปลี่ยนสีพื้นหลัง */
    .clickable-row:hover {
        background-color: rgba(0,0,0,0.05) !important;
    }
    /* ป้องกันไม่ให้ปุ่ม Edit/Delete ทำงานซ้อนกับคลิกที่แถว */
    .action-buttons {
        position: relative;
        z-index: 10;
    }
</style>

<h1>Pokedex List</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>type</th>
            <th>species</th>
            <th>height</th>
            <th>weight</th>
            <th>hp</th>
            <th>attack</th>
            <th>defense</th>
            <th>image_url</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        {{-- วนลูปข้อมูล Pokedex ทีละตัว --}}
        @foreach($pokedexs as $item)

        {{--
            เทคนิค Clickable Row:
            ใส่ onclick="..." ที่ tr เพื่อให้คลิกที่ไหนก็ได้ในแถว แล้วจะลิงก์ไปหน้า Show Detail
        --}}
        <tr class="clickable-row" onclick="window.location='{{ url('/pokedexs/' . $item->id) }}';">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->type }}</td>
            <td>{{ $item->species }}</td>
            <td>{{ $item->height }}</td>
            <td>{{ $item->weight }}</td>
            <td>{{ $item->hp }}</td>
            <td>{{ $item->attack }}</td>
            <td>{{ $item->defense }}</td>

            {{-- ส่วนแสดงรูปภาพ --}}
            <td>
                @if ($item->image_url)
                    {{--
                        onerror="..." คือเทคนิคป้องกันรูปเสีย
                        ถ้าโหลดรูปจาก URL ไม่ได้ มันจะเปลี่ยนไปใช้รูป placeholder สีเทาๆ แทนทันที
                    --}}
                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" width="50"
                        onerror="this.onerror=null;this.src='https://via.placeholder.com/50';">
                @else
                    <small>ไม่มีรูป</small>
                @endif
            </td>

            {{--
                ส่วนปุ่มเครื่องมือ (Actions):
                สำคัญมาก!! ต้องใส่ onclick="event.stopPropagation();"
                เพื่อ "หยุด" ไม่ให้การคลิกที่ปุ่มนี้ ทะลุไปกระตุ้น onclick ของ <tr>
                (ถ้าไม่ใส่ เวลากดลบ มันจะเด้งไปหน้า Detail แทนที่จะลบ)
            --}}
            <td class="action-buttons" onclick="event.stopPropagation();">

                {{-- ปุ่มแก้ไข --}}
                <a class="btn btn-warning btn-sm" href="{{ url('/pokedexs/' . $item->id . '/edit') }}">
                    Edit
                </a>

                {{-- ปุ่มลบ (ต้องใช้ Form เพื่อส่ง Method DELETE) --}}
                <form style="display:inline-block;" action="{{ url('/pokedexs/' . $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    {{-- ปุ่มกดลบ พร้อม Popup ยืนยัน --}}
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('ยืนยันการลบ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
