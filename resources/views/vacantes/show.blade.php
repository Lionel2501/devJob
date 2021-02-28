@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('content')
    <h1 class="text-center mt-10 text-3xl">{{$vacante->titulo}}</h1>
    <div class="mt-10 mb-20 md:flex items-start">
        <div class="md:w-3/5">
            <p class="font-bold block my-2 text-gray-700">Fecha: 
                <span class="font-normal">{{$vacante->created_at->diffForHumans()}}</span>
            </p>
            <p class="font-bold block my-2 text-gray-700">Por: 
                <span class="font-normal">{{$vacante->reclutador->name}}</span>
            </p>
            <p class="font-bold block my-2 text-gray-700">Categoria: 
                <span class="font-normal">{{$vacante->categoria->nombre}}</span>
            </p> 
            <p class="font-bold block my-2 text-gray-700">Salario: 
                <span class="font-normal">{{$vacante->salario->nombre}}</span>
            </p>
            <p class="font-bold block my-2 text-gray-700">Experiencia: 
                <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
            </p>  
            <p class="font-bold block my-2 text-gray-700">Ubicacíon: 
                <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
            </p> 

            <h2 class="text-2xl text-center mt-10 text-gray-700">Experiencia y Technologias</h2>

            <a href="/storage/vacantes/{{$vacante->imagen}}" data-lightbox="imagen"
                data-title="Vacante {{$vacante->titulo}}">
                <img src="/storage/vacantes/{{$vacante->imagen}}" alt="imagen-vacante" 
                class="w-20 mt-10">
            </a>

            <p class="mt-5 font-bold block my-2 text-gray-700">Descripcion: </p>
            <div class="mt-3 mb-3 text-gray-700 text-justify space-y-4">
                {!! $vacante->descripcion !!}
            </div>

            @php
                $arraySkills = explode(',', $vacante->skills)
            @endphp

            <p class="font-bold inline-block my-2 text-gray-700">Habilidades: </p>
            @foreach($arraySkills as $skill)
            <p class="inline-block my-2 font-bold text-gray-700 border border-gray-400 
            py-2 px-8 bg-gray-100 mt-5 rounded">
                {{$skill}}
            </p> 
            @endforeach
        </div>
        @include('ui.contact')
    </div>

@endsection