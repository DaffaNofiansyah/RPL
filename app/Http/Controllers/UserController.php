<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Board;
use App\Models\Req;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.userreq.index',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            // this users request is all the requests that has the same user_id as the user we are viewing
            'requests' => Req::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.userreq.create',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            'boards' => Board::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'konten' => 'required',
            'board_id' => 'required',
            'detail' => 'required',
            'deadline' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'pending';
        Req::create($validatedData);

        return redirect('/user/req')->with('newreq_success', 'New request has been added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Req $req)
    {
        return view('user.userreq.edit',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            'boards' => Board::all(),
            'request' => $req
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Req $req)
    {
        $validatedData = $request->validate([
            'konten' => 'required',
            'board_id' => 'required',
            'detail' => 'required',
            'deadline' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['status'] = 'pending';
        Req::where('id', $req->id)->update($validatedData);

        return redirect('/user/req')->with('editreq_success', 'Request has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req)
    {
        Req::destroy($req->id);
        return redirect('/user/req')->with('delete_success', 'Request has been deleted!');
    }
}
