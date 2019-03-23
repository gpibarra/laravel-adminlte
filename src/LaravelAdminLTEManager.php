<?php

namespace gpibarra\LaravelAdminLTE;


class LaravelAdminLTEManager
{
    private $view;
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

    public function setView($v) {
        $this->view[] = $v;
        $this->view_name[] = $v->getName();
        if ($v->getName() == 'auth.login') $this->blLogin = true;
        if (\Illuminate\Support\Str::startsWith($v->getName(),'errors::')) $this->blError = true;
    }

    public function getView() {
        return $this->view;
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
