<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Inertia\ResponseFactory;

class RegisterController extends Controller
{
    public function showRegisterForm(): ResponseFactory|Response
    {
        return inertia('Auth/Register');
    }
}
