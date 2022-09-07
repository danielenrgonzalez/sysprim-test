@extends('layouts.app')
@section('content')
<div class="my-2" style="float: right;">
      <a href="{{ route('brand.create') }}" class="btn btn-primary"></span>Nuevo</a>
  </div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody id="tblBrands">
        <tr>
            <th colspan="4" class="text-center">Sin Registros</th>
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
          url: '{{url('/')}}/api/brands',
          success: function(response){
              if( response !== null ){
                $("#tblBrands").empty();
                $.each(response.data, function(idx, opt) {
            $('#tblBrands').append('<tr class="text-capitalize"><td>' + opt.id + '</td><td class="text-uppercase">' + opt.name + '</td><td>' + opt.created_at +'</td><td><a class="btn btn-primary btn-small" href="{{ url('/')}}/detalle_marca/'+opt.id+'">Detalle</a></td></tr>');
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
