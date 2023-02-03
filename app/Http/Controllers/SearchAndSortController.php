<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class SearchAndSortController extends Controller
{
    public function filter(Request $request) {
        if($request->sort == "newest") {
            return view('workOrders', [
                'work_order' => WorkOrder::latest()->get()
            ]);
        }
        elseif($request->sort == "oldest") {
            return view('workOrders', [
                'work_order' => WorkOrder::oldest()->get()
            ]);
        }
        elseif($request->sort == 0) {
            return view('workOrders', [
                'work_order' => WorkOrder::where('priority', $request->sort)->get()
            ]);
        }
        elseif($request->sort == 1) {
            return view('workOrders', [
                'work_order' => WorkOrder::where('priority', $request->sort)->get()
            ]);
        }
        elseif($request->sort == "water") {
            return view('workOrders', [
                'work_order' => WorkOrder::where('water', 1)->get()
            ]);
        }
        elseif($request->sort == "sewer") {
            return view('workOrders', [
                'work_order' => WorkOrder::where('sewer', 1)->get()
            ]);
        }
        elseif($request->sort == "gas") {
            return view('workOrders', [
                'work_order' => WorkOrder::where('gas', 1)->get()
            ]);
        }
        elseif($request->sort == "street") {
            return view('workOrders', [
                'work_order' => WorkOrder::where('street', 1)->get()
            ]);
        }
    }

    public function sortManage(Request $request){
        if($request->sort == "newest") {
            return view('manage', [
                'work_order' => WorkOrder::latest()->get()
            ]);
        }
        elseif($request->sort == "oldest") {
            return view('manage', [
                'work_order' => WorkOrder::oldest()->get()
            ]);
        }
        elseif($request->sort == 0){
            return view('manage', [
                'work_order' => WorkOrder::where('complete', $request->sort)->get()
            ]);
        }
        elseif($request->sort == 1) {
            return view('manage', [
                'work_order' => WorkOrder::where('complete', $request->sort)->get()
            ]);
            }
            elseif($request->sort == "water") {
                return view('manage', [
                    'work_order' => WorkOrder::where('water', 1)->get()
                ]);
            }
            elseif($request->sort == "sewer") {
                return view('manage', [
                    'work_order' => WorkOrder::where('sewer', 1)->get()
                ]);
            }
            elseif($request->sort == "gas") {
                return view('manage', [
                    'work_order' => WorkOrder::where('gas', 1)->get()
                ]);
            }
            elseif($request->sort == "street") {
                return view('manage', [
                    'work_order' => WorkOrder::where('street', 1)->get()
                ]);
            }

    }

    public function assignedWorkOrdersSort(Request $request) {
        $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
        $workOrderCount = count($work_orders);
        $completedWorkOrders = $work_orders->where('complete', 1);
        $completedCount = count($completedWorkOrders);

        if($request->sort == "newest") {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->latest()->get();
            return view('assignedWorkOrders', [
                'work_order' => $work_orders,
                'total' => $workOrderCount,
                'complete' => $completedCount
            ]);
        }
        elseif($request->sort == "oldest") {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->oldest()->get();
            return view('assignedWorkOrders', [
                'work_order' => $work_orders,
                'total' => $workOrderCount,
                'complete' => $completedCount
            ]);
        }
        elseif($request->sort == 0) {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
            $incomplete = $work_orders->where('complete', $request->sort);
            return view('assignedWorkOrders', [
                'work_order' => $incomplete,
                'total' => $workOrderCount,
                'complete' => $completedCount
            ]);
        }
        elseif($request->sort == 1) {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
            $complete = $work_orders->where('complete', $request->sort);
            return view('assignedWorkOrders', [
                'work_order' => $complete,
                'total' => $workOrderCount,
                'complete' => $completedCount
            ]);
        }
    }

    public function employeeManage(Request $request) {
        if($request->sort == "newest") {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->latest()->get();
            return view('manage', [
                'work_order' => $work_orders
            ]);
        }
        elseif($request->sort == "oldest") {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->oldest()->get();
            return view('manage', [
                'work_order' => $work_orders
            ]);
        }
        elseif($request->sort == 0){
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
            $incomplete = $work_orders->where('complete', $request->sort);
            return view('manage', [
                'work_order' => $incomplete
            ]);
        }
        elseif($request->sort == 1) {
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
            $complete = $work_orders->where('complete', $request->sort);
            return view('manage', [
                'work_order' => $complete
            ]);
            }
    }

    public function sortCustomers(Request $request) {
        if($request->sort == "ascending") {
            $customers = Customer::orderBy('customer_name','asc')->get();
            return view('customers', [
                'customers' => $customers
            ]);
        }
        else {
            $customers = Customer::orderBy('customer_name', 'desc')->get();
            return view('customers', [
                'customers' => $customers
            ]);
        }
    }

    public function manage() {
        return view('manage', [
            'work_order' => WorkOrder::where('employee_id', Auth()->user()->id)->filter(request(['search']))->get()
        ]);
    }

    public function adminManage() {
            $adminWO = WorkOrder::latest()->filter(request(['search']))->get();
            return view('manage', [
                'work_order' => $adminWO
            ]);
        }
}
