@extends('layouts.app')

@section('navegacion')
    @include('ui.categorianav')
@endsection

@section('content')
    <div class="bg-gray-100 shadow mt-10 p-10">
        <h1 class="text-gray-700 text-3xl m-0">Categoria
            <span class="font-bold">{{$categoria->nombre}}</span>
        </h1>
        <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($vacantes as $vacante)
                <li class="bg-white shadow p-5 border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-700">
                        {{$vacante->titulo}}
                    </h2>
                    <p class="block my-2 font-normal text-gray-700">
                        <a href="{{route('categorias.show', ['categoria' => $vacante->categoria->id])}}"
                            class="bg-gray-200 rounded p-2 inline-block">
                         {{$vacante->categoria->nombre}}
                        </a>
                    </p>
                    <p class="block my-2 font-normal text-gray-700">
                        Ubicacíon:
                        <span class="font-bold">{{$vacante->ubicacion->nombre}}</span>
                    </p>
                    <p class="block my-2 font-normal text-gray-700">
                        Experiencia:
                        <span class="font-bold">{{$vacante->experiencia->nombre}}</span>
                    </p>
                    <a href="{{route('vacantes.show', ['vacante' => $vacante->id])}}"
                        class="bg-green-300 hover:bg-green-500 rounded px-2 py-3
                        mt-2 inline-block text-gray-700 font-bold text-sm">
                        Ver Vacantes
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
