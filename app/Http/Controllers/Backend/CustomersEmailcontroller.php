<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use MailChimp;


class CustomersEmailcontroller extends Controller
{
    /**
     * @var bool
     */
    protected $hash_id = true;

    public function add()
    {
        return view('backend.customers.customers_email.customer_create');
    }


    public function index()
    {

        $customer_emails = CustomerEmail::orderBy('id', 'DESC')->get();
        return view('backend.customers.customers_email.index', compact('customer_emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        $datas = Customer::where('is_deleted', 0)->orderBy('name', 'ASC')->get();

        return view('backend.customers.customers_email.customer_create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerEmailRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $hata = Validator::make($request->all(),[
            'email'=>'email'
        ]);
        if ($hata->fails())
        {
              return back()->with('error','İşlem Başarısız');
        }


        $customer_email = CustomerEmail::create([
            'customer_id' => $request->customer_id,
            'customer_official' => $request->customer_official,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_deleted' => 0
        ]);

//        app('App\Http\Controllers\Backend\MailchimpController')->mailchimp($customer_email,'create',null);

        return redirect(route('email_Index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = CustomerEmail::where('id',$id)->first();
        $customers = Customer::where('id',$email->customer_id)->first();
        return view('backend.customers.customers_email.customer_edit',compact('email','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request,$id)
    {

        $customer_email = CustomerEmail::find($id);

        if ($request->isMethod('put')) {

            $this->validate($request, [
                'email' => 'required|unique:customer_emails,email,'.$customer_email->id,
            ]);
        }

        $updateData = [
            'customer_id' => $request->customer_id,
            'customer_official' => $request->customer_official,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_deleted' => 0
        ];
        $customer_email->update($updateData);

        return redirect(route('email_Index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustomerEmail $customer_email
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


       public function destroy($id)
   {
       $customers_email = CustomerEmail::find($id);

       $customers_email->update([
           'is_deleted' => $customers_email->is_deleted == 0 ? 1 : 0
       ]);

//       app('App\Http\Controllers\Backend\MailchimpController')->mailchimp($customers_email,'destroy',$customers_email);

        return back()->with('successs','İşlem Başarılı');


    }

}
