<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    const HOME_LOGIN = '/movies/index';

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function login(Request $request)
    {
        if ($request->ajax()) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user) {
                    return response()->json(['success' => true, 'redirect' => self::HOME_LOGIN]);
                } else {
                    Auth::logout();
                    return response()->json(['success' => false, 'message' => 'You are not authorized']);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Не вірно введено пошту або пароль']);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function register(Request $request)
    {
        if ($request->ajax()) {
            $credentials = $request->only('email', 'password');

            $user = User::create([
                'name' => $credentials['email'],
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
            ]);

            if ($user) {
                Auth::login($user);
                return response()->json(['success' => true, 'redirect' => self::HOME_LOGIN]);
            } else {
                Auth::logout();
                return response()->json(['success' => false, 'message' => 'You are not authorized!!']);
            }
        }

    }
}
