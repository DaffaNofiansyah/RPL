<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Board;
use App\Models\Req;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function profile()
    {
        return view('user.userprofile.index',
        [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => auth()->user()
        ]);
    }

    public function updatephoto(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['photo'] = $request->file('photo')->store('uploads', 'public');

        // update corresponding admins photo attribute
        User::where('id', $user->id)->update($validatedData);

        return redirect('/user/profile')->with('editphoto_success', 'Photo has been edited!');
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
        $validatedData['status'] = 'Pending';
        Req::create($validatedData);
        //RETURN TO DETAIL PAGE
        return redirect('/user/board/' . $validatedData['board_id'])->with('create_success', 'Request has been created!');
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
            'detail' => 'required',
            'deadline' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Req::where('id', $req->id)->update($validatedData);

        return redirect('/user/req/' . $req->id . '/detail')->with('editreq_success', 'Request has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req)
    {
        Req::destroy($req->id);
        return redirect('/user/board/' . $req->board_id)->with('deletereq_success', 'Request has been deleted!');
    }

    public function detail(Req $req)
    {
        return view('user.userboard.detail',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            'request' => $req,
            'statuses' => ['Pending', 'On Progress', 'Done']
        ]);
    }
}
