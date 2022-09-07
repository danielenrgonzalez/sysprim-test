@extends('layouts.app')
@section('content')
<div class="my-2" style="float: right;">
      <a href="{{ route('home.create') }}" class="btn btn-primary"></span>Nuevo</a>
  </div>
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
@push('scripts')
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
                $("#tblCars").empty();
                $.each(response.data, function(idx, opt) {
            $('#tblCars').append('<tr class="text-capitalize"><td>' + opt.id + '</td><td class="text-uppercase">' + opt.plate + '</td><td>' + opt.year + '</td><td>' + opt.color + '</td><td>' + (opt.status==1?'Activo':'Inactivo') +'</td><td>' + opt.created_at +'</td><td><a class="btn btn-primary btn-small" href="{{ url('/')}}/detalle_vehiculo/'+opt.id+'">Detalle</a><button class="btn btn-danger btn-small mx-1" onclick="deleteCar('+opt.id+')">Eliminar</button></td></tr>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
});

function deleteCar(car_id) {
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'DELETE',
          dataType:'json',
          url: '{{url('/')}}/api/cars/'+car_id,
          success: function(response){
              if( response !== null ){
                location.href = "{{ route('home.index') }}";
                alert('Vehículo eliminado correctamente');
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
}
</script>
@endpush
