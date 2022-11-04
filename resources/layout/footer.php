<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
    $(".delete").click(function() {
        event.preventDefault();
        var link = $(this).attr('href');
        swal({
                title: "Estas seguro que deseas eliminar este registro?",
                text: "No lo podras recuperar!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("El registro fue eliminado!", {
                        icon: "success",
                    });
                    setTimeout(() => {
                        window.location = link;
                    }, 2000);
                } else {
                    swal("Operacion Cancelada");
                }
            });
    });
    $(".editar").click(function() {
        var d = $(this).attr('id').split('::');
        $("#e_nombre").val(d[1]);
        $("#e_id").val(d[0]);
    });

    $(".editar_e").click(function() {
        var d = $(this).attr('id').split('::');
        $("#e_nombre").val(d[1]);
        $("#e_id").val(d[0]);
        $("#ePatologia option[value='" + d[2] + "']").attr("selected", true);
    });

    $(".editar_cita").click(function() {
        var d = $(this).attr('id').split('::');
        console.log(d);
        $("#e_id").val(d[0]);
        $("#efecha").val(d[3]);
        $("#ehora").val(d[4]);
        $("#epacientes option[value='" + d[1] + "']").attr("selected", true);
        $("#edoctores option[value='" + d[2] + "']").attr("selected", true);
        console.log($("#edoctores").val());
    });

    $("#hora").blur(function(){
        var hora = $(this).val().split(':');
        if((hora[0]>17) || (hora[0]<8)){
            swal("El horario de atencion es de 8am a 5pm!", {
                icon: "warning",
            }); 
            $(this).val("");
        }
    });

    const picker = document.getElementById('fecha');
    picker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0].includes(day)) {
            e.preventDefault();
            this.value = '';
            swal("No puede agendar citas los fines de semana!", {
                icon: "warning",
            });
        }
    });

    $("#ehora").blur(function(){
        var hora = $(this).val().split(':');
        if((hora[0]>17) || (hora[0]<8)){
            swal("El horario de atencion es de 8am a 5pm!", {
                icon: "warning",
            }); 
            $(this).val("");
        }
    });

    const epicker = document.getElementById('efecha');
    epicker.addEventListener('input', function(e) {
        var day = new Date(this.value).getUTCDay();
        if ([6, 0].includes(day)) {
            e.preventDefault();
            this.value = '';
            swal("No puede agendar citas los fines de semana!", {
                icon: "warning",
            });
        }
    });


</script>
</body>

</html>