
@extends('backend.layouts.master')
@section('title', '| Permissions')
@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
  <div class="row" style="padding-bottom:10px;"> 
      <div class="col-md-2">
        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>
      </div>
  </div>
  <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title">Daftar Gallery</h3>
          </div>
          <!-- /.box-header -->
          @if(empty($permissions))
              <div class="alert alert-warning">
                  <strong>Sorry!</strong> No Data Found.
              </div>                                      
          @else
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{!! $permission->name !!}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
          @endif
      </div>
      <!-- /.box-footer -->
  </div>
  <!--/.box -->
</div>
@endsection