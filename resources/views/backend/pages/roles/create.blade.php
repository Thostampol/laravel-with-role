@extends('backend.layouts.master')
@section('title', '| Add Role')
@section('content')

<div class='col-lg-12'>

    <h1><i class='fa fa-key'></i> Add Role</h1>
    <hr>

    {{ Form::open(array('url' => 'roles')) }}
    {{ csrf_field() }}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>
    <div class='form-group'>
        @foreach ($permissions as $permission)
            <div class="col-md-3">
                <div class="checkbox">
                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-6">
            <div class="form-group">
                    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
            </div>
    </div>

</div>

@endsection