@extends('layouts.app')
@section('content')
<form id="formCars" class="mt-3">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" disabled>
        </div>
        <div class="mb-3 col-md-6">
            <label for="year" class="form-label">Año</label>
            <input type="text" class="form-control" id="year" name="year" disabled>
        </div>
    </div>
    <div class="row mt-2">
        <div class="mb-3 col-md-6">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" disabled>
        </div>
        <div class="mb-3 col-md-6">
            <label for="brand_id" class="form-label">Marca</label>
            <input type="text" class="form-control" id="brand_id" name="brand_id" disabled>
        </div>
    </div>
    <div id="model" class="row mt-2">
        <div class="mb-3 col-md-6">
            <label for="model_id" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="model_id" name="model_id" disabled>
        </div>
        <div class="mb-3 col-md-6">
            <label for="created_at" class="form-label">Fecha de registro</label>
            <input type="text" class="form-control" id="created_at" name="created_at" disabled>
        </div>
    </div>
    <a href="{{ route('home.index') }}" class="btn btn-secondary" style="float: right">Volver</a>
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
          url: '{{url('/')}}/api/cars/{{ $car_id }}',
          success: function(response){
              if( response !== null ){
                $('#plate').val(response.data.plate);
                $('#year').val(response.data.year);
                $('#color').val(response.data.color);
                $('#created_at').val(response.data.created_at);

                getModels(response.data.model_of_brand_id);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }})
    });

    function getModels(model_id) {
        console.log('cmodel'+model_id);
        $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                  dataType:'json',
                  url: '{{url('/')}}/api/models/'+model_id,
                  success: function(response){
                      if( response !== null ){
                        brand_id=response.data.brand_id;
                        $('#model_id').val(response.data.name);
                getBrands(response.data.brand_id);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }})
    }

    function getBrands(brand_id) {
        console.log('brand'+brand_id);
        $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                  dataType:'json',
          url: '{{url('/')}}/api/brands/'+brand_id,
          success: function(response){
              if( response !== null ){
                $('#brand_id').val(response.data.name);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
});
    }
</script>
@endpush
