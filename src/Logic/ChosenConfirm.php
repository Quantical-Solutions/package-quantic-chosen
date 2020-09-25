<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;

class ChosenConfirm extends Controller
{
    private string $viewConfirmForm;
    private string $viewConfirm;

    public function __construct()
    {
        $this->viewConfirmForm = (config('chosen.constellations'))['confirm_get']['view'];
        $this->viewConfirm = (config('chosen.constellations'))['confirm_post']['view'];
    }

    public function showConfirmForm()
    {
        views($this->viewConfirmForm, ['name' => config('app.name'), 'stt' => 'formConfirm']);
    }

    public function confirm()
    {
        views($this->viewConfirm, ['name' => config('app.name'), 'stt' => 'reset']);
    }
}