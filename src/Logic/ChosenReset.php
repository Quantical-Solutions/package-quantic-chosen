<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;

class ChosenReset extends Controller
{
    private string $viewResetForm;
    private string $viewReset;

    public function __construct()
    {
        $this->viewResetForm = (config('chosen.constellations'))['reset_get']['view'];
        $this->viewReset = (config('chosen.constellations'))['reset_post']['view'];
    }

    public function showResetForm()
    {
        views($this->viewResetForm, ['name' => config('app.name'), 'stt' => 'formReset']);
    }

    public function reset()
    {
        views($this->viewReset, ['name' => config('app.name'), 'stt' => 'reset']);
    }
}