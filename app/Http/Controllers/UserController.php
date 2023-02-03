<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Customer;
use App\Models\WorkOrder;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index() {
        try{
            $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->get();
            $workOrderCount = count($work_orders);
            $completedWorkOrders = $work_orders->where('complete', 1);
            $completedCount = count($completedWorkOrders);
            return view('dashboard', [
                'total' => $workOrderCount,
                'complete' => $completedCount
            ]);
        }
        catch(Exception $e) {
            return view('dashboard');
        }
    }

    public function workOrders() {
        $work_orders = WorkOrder::oldest()->filter(request(['search']))->get();
        return view('workOrders', [
            'work_order' => $work_orders
        ]);
    }

    public function customers() {
        $customers = Customer::orderBy('customer_name')->filter(request(['search']))->get();
        return view('customers', [
            'customers' => $customers
        ]);
    }

    

    public function workOrder($id, $customer = null) {
        $work_order = WorkOrder::find($id);     
            $customer = Customer::find($customer);
            $assignedEmployee = User::find($work_order->employee_id);
            return view('workOrder', [
                'full_order' => $work_order,
                'customer' => $customer,
                'assignedEmployee' => $assignedEmployee
            ]);   
    }

    public function assignedWorkOrders() {
        $work_orders = WorkOrder::where('employee_id', Auth()->user()->id)->filter(request(['search']))->get();
        $workOrderCount = count($work_orders);
        $completedWorkOrders = $work_orders->where('complete', 1);
        $completedCount = count($completedWorkOrders);
       return view('assignedWorkOrders', [
        'work_order' => $work_orders,
        'total' => $workOrderCount,
        'complete' => $completedCount
       ]);
    }

    public function createWorkOrder() {

        return view('create.workOrder', [
            'customers' => Customer::all(),
            'departments' => Department::all(),
            'employees' => User::where('is_admin', 0)->get()
        ]);
    }

    public function createCustomer() {
        if(Auth()->user()->is_admin == 1){
            return view('create.customer'
            );
        }
        else {
            return view('/dashboard');
        }
    }

    public function store(Request $request) {
        $workOrder = new WorkOrder();
        $workOrder->description = $request->description; 
        $workOrder->notes = $request->notes;
        $workOrder->address = $request->address; 
        $workOrder->yard_repair = $request->yard_repair;
        if($request->complete == null) {
            $workOrder->complete = 0;
        }
        if($request->complete == "on") {
            $workOrder->complete = 1;
        }
        if($request->priority == null) {
            $workOrder->priority = 0;
        }
        if($request->priority == "on") {
            $workOrder->priority = 1;
        }
        if($request->employee != null) {
            $workOrder->employee_id = $request->employee;
        }
        if($request->customer != null){
            $workOrder->customer_id = $request->customer; 
                
        }       

        if($request->work_performed != null) {
            $workOrder->work_performed = $request->work_performed;
        }

        if($request->department == "water") {
            $workOrder->water = 1;
        }
        elseif($request->department == "gas") {
            $workOrder->gas = 1;
        }
        elseif($request->department == "street") {
            $workOrder->street = 1;
        }
        elseif($request->department == "sewer") {
            $workOrder->sewer = 1;
        }

       $workOrder->save();

        return redirect('/index');        
    }

    public function edit($id) {
        $workId = Crypt::decrypt($id);
        $workOrder = WorkOrder::find($workId);
        $currentCustomer = Customer::where('id', $workOrder->customer_id)->first();
        $employees = User::where('is_admin', 0)->get();
        if($currentCustomer){               
                    return view('edit', [
                        'work_order' => $workOrder,
                        'departments' => Department::all(),
                        'customers' => Customer::all(),
                        'current_customer' => $currentCustomer,
                        'employees' => $employees
                    ]);    
                    
            }
        else {
            
                return view('edit', [
                    'work_order' => $workOrder,
                    'departments' => Department::all(),
                    'customers' => Customer::all(),
                    'employees' => $employees
                ]);
            
        }
       
    }

    public function update(Request $request) {
        $workOrder = WorkOrder::find($request->id);
        $workOrder->description = $request->description; 
        $workOrder->notes = $request->notes;
        $workOrder->address = $request->address; 
        $workOrder->yard_repair = $request->yard_repair;
        if($request->complete == null) {
            $workOrder->complete = 0;
        }
        if($request->complete == "on") {
            $workOrder->complete = 1;
        }
        if($request->priority == null) {
            $workOrder->priority = 0;
        }
        if($request->priority == "on") {
            $workOrder->priority = 1;
        }
       if($request->employee != null) {
        $workOrder->employee_id = $request->employee;
       }
       
        if($request->customer != null){
            $workOrder->customer_id = $request->customer; 
                
        }       

        if($request->work_performed != null) {
            $workOrder->work_performed = $request->work_performed;
        }

        if($request->department == "water") {
            $workOrder->water = 1;
        }
        elseif($request->department == "gas") {
            $workOrder->gas = 1;
        }
        elseif($request->department == "street") {
            $workOrder->street = 1;
        }
        elseif($request->department == "sewer") {
            $workOrder->sewer = 1;
        }

       $workOrder->save();

        return redirect('/index');        
    }

    public function areYouSure($id) {
        if(Auth()->user()->is_admin == 1) {
            $work = WorkOrder::find($id);
            return view('areYouSure', [
                'work' => $work
            ]);
        }
    }

    public function destroy($id) {
        if(Auth()->user()->is_admin == 1) {
            WorkOrder::find($id)->delete();
            return redirect('/manage');
        }
        else {
            return redirect('/manage')->with('message', 'You do not have adminstrator rights.');
        }
    }

    
    public function storeCustomer(Request $request) {
        $newCustomer = new Customer();
        $newCustomer->customer_name = $request->customer_name;
        $newCustomer->address = $request->address;
        $newCustomer->phone_number = $request->phone_number;
        $newCustomer->save();
        return back()->with('message', 'New customer created!');
        
    }

   

    
}
