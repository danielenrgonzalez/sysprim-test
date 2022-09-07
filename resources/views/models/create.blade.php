@extends('layouts.app')
@section('content')
<form id="formBrands" class="mt-3">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="float: right">Registar</button>
</form>
@endsection
@push('scripts')
<script>
    $('#formBrands').submit(function(e) {
        e.preventDefault();
       $.ajax({
            type: "POST",
            url: '{{url('/')}}/api/brands',
            data: $(this).serialize(),
            success: function(response)
            {
                    location.href = "{{ route('brand.index') }}";
           }
       });
});
</script>
@endpush
