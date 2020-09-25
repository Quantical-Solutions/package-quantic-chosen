<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;

class ChosenLogin
{
    private string $viewLoginForm;
    private string $viewLogin;
    private string $viewLogout;

    public function __construct()
    {
        $this->viewLoginForm = (config('chosen.constellations'))['login_get']['view'];
        $this->viewLogin = (config('chosen.constellations'))['login_post']['view'];
        $this->viewLogout = (config('chosen.constellations'))['logout']['view'];
    }

    public function showLoginForm()
    {
        views($this->viewLoginForm, ['name' => config('app.name'), 'stt' => 'formLogin']);
    }

    public function login()
    {
        views($this->viewLogin, ['name' => config('app.name'), 'stt' => 'login']);
    }

    public function logout()
    {
        views($this->viewLogout, ['name' => config('app.name'), 'stt' => 'logout']);
    }
}