<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login() {
        $request = request();

        $validated = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => [
                'required', 
                function ($attribute, $value, $fail) use ($request) {
                    $user = User::where('email', $request->input('email'))->first();
        
                    if (!$user || !Hash::check($value, $user->password)) {
                        $fail('Неверный пароль.');
                    }
                },
            ],
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }

        return redirect('/');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
