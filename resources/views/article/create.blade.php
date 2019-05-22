@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Artikel Baru
                    @if (Route::has('password.request'))
                        <a class= "btn btn-success btn-sm float-right" role="button" href="{{ route('article.index') }}"> Kembali </a>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="post">                        
                            {{csrf_field()}}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="control-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                <label for="content" class="control-label">Content</label>
                                <textarea name="content" cols="30" rows="5" class="form-control"></textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">{{ $errors->first('content') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
