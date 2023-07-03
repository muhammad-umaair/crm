<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoices::select('customer_name','salesperson','photographer');

        if ($request->has('customer_name')) {
            $invoices->where('customer_name', 'LIKE', '%' . $request->input('customer_name') . '%');
        }

        if ($request->has('salesperson')) {
            $invoices->where('salesperson', 'LIKE', '%' . $request->input('salesperson') . '%');
        }

        if ($request->has('photographer')) {
            $invoices->where('photographer', 'LIKE', '%' . $request->input('photographer') . '%');
        }

        $invoices = $invoices->get();

        return view('invoices.index', compact('invoices'));
    }
}
