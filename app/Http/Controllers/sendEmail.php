<?php

namespace App\Http\Controllers;

use App\Mail\BadStudents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class sendEmail extends Controller
{
    public function student($id) {
        $user = User::findOrFail($id);

        Mail::to($user->email)->send(new BadStudents($user));

        return redirect()->back()->with('success','Done');

    }
}
