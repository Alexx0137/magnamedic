<?php

namespace App\Http\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Modules\Auth\Requests\LoginRequest;
use App\Http\Modules\Users\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()
                    ->intended('dashboard')
                    ->with('status', 'You are logged in');
            }

            throw ValidationException::withMessages([
                'password' => 'La contraseña proporcionada es incorrecta.',
            ]);
        }

        throw ValidationException::withMessages([
            'email' => 'No se encontró ninguna cuenta con este correo electrónico.',
        ]);
    }

    public function logout(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')
            ->with('status', 'You are logged out');
    }

}
