<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;

/**
 * @codeCoverageIgnore
 * Class RegisteredUserController
 * @package App\Http\Controllers\Auth
 */
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "gender" => ['required', 'string'],
            "CID" => ['required', 'string'],
            "CID_type" => ['required', 'string'],
            "first_name" => ['required', 'string'],
            "last_name" => ['required', 'string'],
            "birthdate" => ['required', 'date'],
            "birth_place" => ['required', 'string'],
            "metas" => ['array'],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $guest_data = array_merge(
            collect($data)->except(['name','email','password'])->toArray(),
            ["user_id" => $user->id],
        );

        Guest::create($guest_data);
        $user->assignRole("guest");

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
