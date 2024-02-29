<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller {

    /**
     * Regular old registration with saving an email and a (hashed Bcrypt) password
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function register(Request $request): Redirector|RedirectResponse|Application {
        $reqData = $request->validate([
            'email' => 'required|unique:users|email',
            'name' => 'required',
            'password' => 'min:8',
        ]);

        $user = new User();
        $user->email = $reqData['email'];
        $user->name = $reqData['name'];
        $user->password = Hash::make($reqData['password'], ['rounds' => 12]); // use bcrypt to hash a password
        $user->save();
        Auth::login($user);
        return redirect('dashboard');
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function login(Request $request): Redirector|Application|RedirectResponse {
        $user = User::where('email', '=', $request->string('email'))->first();
        if (Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return redirect('dashboard');
        } else {
            return back()->withErrors(['message' => 'Incorrect email or password.']);
        }
    }

    /**
     * @return Redirector|Application|RedirectResponse
     */
    public function logout(): Redirector|Application|RedirectResponse {
        Auth::logout();
        return redirect('login');
    }

    /**
     * @return Factory|View|Application
     */
    public function showRegistration(): Factory|View|Application {
        return view('register');
    }

    /**
     * @return Factory|View|Application
     */
    public function showLogin(): Factory|View|Application {
        return view('login');
    }

}
