<?php

namespace gpibarra\LaravelAdminLTE\app\Http\Controllers;

class AdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        if (trim(config('laraveladminlte.route_prefix'))=='' || trim(config('laraveladminlte.route_prefix'))=='/') {
            //$this->middleware('guest');
        }
        else {
            $this->middleware('admin');
        }
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('gpibarra::laraveladminlte.dashboard'); // set the page title

        return view('LaravelAdminLTE::dashboard', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(config('laraveladminlte.route_prefix').'/'.config('laraveladminlte.route_dashboard'));
    }
}
