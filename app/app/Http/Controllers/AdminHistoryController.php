<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchases_history;

class AdminHistoryController extends Controller
{
    protected $histories;
    public function __construct()
    {
        $this->histories = new Purchases_history();
    }

    public function manageHistory()
    {
        $histories = $this->histories->allget();
        return view('admin.history', compact('histories'));
    }
}
