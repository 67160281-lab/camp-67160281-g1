<h1>Pokedex List</h1>
<table class="table">
    <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>type</td>
            <td>species</td>
            <td>height</td>
            <td>weight</td>
            <td>hp</td>
            <td>attack</td>
            <td>defense</td>
            <td>image_url</td>
            <td></td>
        </tr>
    </thead>
    <?php foreach($pokedexs as $item) { ?>
    <tr>
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
                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" width="100"
                    onerror="this.onerror=null;this.src='https://via.placeholder.com/100';">
            @else
                ไม่มีรูป
            @endif
        </td>

        <td>
            <a class="btn btn-warning" href="{{ url('/pokedexs/' . $item->id . '/edit') }}">
                Edit
            </a>
            <form style="display:inline-block;" action="{{ url('/pokedexs/' . $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
    </tr>
    <?php } ?>
</table>
