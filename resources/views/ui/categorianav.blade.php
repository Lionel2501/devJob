@foreach($categorias as $categoria)
    <a href="{{route('categorias.show', ['categoria' => $categoria->id])}}"
        class="text-sm font-bold text-white p-3 hover:bg-gray-400">
        {{$categoria->nombre}}
    </a>
@endforeach
