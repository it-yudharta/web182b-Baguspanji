@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menampilkan
                    @if (Route::has('password.request'))
                        <a class= "btn btn-success float-right btn-sm" role="button" href="{{ route('article.index') }}"> Kembali </a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
						<h4>{{ $article->title }}</h4>
						<p>{{ $article->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
