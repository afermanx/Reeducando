<?php

namespace App\Http\Controllers\Admin\reports;

use App\Detento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportSevicesController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();
        if (!$user) {
            return view('Auth.sessionExpired');
        }
        $users = new Detento();
        $detentos = $users->list();
        return view('Admin.reports.services')
            ->with('user', $user)
            ->with('detentos', $detentos);
    }
}
