<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerType;
use App\Models\Customer;
use App\Models\CustomerEmail;

//use MailChimp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomersController extends Controller
{
    public function add()
    {
        return view('backend.customers.customer_create');
    }


    public function create(Request $request)
    {
//        if (!$request->customer_types_id)
//        {
//            return back()->with('error','Herhangi Bir Modül Seçilmedi');
//        }
        $customers = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status,
            'is_deleted' => 0
        ]);
        if ($customers) {
            $customer_types_id = $request->customer_type_id;
            if (isset($customer_types_id) && count($customer_types_id) > 0) {
                foreach ($customer_types_id as $key => $customer_type_id) {
                    $customer_types = CustomerType::create([
                        'customer_id' => $customers->id,
                        'type' => $customer_type_id,
                    ]);
                }
                if ($customer_types) {
                    return redirect(route('customer_Index'))->with('success', 'İşlem Başarılı..');

                } else {
                    return back()->with('danger', 'İşlem başarısız.');

                }

            }

        } else {
            return back()->with('danger', 'İşlem başarısız.');
        }

    }


    public function index()
    {
        $customers = Customer::all();
        return view('backend.customers.index', compact('customers'));
    }


    public function edit($id)
    {
        $edit = Customer::where('id', $id)->first();
        return view('backend.customers.customer_edit', compact('edit'));
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customers_email = CustomerEmail::where('customer_id')->get();

        if ($request->isMethod('put')) {
            $this->validate($request, [
                'name' => 'required|unique:$customer,name,' . $customer->id,
            ]);
        }
        $updateData = [
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status,
            'is_deleted' => 0
        ];
        $customer->update($updateData);
        CustomerType::where('customer_id', $customer->id)->delete();

        if ($customer) {
            $customer_types_id = $request->customer_type_id;
            foreach ($customer_types_id as $key => $customer_type_id) {
                CustomerType::create([
                    'customer_id' => $customer->id,
                    'type' => $customer_type_id
                ]);
            }
        }
        return redirect(route('customer_Index'));
    }


    public function destroy($id)
    {
        $customers = Customer::find($id);

        $customers->update([
            'is_deleted' => $customers->is_deleted == 0 ? 1 : 0,
        ]);

//        foreach ($customers->customers_email as $customer_email)
//        {
//            $combine = [
//                'FNAME' => $customers->name,
//                'YETKILI' => $customer_email->customer_official,
//                'ADDRESS' => $customers->adress,
//                'GSM' => $customer_email->mobile,
//                'FTYPE' => ''
//            ];
//
//            $lists = MailChimp::getlists();
//            $lst = $lists[0];
//            $listId = $lst['id'];
//            $result = MailChimp::check($listId,$customer_email);
//
//            if($result)
//            {
//                MailChimp::subscribe($listId,$customer_email->email, $combine,$confirm = false);
//            }
//        }
        return back()->with('success', 'İşlem Başarılı..');


    }


}
