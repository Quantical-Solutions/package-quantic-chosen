<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;

class ChosenRegister extends Controller
{
    private string $viewRegisterForm;
    private string $viewRegister;

    public function __construct()
    {
        $this->viewRegisterForm = (config('chosen.constellations'))['register_get']['view'];
        $this->viewRegister = (config('chosen.constellations'))['register_post']['view'];
    }

    public function showRegistrationForm()
    {
        views($this->viewRegisterForm, ['name' => config('app.name'), 'stt' => 'formRegister']);
    }

    public function register()
    {
        views($this->viewRegister, ['name' => config('app.name'), 'stt' => 'register']);
    }
}