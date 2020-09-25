<?php

namespace Quantic\Chosen\Logic;

use Carbon\Carbon;
use Jenssegers\Blade\Blade;
use Quantic\Chosen\Matrix\Auth;
use Quantic\Igniter\Origins\MatrixController as Controller;
use Quantic\Chosen\Matrix\Email;

class ChosenVerify extends Controller
{
    private string $viewNoticeForm;
    private string $viewVerify;
    private string $viewResend;

    public function __construct()
    {
        $this->viewNoticeForm = (config('chosen.constellations'))['verify_notice_get']['view'];
        $this->viewVerify = (config('chosen.constellations'))['verify_get']['view'];
        $this->viewResend = (config('chosen.constellations'))['verify_post']['view'];
    }

    public function showNoticeForm()
    {
        views($this->viewNoticeForm, ['name' => config('app.name'), 'stt' => 'formNotice']);
    }

    public function verify()
    {
        views($this->viewVerify, ['name' => config('app.name'), 'stt' => 'verify']);
    }

    public function resend()
    {
        views($this->viewResend, ['name' => config('app.name'), 'stt' => 'resend']);
    }
}