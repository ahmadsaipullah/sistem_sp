<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nopol' => ['required', 'string', 'unique:'.User::class],
            'no_rangka' => ['required', 'string', 'unique:'.User::class],
            'no_hp' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:6', Rules\Password::defaults()],
            'image' => ['nullable'],
            'alamat' => ['required', 'string'],
            'tipe_mobil' => ['required', 'string'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'nopol' => $request->nopol,
            'no_rangka' => $request->no_rangka,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'tipe_mobil' => $request->tipe_mobil,
            'alamat' => $request->alamat,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
