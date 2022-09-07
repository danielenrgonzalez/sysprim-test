@extends('layouts.app')
@section('content')
<div class="my-2" style="float: right;">
      <a href="{{ route('model.create') }}" class="btn btn-primary"></span>Nuevo</a>
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
    <tbody id="tblModels">
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
          url: '{{url('/')}}/api/models',
          success: function(response){
              if( response !== null ){
                $("#tblModels").empty();
                $.each(response.data, function(idx, opt) {
            $('#tblModels').append('<tr class="text-capitalize"><td>' + opt.id + '</td><td class="text-uppercase">' + opt.name + '</td><td>' + opt.created_at +'</td><td><a class="btn btn-primary btn-small" href="{{ url('/')}}/detalle_modelo/'+opt.id+'">Detalle</a></td></tr>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
});
</script>
@endpush
