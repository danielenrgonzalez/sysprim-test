@extends('layouts.app')
@section('content')
<form id="formCars" class="mt-3">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="year" class="form-label">Año</label>
            <input class="form-control" id="year" name="year" required type="number" min="1900" max="2099" step="1" value="2022" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="mb-3 col-md-6">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="brand_id" class="form-label">Marca</label>
            <select class="form-select" id="brand_id" name="brand_id" aria-label="Seleccione" required onchange="getOtherModels()">
            </select>
                </div>
    </div>
    <div id="model" class="row mt-2">
        <div class="mb-3 col-md-6">
            <label for="model_id" class="form-label">Modelo</label>
            <select class="form-select" id="model_id" name="model_id" aria-label="Seleccione">
            </select>
                </div>
    </div>
    <button type="submit" class="btn btn-primary mx-2" style="float: right">Actualizar</button><a href="{{ route('home.index') }}" class="btn btn-secondary" style="float: right">Volver</a>
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
                getAllBrands();
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }})
    });

    function getModels(model_id) {
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
                        $('#model_id').append('<option selected value="'+response.data.id+'">'+(response.data.name.toUpperCase())+'</option>');
                getBrands(response.data.brand_id);
                getAllModels(response.data.brand_id);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }})
    }

    function getOtherModels() {
        var brand_id=$('#brand_id').val();
        $('#model_id').empty();
        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
          dataType:'json',
          url: '{{url('/')}}/api/show_by_brand/'+brand_id,
          success: function(response){
              if( response !== null ){
                $.each(response.data, function(idx, opt) {
            $('#model_id').append('<option value="'+opt.id+'">'+(opt.name.toUpperCase())+'</option>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
    }

    function getBrands(brand_id) {
        $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                  dataType:'json',
          url: '{{url('/')}}/api/brands/'+brand_id,
          success: function(response){
              if( response !== null ){
            $('#brand_id').append('<option selected value="'+response.data.id+'">'+(response.data.name.toUpperCase())+'</option>');

        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
});
    }

    function getAllModels(brand_id) {
    if(brand_id==''){
        $('#model').addClass("d-none");
    }else{
        $('#model').removeClass("d-none");
        $('#model').addClass("d-block");

        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
          dataType:'json',
          url: '{{url('/')}}/api/show_by_brand/'+brand_id,
          success: function(response){
              if( response !== null ){
                $.each(response.data, function(idx, opt) {
            $('#model_id').append('<option value="'+opt.id+'">'+(opt.name.toUpperCase())+'</option>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
})
    }
}

    function getAllBrands() {
        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'GET',
          dataType:'json',
          url: '{{url('/')}}/api/brands',
          success: function(response){
              if( response !== null ){
                $.each(response.data, function(idx, opt) {
            $('#brand_id').append('<option value="'+opt.id+'">'+(opt.name.toUpperCase())+'</option>');
        });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    }
});
}

$('#formCars').submit(function(e) {
        e.preventDefault();
        console.log('form');
       $.ajax({
            type: "PUT",
            url: '{{url('/')}}/api/cars/{{ $car_id }}',
            data: $(this).serialize(),
            success: function(response)
            {
                    location.href = "{{ route('home.index') }}";
           }
       });
});
</script>
@endpush
