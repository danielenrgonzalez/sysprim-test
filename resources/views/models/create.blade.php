@extends('layouts.app')
@section('content')
<form id="formModel" class="mt-3">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3 col-md-6">
            <label for="brand_id" class="form-label">Marca</label>
            <select class="form-select" id="brand_id" name="brand_id" aria-label="Seleccione" required>
                <option selected value="">Seleccione</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="float: right">Registar</button>
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
})
});
    $('#formModel').submit(function(e) {
        e.preventDefault();
       $.ajax({
            type: "POST",
            url: '{{url('/')}}/api/models',
            data: $(this).serialize(),
            success: function(response)
            {
                    location.href = "{{ route('model.index') }}";
           }
       });
});
</script>
@endpush
