<?php

namespace App\Http\Controllers;


use App\Models\PurchaseOrder;
use App\Models\PurchaseRequisition;
use App\Models\Supplier;
use Illuminate\Http\Request;


class PurchaseOrderController extends Controller
{


    public function index()
    {

        $orders = PurchaseOrder::with([
            'purchaseRequisition.employee',
            'supplier'
        ])
            ->latest()
            ->paginate(10);


        return view(
            'purchase_orders.index',
            compact('orders')
        );
    }





    public function create()
    {

        // Only approved PR

        $requisitions = PurchaseRequisition::where(
            'status',
            'approved'
        )->get();



        $suppliers = Supplier::all();



        return view(
            'purchase_orders.create',
            compact(
                'requisitions',
                'suppliers'
            )
        );
    }





    public function store(Request $request)
    {


        $validated = $request->validate([


            'requisition_id'
            =>
            'required|exists:purchase_requisitions,id',


            'supplier_id'
            =>
            'required|exists:suppliers,id',


            'order_date'
            =>
            'required|date',


        ]);



        $count = PurchaseOrder::count() + 1;



        PurchaseOrder::create([


            'po_no'
            =>
            'PO-' . str_pad(
                $count,
                5,
                '0',
                STR_PAD_LEFT
            ),


            'requisition_id'
            =>
            $validated['requisition_id'],


            'supplier_id'
            =>
            $validated['supplier_id'],


            'order_date'
            =>
            $validated['order_date']


        ]);




        return redirect()

            ->route('purchase-orders.index')

            ->with(
                'success',
                'Purchase Order created successfully.'
            );
    }
}
