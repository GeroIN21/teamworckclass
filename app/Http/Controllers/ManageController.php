<?php

namespace App\Http\Controllers;

use App\Queue;
use Illuminate\Http\Request;
use DB;

class ManageController extends Controller
{
    public function index() 
    {
        $queues = Queue::all();
        $sorted = $queues->sortByDesc('created_at');

        return view('manage.index', [
            'queues'=>$sorted,
        ]);
    }

    public function destroy()
    {
        Queue::where('id', $id)->delete(); 
        return redirect()->back();               
    }
}
