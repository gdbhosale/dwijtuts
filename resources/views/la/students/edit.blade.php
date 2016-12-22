@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/students') }}">Student</a> :
@endsection
@section("contentheader_description", $student->$view_col)
@section("section", "Students")
@section("section_url", url(config('laraadmin.adminRoute') . '/students'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Students Edit : ".$student->$view_col)

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
                {!! Form::model($student, ['route' => [config('laraadmin.adminRoute') . '.students.update', $student->id ], 'method'=>'PUT', 'id' => 'student-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'name')
					@la_input($module, 'college')
					@la_input($module, 'degree')
					@la_input($module, 'city')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/students') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#student-edit-form").validate({
        
    });
});
</script>
@endpush
