
@extends('layouts.app')

@section('title', '| Galleries')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i>Gallery

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>nama foto</th>
                    <th>keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $item)
                <tr>
                    <td>{{ $item->name }}</td> 
                    <td>{{ $item->keterangan }}</td> 
                    <td>
                    
                    @can('Edit Gallery')
                        <a href="{{ URL::to('galleries/'.$item->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    @endcan
                    @can('Delete Gallery')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['galleries.destroy', $item->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                    

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('galleries/create') }}" class="btn btn-success">Add Foto</a>

</div>

@endsection