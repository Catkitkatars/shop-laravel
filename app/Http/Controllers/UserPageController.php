<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPageController extends Controller
{

    public function showUserPage() {
        $userInSession = auth()->user();
        $userInRequest = User::where('id', request('id'))->first();

        $chek = $userInSession->name == $userInRequest->name;

        if($chek) {

            return view('userPage', ["user" => $userInRequest]);
        }
        return abort(404);
    }
}
