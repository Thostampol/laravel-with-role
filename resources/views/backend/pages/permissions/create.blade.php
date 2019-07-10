@extends('backend.layouts.master')
@section('title', '| Create Permission')
@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
  <div class="row" style="padding-bottom:10px;"> 
      <div class="col-md-2">
          <a href='/backend-admin/gallery/create' class="btn btn-block btn-primary">Tambah data</a>
      </div>
  </div>
  <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Gallery</h3>
            </div>
            {{ Form::open(array('url' => 'permissions')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div><br>
            @if(!$roles->isEmpty()) //If no roles exist yet
                <h4>Assign Permission to Roles</h4>
        
                @foreach ($roles as $role) 
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
        
                @endforeach
            @endif
            <br>
            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
        
            {{ Form::close() }}
        </div>
        <!-- /.box-footer -->
    </div>
  </div>

  <!--/.box -->
</div>
@endsection