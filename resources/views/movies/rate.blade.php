@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Додати оцінку для фільму номер "{{ $movie->id_api }}"</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('movies.storeRating', $movie->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="rating">Оцінка (від 1 до 10)</label>
                                <input type="number" name="rating" id="rating" max="10" min="1" step="0.1" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Зберегти оцінку</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

