<?php

namespace gpibarra\LaravelAdminLTE;


class LaravelAdminLTEManager
{
     private $view_name;
     private $blError = false;
     private $blLogin = false;

    /**
     * Appends the configured adminlte prefix and returns
     * the URL using the standard Laravel helpers.
     *
     * @param $path
     *
     * @return string
     */
    public function url($path = null)
    {
        $path = !$path || (substr($path, 1, 1) == '/') ? $path : '/'.$path;

        return url(config('laraveladminlte.route_prefix', 'admin').$path);
    }

    /**
     * Returns the avatar URL of a user.
     *
     * @param $user
     *
     * @return string
     */
    public function avatar_url($user)
    {
        return asset('vendor/gpibarra/')."/img/"."User-blue-icon.png";
    }

    public function setViewName($view) {
        $this->view_name = $view->getName();
        $this->blLogin = false;
        $this->blError = false;
        if ($this->view_name == 'auth.login') $this->blLogin = true;
        if (\Illuminate\Support\Str::startsWith($this->view_name,'errors::')) $this->blError = true;
    }

    public function getViewName() {
        return $this->view_name;
    }

    public function isError() {
        return $this->blError;
    }
    public function isLogin() {
        return $this->blLogin;
    }
    public function isCollapseSideBar() {
        return ($this->blError || $this->blLogin);
    }
    public function isDisabledSideBar() {
        return ($this->blError);
    }


}
