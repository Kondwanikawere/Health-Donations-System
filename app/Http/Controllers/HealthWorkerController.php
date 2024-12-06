<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HealthWorkerController extends Controller
{

    public function healthWorkerRegister(){
        return view('healthWorker.healthWorkerRegister');
    }



    public function showAdmins()
    {
        // Retrieve all users who are admins (whether approved or not)
        $admins = User::where('isAdmin', true)->get();

        // Pass the data to the view
        return view('healthworker.index', compact('admins'));
    }

}









