<aside class="md:w-2/5 bg-gray-800 rounded border border-gray-500 p-5 m-3">
    <h2 class="text-center font-bold text-2xl text-white uppercase my-5">
        Contactar el reclutador
    </h2>
    <form action="{{route('candidato.store')}}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-white font-bold mb-4">
                Nombre:
            </label>
            <input type="text" name="nombre" id="nombre"
            class="p-3 rounded form-input bg-gray-100 w-full"
            placeholder="Tu nombre"
            value="{{old('nombre')}}"
            @error('nombre')
                class="border border-red-500"
            @enderror>
            @error('nombre')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5"
                role="alert">
                <p>{{$message}}</p>
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-white font-bold mb-4">
                Email:
            </label>
            <input type="email" name="email" id="email"
            class="p-3 rounded form-input bg-gray-100 w-full"
            placeholder="Tu email"
            value="{{old('email')}}"
            @error('email')
                class="border border-red-500"
            @enderror>
            @error('email')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5"
                role="alert">
                <p>{{$message}}</p>
                </div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="cv" class="block text-white font-bold mb-4">
                Curriculum Vitae (PDF):
            </label>
            <input type="file" name="cv" id="cv"
            class="p-3 rounded form-input bg-gray-100 w-full"
            placeholder="Tu curriculum"
            accept="application/pdf"
            @error('cv')
                class="border border-red-500"
            @enderror>
            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5"
                role="alert">
                <p>{{$message}}</p>
                </div>
            @enderror
        </div>
        <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
        <input type="submit" value="Contactar"
        class="w-full bg-gray-400 hover:bg-gray-600 rounded uppercase text-gray-100
        p-3 focus:outline-none focus:shadow-outline mt-3">
    </form>
</aside>
