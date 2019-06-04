<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verify(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                        ? redirect("/home")
                        : view('auth.verify');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user()->access == 6, 403, "Access Denied!");

        $users = User::all()->sortBy('email')->sortBy('access');

        return view('admin.admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\User  $User
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(User $User)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function deact(Request $request)
    {
        abort_unless(Auth::user()->access == 6, 403, "Access Denied!");

        $user = User::findorfail($request->id);
        if ($user->email == Auth::user()->email)
            return response()->json(['failure' => "You can't deactive your own account!"]);
        
        $reponseMsg = 'User Account deactivated successfully';

        if ($user->email_verified_at) {
            $user->email_verified_at = null;
        } else {
            $user->email_verified_at = now();
            $reponseMsg = 'User Account reactivated successfully!';
        }
        $user->save();

        return response()->json(['success' => $reponseMsg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->access == 6, 403, "Access Denied!");

        $user = User::findorfail($request->id);

        $user->access = $request->access;
        $user->save();

        return response()->json(['success' => 'User Account updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->access == 6, 403, "Access Denied!");

        if (User::findorfail($request->id)->access == '6' && User::where('access', '6')->count() > 1) {
            User::findorfail($request->id)->delete();
            return response()->json(['success' => 'User Account deleted successfully!']);
        } else if (User::findorfail($request->id)->access != '6') {
            User::findorfail($request->id)->delete();
            return response()->json(['success' => 'User Account deleted successfully!']);
        }
        return response()->json(['failure' => 'User Account unsuccessfully deleted!']);
    }
}
