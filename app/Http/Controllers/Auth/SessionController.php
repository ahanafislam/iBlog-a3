<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }
}
