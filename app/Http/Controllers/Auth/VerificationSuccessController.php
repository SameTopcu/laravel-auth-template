<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class VerificationSuccessController extends Controller
{
    /**
     * Display the email verification success page.
     */
    public function __invoke(): View
    {
        return view('auth.verify-success');
    }
}
