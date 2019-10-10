<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class AdminPageController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();

        return view('users.index')->withUsers($users);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = Users::findOrFail($id);
        return view('users.show')->withUser($user);
    }


    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('users.edit')->withUser($user);
    }

    public function update(Request $request, $id)
    {
        $user = Users::findOrFail($id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $input = $request->all();

        $user->fill($input)->save();

        return redirect()->back();
    }


    public function destroy($id)
    {

        $user = Users::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index');
    }
}
