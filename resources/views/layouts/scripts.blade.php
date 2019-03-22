<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- script para la app-->
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
<!-- plugin para los mensajes-->
<!--<script type="text/javascript" src="{{ asset('sweetalert/sweetalert2.all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<!-- plugin para las graficas-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<!-- FIN del plugin para las graficas-->

<!-- script para iniciar el plugin de la tabla -->
<script type="text/javascript" src="{{ asset('DataTables/js/jquery.datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/js/datatables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>