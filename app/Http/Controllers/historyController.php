<?php

namespace App\Http\Controllers;

use App\Models\TransHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class historyController extends Controller
{
    // HistoryController
    public function viewOrds()
    {
        # Method for viewing history...
        $orders = TransHistory::where('user_id', Auth::user()->id)
            ->with('prods')
            ->paginate(5);
        // dd($orders);
        return view('orders.history', compact('orders'));
    }

}
