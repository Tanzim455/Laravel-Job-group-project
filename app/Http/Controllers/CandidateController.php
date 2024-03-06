<?php

namespace App\Http\Controllers;

use App\Models\User;

class CandidateController extends Controller
{
    public function allCandidates()
    {
        $allCandidates = User::paginate(10);

        return view('admin.all-candidate', compact('allCandidates'));
    }
}
