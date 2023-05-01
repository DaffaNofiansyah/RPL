<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;

class UserBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('userboard.index',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        return view('userboard.show',
            [
                'board' => $board,
                // 'requests is all the requests that has the same board_id as the board we are viewing
                'requests' => $board->reqs
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
    public function update(UpdateBoardRequest $request, Board $board)
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
