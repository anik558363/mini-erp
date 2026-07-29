<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Employee;
use App\Models\PurchaseRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PurchaseRequisitionController extends Controller
{


    public function index()
    {

        $prs = PurchaseRequisition::with([
            'employee',
            'department',
            'items'
        ])
            ->latest()
            ->paginate(10);


        return view(
            'purchase_requisitions.index',
            compact('prs')
        );
    }




    public function create()
    {

        $employees = Employee::with('department')->get();

        $products = Product::all();


        return view(
            'purchase_requisitions.create',
            compact(
                'employees',
                'products'
            )
        );
    }




    public function store(Request $request)
    {


        $request->validate([


            'employee_id' => 'required|exists:employees,id',


            'products' => 'required|array',


            'products.*.product_id' => 'required|exists:products,id',


            'products.*.quantity' => 'required|integer|min:1',


        ]);



        DB::transaction(function () use ($request) {



            $lastId = PurchaseRequisition::count() + 1;



            $pr = PurchaseRequisition::create([

                'requisition_no' =>
                'PR-' . str_pad($lastId, 5, '0', STR_PAD_LEFT),


                'employee_id' => $request->employee_id,


                'department_id' =>
                Employee::find($request->employee_id)
                    ->department_id,


                'status' => 'pending'


            ]);





            foreach ($request->products as $item) {


                $pr->items()->create([

                    'product_id' => $item['product_id'],

                    'quantity' => $item['quantity'],

                    'remarks' => $item['remarks'] ?? null

                ]);
            }
        });



        return redirect()
            ->route('purchase-requisitions.index')
            ->with('success', 'PR created successfully');
    }
}
