@extends('layouts.app')

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notificaciones</h1>

    @if(count($notificaciones) > 0)
        <p class="text-center mt-10">Ultimas notificaciones</p>
        <ul class="text-center border border-gray-700 bg-gray-100 mt-5 max-w-md mx-auto">
            @foreach ($notificaciones as $notificacion)
                @php
                    $data = $notificacion->data
                @endphp
            <li class="py-2">
                <p class="mb-4">
                    Tenes candidato para la vacante:
                    <span class="font-bold">{{$data['vacante']}}</span>
                </p>
                <p class="mb-4">
                    Te escribio:
                    <span class="text-sm">({{$notificacion->created_at->diffForHumans()}})</span>
                </p>
                <p class="mb-4">
                    <a href="{{route('candidato.index', ['id' => $data['id_vacante']]) }}"
                        class="bg-green-500 rounded p-1 text-sm font-bold uppercase text-white">
                        Ver candidatos:
                    </a>
                </p>
            </li>
            @endforeach
        </ul>
    @endif
    @if(count($oldNotifs) > 0)
        <p class="text-center mt-10">Notificaciones leidas</p>
        <ul class="text-center border border-gray-700 bg-gray-100 mt-5 max-w-md mx-auto mb-10">
            @foreach ($oldNotifs as $oldNotif)
                @php
                    $data2 = $oldNotif->data
                @endphp
            <li class="py-2">
                <p class="mb-4">
                    Tenes un candidato para la vacante:
                    <span class="font-bold">{{$data2['vacante']}}</span>
                </p>
                <p class="mb-4">
                    <a href="{{route('candidato.index', ['id' => $data2['id_vacante']]) }}"
                        class="bg-green-500 rounded p-1 text-sm font-bold uppercase text-white">
                        Ver candidatos:
                    </a>
                </p>
            </li>
            @endforeach
        </ul>
    @else
    <h2 class="text-center mt-5">No tenes Notificaciones</h2>
    @endif

@endsection
