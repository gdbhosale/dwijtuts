@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/batches') }}">Batch</a> :
@endsection
@section("contentheader_description", $batch->$view_col)
@section("section", "Batches")
@section("section_url", url(config('laraadmin.adminRoute') . '/batches'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Batches Edit : ".$batch->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
    <div class="box-header">
        
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($batch, ['route' => [config('laraadmin.adminRoute') . '.batches.update', $batch->id ], 'method'=>'PUT', 'id' => 'batch-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'name')
					@la_input($module, 'college')
					@la_input($module, 'students')
					@la_input($module, 'course')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/batches') }}" class="btn btn-default pull-right">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
    $("#batch-edit-form").validate({
        
    });
});
</script>
@endpush
