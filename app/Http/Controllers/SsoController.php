<?php

namespace App\Http\Controllers;

use App\Models\User; // <-- You might need this
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth; // <-- you'll need this for logging in a user
use Laravel\Socialite\Facades\Socialite;

class SsoController extends Controller {

    /**
     * This is the callback handler (the callback URL /auth/callback is defined in the Google Cloud Dashboard)
     * Upon successful authentication with Google, a user will be redirected here!
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function callback(): Redirector|RedirectResponse|Application {
        // TODO:
        // 1. get the user info from Google
        $user = Socialite::driver('google')->user();
        $name = $user->name;
        $email = $user->email;
        $token = $user->token;
        
        // 2. Check if the user exists in the database.
        // 3. If the user exists, update the profile with the new Google token and refresh token
        //    If the user does not exist, create a new user with the name and email you get in step 1.
        $updateUser = User::updateOrCreate(
            ['email' => $email],
            ['name'=>$name, 'google_token' => $token]
        );
        // 4. Login the user
        Auth::login($updateUser);
        // 5. Redirect to the dashboard (which only authenticated users can access.
        // Note: you can get the user info from Google using: Socialite::driver('google')->user();
        // Hint for step 3: look into the updateOrCreate function from Laravel
        return redirect('/dashboard');
    }

    /**
     * Redirect the user to an identity provider: Google, in this case.
     */
    public function authenticateWithIdp(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse {
        return Socialite::driver('google')->redirect();
    }

}
