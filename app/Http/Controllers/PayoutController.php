<?php

namespace App\Http\Controllers;

use App\Account;

use App\AccountTransaction;
use App\BusinessLocation;
use App\ExpenseCategory;
use App\TaxRate;
use App\Transaction;
use App\User;
use App\Utils\ModuleUtil;
use App\Utils\TransactionUtil;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use App\Contact;

class PayoutController extends Controller
{
    /**
    * Constructor
    *
    * @param TransactionUtil $transactionUtil
    * @return void
    */
    public function __construct(TransactionUtil $transactionUtil, ModuleUtil $moduleUtil)
    {
        $this->transactionUtil = $transactionUtil;
        $this->moduleUtil = $moduleUtil;
        $this->dummyPaymentLine = ['method' => 'cash', 'amount' => 0, 'note' => '', 'card_transaction_number' => '', 'card_number' => '', 'card_type' => '', 'card_holder_name' => '', 'card_month' => '', 'card_year' => '', 'card_security' => '', 'cheque_number' => '', 'bank_account_number' => '',
        'is_return' => 0, 'transaction_no' => ''];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_id = request()->session()->get('user.business_id');
        $objPayouts=DB::table('payouts')->where('business_id', $business_id)->orderBy('id','desc')->get();
        $cashRegObj=DB::table('cash_registers')->orderBy('id','desc')->first();
        return view('payout.index',compact('cashRegObj','objPayouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('expense.add')) {
            $output = ['success' => 0,
                            'msg' => __("Acess Denied")
                        ];
                        
        return redirect('home')->with('status', $output);
        }

        $business_id = request()->session()->get('user.business_id');
        
        //Check if subscribed or not
        if (!$this->moduleUtil->isSubscribed($business_id)) {
            return $this->moduleUtil->expiredResponse(action('ExpenseController@index'));
        }

        $business_locations = BusinessLocation::forDropdown($business_id, false, true);

        $bl_attributes = $business_locations['attributes'];
        $business_locations = $business_locations['locations'];

        $expense_categories = ExpenseCategory::where('business_id', $business_id)
                                ->pluck('name', 'id');
        $users = User::forDropdown($business_id, true, true);

        $taxes = TaxRate::forBusinessDropdown($business_id, true, true);
        
        $payment_line = $this->dummyPaymentLine;

        $payment_types = $this->transactionUtil->payment_types(null, false, $business_id);

        $contacts = Contact::contactDropdown($business_id, false, false);

        //Accounts
        $accounts = [];
        if ($this->moduleUtil->isModuleEnabled('account')) {
            $accounts = Account::forDropdown($business_id, true, false, true);
        }

        return view('payout.create')
            ->with(compact('expense_categories', 'business_locations', 'users', 'taxes', 'payment_line', 'payment_types', 'accounts', 'bl_attributes', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('payout.add')) {
            $output = ['success' => 0,
                            'msg' => __("Acess Denied")
                        ];
                        
        return redirect('home')->with('status', $output);
        }

        try {
              $cashRegObj = DB::table('cash_registers')
                                ->where('user_id', auth()->user()->id)
                                ->where('status', 'open')
                                ->orderBy('id','desc')
                                ->first();
              $business_id = request()->session()->get('user.business_id');
              $user_id=auth()->user()->id;
              $fname=auth()->user()->first_name;
              $lname=auth()->user()->last_name;
              $name=$fname." ".$lname;
              //$cashRegObj=DB::table('cash_registers')->orderBy('id','desc')->first();
              DB::table('payouts')->insert(['amount'=>$request->amount,'detail'=>$request->detail,'person_name'=>$request->borrowername,'cash_register_id'=>$cashRegObj->id,'cash_status'=>0,'staff_name'=>$name,'user_id'=>$user_id,'business_id'=>$business_id]);
              //$objtransac=DB::table('cash_register_transactions')->orderBy('id','desc')->first();
              //$transaction_id=$objtransac->transaction_id;
              //DB::table('cash_register_transactions')->insert(['cash_register_id'=>$objtransac->cash_register_id,'amount'=>$request->amount,'pay_method'=>'borrow','type'=>'debit','transaction_type'=>'buy','transaction_id'=>$transaction_id+1]);
              $output = ['success' => 1,
                         'msg' => 'Successfully added payouts!'
                        ];
              if(isset($request->payout_popup) && $request->payout_popup == "payout-popup") {
                return redirect('pos/create')->with('status', $output);    
              }            
              return redirect('payouts')->with('status', $output);            
              //return redirect()->back()->with(['success'=>'Successfully added payouts!']);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = ['success' => 0,
                            'msg' => __('messages.something_went_wrong')
                        ];
        }

        return redirect('payouts')->with('status', $output);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('expense.edit')) {
            $output = ['success' => 0,
                            'msg' => __("Acess Denied")
                        ];
                        
        return redirect('home')->with('status', $output);
        }

        $business_id = request()->session()->get('user.business_id');

        //Check if subscribed or not
        if (!$this->moduleUtil->isSubscribed($business_id)) {
            return $this->moduleUtil->expiredResponse(action('ExpenseController@index'));
        }

        $business_locations = BusinessLocation::forDropdown($business_id);

        $expense_categories = ExpenseCategory::where('business_id', $business_id)
                                ->pluck('name', 'id');
        $expense = Transaction::where('business_id', $business_id)
                                ->where('id', $id)
                                ->first();

        $users = User::forDropdown($business_id, true, true);

        $taxes = TaxRate::forBusinessDropdown($business_id, true, true);

        $contacts = Contact::contactDropdown($business_id, false, false);

        return view('expense.edit')
            ->with(compact('expense', 'expense_categories', 'business_locations', 'users', 'taxes', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('expense.edit')) {
            $output = ['success' => 0,
                            'msg' => __("Acess Denied")
                        ];
                        
        return redirect('home')->with('status', $output);
        }

        try {
            //Validate document size
            $request->validate([
                'document' => 'file|max:'. (config('constants.document_size_limit') / 1000)
            ]);
            
            $business_id = $request->session()->get('user.business_id');
            
            //Check if subscribed or not
            if (!$this->moduleUtil->isSubscribed($business_id)) {
                return $this->moduleUtil->expiredResponse(action('ExpenseController@index'));
            }

            $expense = $this->transactionUtil->updateExpense($request, $id, $business_id);

            $this->transactionUtil->activityLog($expense, 'edited');

            $output = ['success' => 1,
                            'msg' => __('expense.expense_update_success')
                        ];
        } catch (\Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
            $output = ['success' => 0,
                            'msg' => __('messages.something_went_wrong')
                        ];
        }

        return redirect('expenses')->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('expense.delete')) {
            $output = ['success' => 0,
                            'msg' => __("Acess Denied")
                        ];
                        
        return redirect('home')->with('status', $output);
        }

        if (request()->ajax()) {
            try {
                $business_id = request()->session()->get('user.business_id');

                $expense = Transaction::where('business_id', $business_id)
                                        ->where(function($q) {
                                            $q->where('type', 'expense')
                                                ->orWhere('type', 'expense_refund');
                                        })
                                        ->where('id', $id)
                                        ->first();
                $expense->delete();

                //Delete account transactions
                AccountTransaction::where('transaction_id', $expense->id)->delete();

                $output = ['success' => true,
                            'msg' => __("expense.expense_delete_success")
                            ];
            } catch (\Exception $e) {
                \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return $output;
        }
    }
}
