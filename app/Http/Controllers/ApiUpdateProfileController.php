<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiUpdateProfileController extends Controller
{
    public function updateProfile(Request $request) {
        $edited = $request->all();

        $user = User::where('id', Auth()->user()->id)->update($edited);

        return response()->json($user, Response::HTTP_OK);
    }
}
