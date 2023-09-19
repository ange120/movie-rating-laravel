@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Видалити оцінку для фільму "{{ $movie->api_id }}"</div>

                    <div class="card-body">
                        <p>Ви впевнені, що хочете видалити свою оцінку для цього фільму?</p>

                        <form method="POST" action="{{ route('movies.deleteRating', $movie->id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Видалити оцінку</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
