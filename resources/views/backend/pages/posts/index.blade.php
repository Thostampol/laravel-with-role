@extends('backend.layouts.master')
@section('content')
        <div class="col-md-12">
                <!-- USERS LIST -->
              <div class="row" style="padding-bottom:10px;"> 
                  <div class="col-md-2">
                      <a href='/posts/create' class="btn btn-block btn-primary">Tambah data</a>
                  </div>
              </div>
              <div class="box box-danger">
                      <div class="box-header with-border">
                          <h3 class="box-title">Daftar Artikel</h3>
                      </div>
                      <!-- /.box-header -->
                      @if(empty($posts))
                          <div class="alert alert-warning">
                              <strong>Sorry!</strong> No Data Found.
                          </div>                                      
                      @else
                      @foreach ($posts as $post)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                    <p class="teaser">
                                       {{ str_limit($post->body, 100) }}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                      @endif
                  </div>
                  <!-- /.box-footer -->
              </div>
              <!--/.box -->
          </div>
@endsection