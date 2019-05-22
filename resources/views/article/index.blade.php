@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Artikel
                    <a 
                        class="btn btn-primary float-right btn-sm" role="button" href="{{ route('article.create') }}">
                        Artikel Baru
                    </a>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('message'))
						<div class="alert alert-success martop-sm">
							<p>{{ $message }}</p>
						</div>
					@endif
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></td>
                                        <td>
                                            <form action="{{ route('article.destroy', $article->id) }}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	