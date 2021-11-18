<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiUpdateProfileController extends Controller
{
    public function updateProfile(Request $request, $id) {

        $user = User::find($id);
        $user->update($request->all());

        return response()->json(['message' => 'Success', 'data' => $user], Response::HTTP_OK);
    }
}
