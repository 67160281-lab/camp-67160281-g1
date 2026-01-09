<style>
    .clickable-row {
        cursor: pointer;
        transition: background-color 0.2s;
    }
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
        @foreach($pokedexs as $item)
        {{-- เพิ่ม class และ onclick ที่แท็ก tr --}}
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
            <td>
                @if ($item->image_url)
                    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" width="50"
                        onerror="this.onerror=null;this.src='via.placeholder.com';">
                @else
                    <small>ไม่มีรูป</small>
                @endif
            </td>
            <td class="action-buttons" onclick="event.stopPropagation();">
                {{-- ใช้ event.stopPropagation() เพื่อไม่ให้คลิกปุ่มแล้วกลายเป็นการเปิดแถว --}}
                <a class="btn btn-warning btn-sm" href="{{ url('/pokedexs/' . $item->id . '/edit') }}">
                    Edit
                </a>
                <form style="display:inline-block;" action="{{ url('/pokedexs/' . $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('ยืนยันการลบ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
