<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Return the dashboard view passing the currently authenticated user to it.
     *
     * Note: due to the usage of the auth middleware in web.php, we know there will
     * always be an authenticated user when we hit this route handler.
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application {
        return view('dashboard', ['user' => $request->user()]);
    }

}
