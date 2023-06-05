<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Req;
use App\Models\Board;
use App\Models\PIC;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adminreq.index',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            // this users request is all the requests that has the same user_id as the user we are viewing
            'requests' => Req::all()
            
        ]);
    }

    public function profile()
    {
        return view('admin.adminprofile.index',
        [
            'title' => 'Profile',
            'active' => 'profile',
            'admin' => auth()->guard('admin')->user()
        ]);
    }

    public function updatephoto(Request $request, Admin $admin)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['photo'] = $request->file('photo')->store('uploads', 'public');

        // update corresponding admins photo attribute
        Admin::where('id', $admin->id)->update($validatedData);

        return redirect('/admin/profile')->with('editphoto_success', 'Photo has been edited!'); 
    }

    public function detail(Req $req)
    {
        return view('admin.adminboard.detail',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            'request' => $req,
            'statuses' => ['Pending', 'On Progress', 'Done']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Req $req)
    {
        return view('admin.adminreq.edit',
        [
            'title' => 'User Request',
            'active' => 'userreq',
            'request' => $req,
            'statuses' => ['Pending', 'On Progress', 'Done']
        ]);
    }

    public function take(Req $req)
    {
        $validatedData['req_id'] = $req->id;
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;
        PIC::create($validatedData);

        Req::where('id', $req->id)->update(['status' => 'On Progress']);

        return redirect('/admin/req/' . $req->id . '/detail')->with('takereq_success', 'Request has been taken!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Req $req)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'notes' => 'nullable'
        ]);

        $validatedData['user_id'] = $req->user_id;
        $validatedData['board_id'] = $req->board_id;
        $validatedData['konten'] = $req->konten;
        $validatedData['detail'] = $req->detail;
        $validatedData['deadline'] = $req->deadline;


        Req::where('id', $req->id)->update($validatedData);

        return redirect('/admin/board/' . $req->board_id)->with('editreq_success', 'Request has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req)
    {
        Req::destroy($req->id);
        return redirect('/admin/board/' . $req->board_id)->with('deletereq_success', 'Request has been deleted!');
    }

}
