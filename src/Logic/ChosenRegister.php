<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;
use Quantic\Chosen\Matrix\FormErrors as Errors;

class ChosenRegister extends Controller
{
    private string $viewRegisterForm;
    private string $viewRegister;
    private object $errors;

    public function __construct()
    {
        $this->errors = new Errors;
        $this->viewRegisterForm = (config('chosen.constellations'))['register_get']['view'];
        $this->viewRegister = (config('chosen.constellations'))['register_post']['view'];
    }

    public function showRegistrationForm()
    {
        views($this->viewRegisterForm, ['name' => config('app.name'), 'stt' => 'formRegister', 'errors' => $this->errors]);
    }

    public function register()
    {
        views($this->viewRegister, ['name' => config('app.name'), 'stt' => 'register', 'errors' => $this->errors]);
    }
}