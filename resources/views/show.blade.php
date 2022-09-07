@extends('layouts.app')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Placa</th>
            <th scope="col">Año</th>
            <th scope="col">Color</th>
            <th scope="col">Estatus</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody id="tblCars">
        <tr>
            <th colspan="7" class="text-center">Sin Registros</th>
        </tr>
    </tbody>
</table>
@endsection
{{-- @push('scripts')
<script>
    $(function() {
        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
          dataType:'json',
          url: '{{url('/')}}/api/cars',
          success: function(response){
              if( response !== null ){
                console.log(response.data[0].plate);
                $("#tblCars").empty();
                $.each(response.data, function(idx, opt) {
            $('#tblCars').append('<tr class="text-capitalize"><td>' + opt.id + '</td><td class="text-uppercase">' + opt.plate + '</td><td>' + opt.year + '</td><td>' + opt.color + '</td><td>' + (opt.status==1?'Activo':'Inactivo') +'</td><td>' + opt.created_at +'</td><td></td></tr>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
});
</script>
@endpush --}}
