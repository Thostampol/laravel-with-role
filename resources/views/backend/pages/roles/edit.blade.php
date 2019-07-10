@extends('backend.layouts.master')

@section('title', '| Edit Role')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Gallery</h3>
            </div>
            <!-- /.box-header -->
            <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
            <hr>
        
            {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
        
            <div class="form-group">
                {{ Form::label('name', 'Role Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
        
            <h5><b>Assign Permissions</b></h5>
            @foreach ($permissions as $permission)
        
                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
        
            @endforeach
            <br>
            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
        
            {{ Form::close() }}  
        </div>
      <!-- /.box-footer -->
  </div>
  <!--/.box -->
</div>
@endsection