<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('admin.ManajemenKeuangan.financeReport.index');
    }

    public function unpaidInvoice()
    {
        return view('admin.ManajemenKeuangan.unpaidInvoice.index');
    }
}
