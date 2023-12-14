<?php

namespace Pqe\Admin\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return Inertia::render('Dashboard', []);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexBlade() {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard() {
        return view('dashboard');
    }

    public function welcome() {
        return view('welcome');
    }

    // example
//     public function myPrfList() {
//         return Inertia::render('MyPrfList', []);
//     }
}
