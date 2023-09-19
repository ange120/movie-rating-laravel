@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редагувати оцінку для фільму "{{ $movie->id_api }}"</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('movies.updateRating', $movie->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="rating">Оцінка (від 1 до 10)</label>
                                <input type="number" name="rating" id="rating" class="form-control" required value="{{ $rating->rating }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Оновити оцінку</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
