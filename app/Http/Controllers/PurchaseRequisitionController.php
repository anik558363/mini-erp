<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Employee;
use App\Models\PurchaseRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PurchaseRequisitionController extends Controller
{


    /**
     * PR List + Search + Filter
     */
    public function index(Request $request)
    {

        $prs = PurchaseRequisition::with([
                'employee',
                'department',
                'items'
            ])

            ->when($request->keyword, function ($query) use ($request) {

                $keyword = $request->keyword;


                $query->where(function ($q) use ($keyword) {


                    $q->where(
                        'requisition_no',
                        'like',
                        "%{$keyword}%"
                    )


                    ->orWhereHas('employee', function ($employee) use ($keyword) {

                        $employee->where(
                            'name',
                            'like',
                            "%{$keyword}%"
                        );

                    })


                    ->orWhereHas('department', function ($department) use ($keyword) {

                        $department->where(
                            'name',
                            'like',
                            "%{$keyword}%"
                        );

                    });


                });


            })


            ->when($request->status, function ($query) use ($request) {


                $query->where(
                    'status',
                    $request->status
                );


            })


            ->latest()
            ->paginate(10)
            ->withQueryString();



        return view(
            'purchase_requisitions.index',
            compact('prs')
        );

    }




    /**
     * Create PR Form
     */
    public function create()
    {

        $employees = Employee::with('department')
            ->get();


        $products = Product::all();



        return view(
            'purchase_requisitions.create',
            compact(
                'employees',
                'products'
            )
        );

    }





    /**
     * Store PR
     */
    public function store(Request $request)
    {


        $request->validate([


            'employee_id' => [
                'required',
                'exists:employees,id'
            ],


            'products' => [
                'required',
                'array',
                'min:1'
            ],


            'products.*.product_id' => [
                'required',
                'exists:products,id'
            ],


            'products.*.quantity' => [
                'required',
                'integer',
                'min:1'
            ],


        ]);




        // Duplicate Product Check

        $productIds = collect($request->products)
            ->pluck('product_id');



        if ($productIds->count() != $productIds->unique()->count()) {


            return back()
                ->withErrors([
                    'products' => 'Duplicate products are not allowed.'
                ])
                ->withInput();

        }




        DB::transaction(function () use ($request) {


            $employee = Employee::findOrFail(
                $request->employee_id
            );



            // Generate PR Number

            $lastPR = PurchaseRequisition::latest('id')
                ->first();



            $number = $lastPR
                ? $lastPR->id + 1
                : 1;



            $prNumber = 'PR-' . str_pad(
                $number,
                5,
                '0',
                STR_PAD_LEFT
            );





            $pr = PurchaseRequisition::create([


                'requisition_no' => $prNumber,


                'employee_id' =>
                    $employee->id,


                'department_id' =>
                    $employee->department_id,


                'status' => 'pending'


            ]);





            foreach ($request->products as $item) {


                $pr->items()->create([


                    'product_id' =>
                        $item['product_id'],


                    'quantity' =>
                        $item['quantity'],


                    'remarks' =>
                        $item['remarks'] ?? null,


                ]);


            }



        });





        return redirect()

            ->route('purchase-requisitions.index')

            ->with(
                'success',
                'Purchase Requisition created successfully.'
            );


    }






    /**
     * Approve PR
     */
    public function approve(PurchaseRequisition $purchaseRequisition)
    {


        if ($purchaseRequisition->status != 'pending') {


            return back()

                ->with(
                    'error',
                    'Only pending PR can be approved.'
                );

        }



        $purchaseRequisition->update([

            'status' => 'approved'

        ]);




        return back()

            ->with(
                'success',
                'Purchase Requisition approved successfully.'
            );


    }







    /**
     * Reject PR
     */
    public function reject(PurchaseRequisition $purchaseRequisition)
    {


        if ($purchaseRequisition->status != 'pending') {


            return back()

                ->with(
                    'error',
                    'Only pending PR can be rejected.'
                );

        }




        $purchaseRequisition->update([

            'status' => 'rejected'

        ]);




        return back()

            ->with(
                'success',
                'Purchase Requisition rejected successfully.'
            );


    }



}
