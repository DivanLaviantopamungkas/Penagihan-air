<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function downloadInvoice($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            return redirect()->back()->with('error', 'Invoice Tidak Ditemukan');
        }

        $customer = $invoice->customer;

        // Logika untuk mengisi data invoice ke dalam file PDF atau format lainnya
        $pdf = \PDF::loadView('invoices.invoice-template', compact('invoice', 'customer'));

        // Simpan PDF ke storage atau unduh langsung
        return $pdf->download('invoice_' . $invoice->id . '.pdf');
    }
}
