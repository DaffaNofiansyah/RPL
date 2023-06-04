<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adminboard.index',
            [
                'boards' => Board::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adminboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validatedData['created_at'] = now();

        Board::create($validatedData);

        return redirect('/admin/board')->with('create_success', 'Board has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        return view('admin.adminboard.show',
            [
                'board' => $board,
                // 'requests is all the requests that has the same board_id as the board we are viewing
                // 'requests' => $board->reqs
                'pending_requests' => $board->reqs->where('status', 'Pending'),
                'onprogress_requests' => $board->reqs->where('status', 'On Progress'),
                'done_requests' => $board->reqs->where('status', 'Done'),

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
}
