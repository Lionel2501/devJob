<h2 class="my-10 text-2xl text-gray-700">
    Buscar una vacante
</h2>

<form action="{{route('vacantes.buscar')}}"
    method="POST">
    @method('POST')
    @csrf
    <div class="mb-5">
        <label class="block text-gray-700 text mb-2">Categoria:</label>
        <select name="categoria" id="categoria"
        class="block appearance-none w-full mb-2 p-3 border border-gray-200 text-gray-700
        focus:outline-none leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
        <option disabled selected>-- selecciona --</option>
            @foreach($categorias as $categoria)
            <option {{old('categoria') == $categoria->id ? 'selected' : ''}}
                value="{{$categoria->id}}">
                {{$categoria->nombre}}
            </option>
            @endforeach
        </select>
        @error('categoria')
            <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
            rounded relative mt-3 mb-4" role="alert">
            <strong class="font-bold">Error</strong>
            <span class="block">{{$message}}</span>
            </div>
        @enderror
    </div>
    <div class="mb-5">
        <label class="block text-gray-700 text mb-2">Ubicacion:</label>
        <select name="ubicacion" id="ubicacion"
        class="block appearance-none w-full mb-2 p-3 border border-gray-200 text-gray-700
        focus:outline-none leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
        <option disabled selected>-- selecciona --</option>
            @foreach($ubicaciones as $ubicacion)
            <option {{old('ubicacion') == $ubicacion->id ? 'selected' : ''}}
                value="{{$ubicacion->id}}" >
                {{$ubicacion->nombre}}
            </option>
            @endforeach
        </select>
        @error('ubicacion')
            <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
            rounded relative mt-3 mb-4" role="alert">
            <strong class="font-bold">Error</strong>
            <span class="block">{{$message}}</span>
            </div>
        @enderror
    </div>
    <button type="submit"
    class="w-full text-gray-100 font-bold p-3 bg-green-500 hover:bg-green-700
    focus:outline-none focus:shadow-outline mt-5 uppercase">
        Buscar Vacantes
    </button>
</form>
