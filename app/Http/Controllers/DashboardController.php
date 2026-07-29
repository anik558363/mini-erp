<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseRequisition;
use App\Models\PurchaseOrder;

class DashboardController extends Controller
{

    public function index()
    {

        $totalProducts = Product::count();


        $totalSuppliers = Supplier::count();



        $pendingPR = PurchaseRequisition::where(
            'status',
            'pending'
        )->count();



        $approvedPR = PurchaseRequisition::where(
            'status',
            'approved'
        )->count();




        $recentOrders = PurchaseOrder::with([
            'supplier',
            'purchaseRequisition'
        ])
        ->latest()
        ->limit(5)
        ->get();




        return view(
            'dashboard.index',
            compact(
                'totalProducts',
                'totalSuppliers',
                'pendingPR',
                'approvedPR',
                'recentOrders'
            )
        );

    }

}
