@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
    @endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-center text-2xl mt-10">Editar vacante</h1>

    <form class="max-w-lg mx-auto my-10"
    action="{{route('vacantes.update', ['vacante' => $vacante->id])}}" method="post" >
        @csrf
        @method('put')
        <div class="mb-5">
            <label class="block text-gray-700 text mb-2">Titulo vacante: {{$vacante->titulo}}</label>
            <input id="titulo" type="text" name="titulo" placeholder="Titulo de la vacante"
            class="p-3 bg-gray-100 rounded form-input w-full"
            value="{{$vacante->titulo}}">
            @error('titulo')
                <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
                rounded relative mt-3 mb-4" role="alert">
                <strong class="font-bold">Error</strong>
                <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text mb-2">Categoria:</label>
            <select name="categoria" id="categoria"
            class="block appearance-none w-full mb-2 p-3 border border-gray-200 text-gray-700
            focus:outline-none leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
            <option disabled selected>-- selecciona --</option>
                @foreach($categorias as $categoria)
                <option {{$vacante->categoria_id == $categoria->id ? 'selected' : ''}}
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
            <label class="block text-gray-700 text mb-2">Experiencia:</label>
            <select name="experiencia" id="experiencia"
            class="block appearance-none w-full mb-2 p-3 border border-gray-200 text-gray-700
            focus:outline-none leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
            <option disabled selected>-- selecciona --</option>
                @foreach($experiencias as $experiencia)
                <option {{$vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}
                    value="{{$experiencia->id}}">
                    {{$experiencia->nombre}}
                </option>
                @endforeach
            </select>
            @error('experiencia')
                <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
                rounded relative mt-3 mb-4" role="alert">
                <strong class="font-bold">Error</strong>
                <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text mb-2">Salario:</label>
            <select name="salario" id="salario"
            class="block appearance-none w-full mb-2 p-3 border border-gray-200 text-gray-700
            focus:outline-none leading-tight focus:bg-white focus:border-gray-500 bg-gray-100">
            <option disabled selected>-- selecciona --</option>
                @foreach($salarios as $salario)
                <option {{$vacante->salario_id == $salario->id ? 'selected' : ''}}
                    value="{{$salario->id}}" >
                    {{$salario->nombre}}
                </option>
                @endforeach
            </select>
            @error('salario')
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
                <option {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}}
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

        <div class="mb-5">
            <label for="descripcion"
                class="block text-gray-700 text mb-2">Descripcíon del puesto:</label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full
            text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion"
                    value="{{$vacante->descripcion}}">
            @error('descripcion')
                <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
                rounded relative mt-3 mb-4" role="alert">
                    <strong class="font-bold">Error</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="imagen" class="block text-gray-700 text mb-2">Imagen del puesto:</label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{$vacante->imagen}}">
            <div id="error"></div>
            @error('imagen')
                <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
                rounded relative mt-3 mb-4" role="alert">
                <strong class="font-bold">Error</strong>
                <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text mb-5">
                habilidades & Conocimientos:
                <span class="text-xs"> (Elige al menos 3)</span>
            </label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript',
                'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks',
                'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony',
                'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS',
                'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#',
                'Ruby on Rails']
            @endphp
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode( $vacante->skills)}}">
            </lista-skills>
            @error('skills')
                <div class="border-red-400 bg-red-100 text-red-700 px-4 py-3
                rounded relative mt-3 mb-4" role="alert">
                <strong class="font-bold">Error</strong>
                <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>
        <button
            type="submit"
            class="bg-green-400 w-full hover:bg-green-600 text-gray-100
            p-3 focus:outline-none focus:shadow-outline uppercase">Editar Vacante
        </button>
    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            //Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons : ['bold', 'italic', 'underline', 'quote', 'anchor',
                    'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',
                    'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder : {
                    text : 'informacion de la vacante'
                }
            });
            //agrega al input hidden lo que el usuario escribe
            editor.subscribe('editableInput', function(eventObj, editable){
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });
            //agrega al editor lo que el usuario escribio en el input hidden
            editor.setContent(document.querySelector('#descripcion').value);

            //Dropzone
            const dropzone = new Dropzone('#dropzoneDevJobs', {
                url: '/vacantes/imagen',
                dictDefaultMessage: 'Sube aquí tu archivo',
                acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
                },
                init:function(){
                    if(document.querySelector('#imagen').value.trim()){
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;
                        imagenPublicada.nombreServidor = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, `/storage/vacantes/${imagenPublicada.name}`);
                        imagenPublicada.previewElement.classList.add('dz-success');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response){
                    console.log(response.correcto);
                    document.querySelector('#error').textContent = ''
                    //coloca la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value=response.correcto;

                    //añadir al objecto el nombre del servidor
                    file.nombreServidor = response.correcto;
                },
                error : function(file, response){
                    document.querySelector('#error').textContent = 'El formato del archivo no coresponde'
                },
                maxfilesexceeded : function(file){
                    console.log('muchos archivos')
                    if(this.files[1] != null){
                        this.removeFile(this.files[0]); //elimina el archivo anterior
                        this.addFile(file); // agrega el nuevo archivo
                    }
                },
                removedfile: function(file, response){
                    console.log('test remove', file);
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    params = {
                        imagen: file.nombreServidor
                    }
                    axios.post('/vacantes/borrarimagen', params)
                    .then(respuesta => console.log(respuesta))
                }
            })

        })
    </script>
@endsection
