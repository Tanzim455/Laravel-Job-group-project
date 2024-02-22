<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function allCandidates()
    {
        $allCandidates = User::paginate(10);

        return view('admin.all-candidate', compact('allCandidates'));
    }
}
