@extends('layouts.app')
@section('content')
<form id="formCars" class="mt-3">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" disabled>
        </div>
        <div class="mb-3 col-md-6">
            <label for="created_at" class="form-label">Fecha de registro</label>
            <input type="text" class="form-control" id="created_at" name="created_at" disabled>
        </div>
    </div>
    <a href="{{ route('brand.index') }}" class="btn btn-secondary" style="float: right">Volver</a>
</form>
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
          url: '{{url('/')}}/api/brands/{{ $brand_id }}',
          success: function(response){
              if( response !== null ){
                $('#name').val(response.data.name);
                $('#created_at').val(response.data.created_at);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }})
    });
</script>
@endpush
