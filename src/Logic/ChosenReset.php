<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;
use Quantic\Chosen\Matrix\FormErrors as Errors;

class ChosenReset extends Controller
{
    private string $viewResetForm;
    private string $viewReset;
    private object $errors;
    private string $token;

    public function __construct()
    {
        $this->errors = new Errors;
        $this->token = $this->generateToken(100);
        $this->viewResetForm = (config('chosen.constellations'))['reset_get']['view'];
        $this->viewReset = (config('chosen.constellations'))['reset_post']['view'];
    }

    public function showResetForm()
    {
        views($this->viewResetForm, ['name' => config('app.name'), 'stt' => 'formReset', 'token' => $this->token, 'errors' => $this->errors]);
    }

    public function reset()
    {
        views($this->viewReset, ['name' => config('app.name'), 'stt' => 'reset', 'token' => $this->token, 'errors' => $this->errors]);
    }

    private function generateToken( $valLength )
    {
        $result = '';
        $moduleLength = 40;   // we use sha1, so module is 40 chars
        $steps = round(($valLength/$moduleLength) + 0.5);

        for( $i=0; $i<$steps; $i++ ) {
            $result .= sha1( uniqid() . md5( rand() . uniqid() ) );
        }

        return substr( $result, 0, $valLength );
    }
}