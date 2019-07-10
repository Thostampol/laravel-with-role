@extends('backend.layouts.master')

@section('title', '| Create New Post')

@section('content')
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Gallery</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      {{ Form::open(array('route' => 'posts.store')) }}

          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
              {{ Form::label('title', 'Title') }}
              {!! Form::text('title', null, array('class' => 'form-control')) !!}
              @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
              <br>
          </div>
          <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
                {{ Form::label('body', 'Post Body') }}
                {!! Form::textarea('body', null, array('class' => 'form-control')) !!}
                <br>
                @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
              @endif
          </div>
                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
          
    <!-- /.box -->
  </div>
@endsection