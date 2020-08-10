<?php

namespace App\Http\Controllers\Web;

use App\Models\History;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function __invoke()
    {
        $queryA = History::query()
            ->selectRaw('items.name as name, items.stock as stock, sum(histories.quantity_in) as quantity_in, sum(histories.quantity_out) as quantity_out, DATE_FORMAT(histories.created_at,\'%Y-%m\') as date')
            ->join('items', 'items.id', '=', 'histories.item_id')
            ->groupBy('name')
            ->groupBy('stock')
            ->groupBy('date')
            ->get();

        $queryB = User::role(User::ROLE_SUPPLIER)
            ->selectRaw('users.name as user, items.name as item, avg(histories.quantity_in) as average_quantity_in')
            ->join('histories', 'users.id', '=', 'histories.user_id')
            ->join('items', 'items.id', '=', 'histories.item_id')
            ->groupBy('users.id')
            ->groupBy('histories.item_id')
            ->get();

        return view('summary.index', compact('queryA', 'queryB'));
    }
}
