<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieRating;
use Illuminate\Http\Request;

class MovieRatingController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $user = auth()->user();
        $ratedMovies = $user->ratedMovies;

        return view('movies.index', compact('ratedMovies'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function showRateForm($id)
    {

        $movie = Movie::where('id_api', $id)->first();
        if (is_null($movie)) {
            $movie = Movie::create([
                'id_api' => $id
            ]);
        }
        return view('movies.rate', compact('movie'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        $movie = Movie::findOrFail($id);
        $rating = $request->input('rating');

        $existingRating = MovieRating::where('movie_id', $movie->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingRating) {
            $existingRating->update(['rating' => number_format($rating, 1)]);
        } else {
            MovieRating::create([
                'movie_id' => $movie->id,
                'user_id' => auth()->id(),
                'rating' => number_format($rating, 1),
            ]);
        }

        return redirect()->route('movies.index')->with('success', 'Оцінка успішно збережена.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function editRatingForm($id)
    {
        $movie = Movie::where('id_api', $id)->first();
        if(is_null($movie)){
            return redirect()->route('movies.index')->with('error', 'У Вас відсутння оцінка для цьогго фільму.');
        }
        $rating = MovieRating::where('movie_id', $movie->id)
            ->where('user_id', auth()->id())
            ->first();

        return view('movies.editRating', compact('movie', 'rating'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:10',
        ]);

        $rating = MovieRating::where('movie_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($rating) {
            $rating->update(['rating' => $request->input('rating')]);
            return redirect()->route('movies.index')->with('success', 'Оцінка успішно оновлена.');
        }

        return redirect()->route('movies.index')->with('error', 'Оцінка не знайдена.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRating($id)
    {
        $movie = Movie::where('id_api', $id)->first();
        if(is_null($movie)){
            return redirect()->route('movies.index')->with('error', 'Оцінка не знайдена.');
        }

        $rating = MovieRating::where('movie_id', $movie->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($rating) {
            $rating->delete();
            return redirect()->route('movies.index')->with('success', 'Оцінка успішно видалена.');
        }

        return redirect()->route('movies.index')->with('error', 'Оцінка не знайдена.');
    }

}
