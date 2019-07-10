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
                <h3 class="box-title">Detail Perusahaan</h3>
            </div>
            
            <!-- /.box-header -->
            @if(empty($results))
                <div class="alert alert-warning">
                    <strong>Sorry!</strong> No Data Found.
                </div>                 
            @else
                
                <div class="timeline-item">
                        <h3 class="timeline-header"><a href="#">{{ $results->namaperusahaan }}</a></h3>
        
                        <div class="timeline-body">
                                {{ $results->deskripsi }}
                        </div>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-xs">Edit</a>
                        </div>
                </div>
            @endif
        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>
@endsection