@extends('backend.layouts.master')
@section('title', '| Roles')
@section('content')

<div class="col-md-12">
    <!-- USERS LIST -->
  <div class="row" style="padding-bottom:10px;"> 
      <div class="col-md-2">
          <a href='/roles/create' class="btn btn-block btn-primary">Tambah data</a>
      </div>
  </div>
  <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title">Daftar Role</h3>
          </div>
          <!-- /.box-header -->
          @if(empty($roles))
              <div class="alert alert-warning">
                  <strong>Sorry!</strong> No Data Found.
              </div>                                      
          @else
          <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @if(Auth::user()->hasRole('Admin'))
                                @foreach ($roles as $role)
                                    @if($role->name != "SuperAdmin")
                                        <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach(explode('","', $role->permissions()->pluck('name')) as $string)
                                                        <span class="label bg-green">{{ str_replace(array('["','"]'),'', $string)  }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                        </tr>    
                                    @endif
                                @endforeach
                            @elseif(Auth::user()->hasRole('SuperAdmin'))
                            @foreach ($roles as $role)
                                <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach(explode('","', $role->permissions()->pluck('name')) as $string)
                                                <span class="label bg-green">{{ str_replace(array('["','"]'),'', $string)  }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                </tr>    
                            @endforeach
                            @endif
                        </tbody>
              </table>
          </div>
          @endif
      </div>
      <!-- /.box-footer -->
  </div>
  <!--/.box -->
</div>
@can('Add Role')
    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
@endcan


@endsection
