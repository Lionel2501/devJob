
<a class="text-white text-sm uppercase font-bold p-3
{{Request::is('vacante') ? 'bg-green-400 hover:bg-green-600' : ''}}"
href="{{ route('vacantes.index') }}">Ver Vacantes</a>

<a class="text-white text-sm uppercase font-bold p-3 focus:outline-none 
focus:shadow-outline {{Request::is('vacante/create') ? 'bg-green-400 hover:bg-green-600' : ''}}"
href=" {{route('vacantes.create')}} ">Crear Vacantes</a>