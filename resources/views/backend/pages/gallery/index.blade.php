@extends('backend.layouts.master')
@section('content')
<div class="col-md-12">
      <!-- USERS LIST -->
    <div class="row" style="padding-bottom:10px;"> 
        <div class="col-md-2">
            <a href='/galleries/create' class="btn btn-block btn-primary">Tambah data</a>
        </div>
    </div>
    <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Gallery</h3>
            </div>
            <!-- /.box-header -->
            @if(empty($galleries))
                <div class="alert alert-warning">
                    <strong>Sorry!</strong> No Data Found.
                </div>                                      
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
        
                    <thead>
                        <tr>
                            <th>nama foto</th>
                            <th>keterangan</th>
                            <th>gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $item)
                        <tr>
                            <td>{!! $item->name !!}</td> 
                            <td>{!! $item->keterangan !!}</td> 
                            <td><img class="img-responsive pad" src="/imageshow/{{$item->id}}"/></td> 
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
            @endif
        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>
@endsection