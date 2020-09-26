<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;
use Quantic\Chosen\Matrix\FormErrors as Errors;

class ChosenForgot extends Controller
{
    private string $viewRequestForm;
    private string $viewResetLink;
    private object $errors;

    public function __construct()
    {
        $this->errors = new Errors;
        $this->viewRequestForm = (config('chosen.constellations'))['forgot_get']['view'];
        $this->viewResetLink = (config('chosen.constellations'))['forgot_post']['view'];
    }

    public function showLinkRequestForm()
    {
        views($this->viewRequestForm, ['name' => config('app.name'), 'stt' => 'formRequest', 'errors' => $this->errors]);
    }

    public function sendResetLinkEmail()
    {
        views($this->viewResetLink, ['name' => config('app.name'), 'stt' => 'resetLink', 'errors' => $this->errors]);
    }
}