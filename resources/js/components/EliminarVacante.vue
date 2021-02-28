<template>
    <div>
        <button class="text-red-600 hover:text-red-900  mr-5 flex-1"
            @click="eliminarVacante">
            Eliminar
        </button>
    </div>
</template>

<script>
export default {
    props:['vacanteId'],
    methods: {
        eliminarVacante(){
            this.$swal({
                title: 'Desea eliminar esta vacante?',
                text: "Una vez eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                }).then((result) => {
                if (result.isConfirmed) {
                    const params = {
                        id: this.vacanteId,
                        _method: 'delete'
                    }

                    //enviar la petición al servidor
                    axios.post(`/vacantes/${this.vacanteId}`, params)
                        .then(respuesta => {
                            console.log(respuesta);
                            this.$swal.fire(
                                'Vacante eliminada',
                                respuesta.data.mensaje,
                                'success'
                            );

                            //eliminando la vacante del DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            })
        }
    },
}
</script>
