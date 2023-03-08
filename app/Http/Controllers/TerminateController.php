<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TerminateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function delete(string $id, Request $request)
    {

       // $session = Session::find($id);
        $user = Auth::user();
        $session = $user->sessions()->find($id);
        $session->delete();


        $status = 'session has been deleted';


        return Redirect::back()->with('status', $status);
    }



    public function deleteAll(Request $request)
    {
        DB::table('sessions')
            ->where('user_id', $request->user()->id)
            ->whereNot('id', $request->session()->getId())
            ->delete();

        return Redirect::back()->with('status', 'all sessions except current is flushed');
    }
}
