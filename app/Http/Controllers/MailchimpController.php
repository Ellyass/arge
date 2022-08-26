<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Mailchimp;


class MailchimpController extends Controller
{

    public function mailchimp($customer_email, $op = 'create', $old_email = '')
    {

        $customer_type_text = '';
        if ($customer_email->customer->status == 'POTANSİYEL') {
            $customer_type_text = 'POTANSİYEL';
        } else {
            foreach($customer_email->customer->customer_types as $customer_type) {
                $customer_type_array[] = config('variables.crm.customer_types')[$customer_type->type];
            }
            if (isset($customer_type_array) and count($customer_type_array) > 0) {
                $customer_type_text = implode(',', $customer_type_array);
            }
        }




        $merge = [
            'FNAME' => $customer_email->customer->name,
            'YETKILI' => $customer_email->customer_official,
            'ADDRESS' => $customer_email->customer->address,
            'GSM' => $customer_email->mobile,
            'LTYPE' => $customer_type_text,
        ];
        if ($op == 'update') {

            if (strlen($old_email) > 0) {
                $lists = Mailchimp::getLists();
                $lst = $lists[0];
                $listId = $lst['id'];
                $result = Mailchimp::check($listId, $old_email);

                if ($result) {
                    Mailchimp::unsubscribe($listId, $old_email);
                }
            }
        }

        if ($op == 'destroy') {
            $merge = [
                'FNAME' => $customer_email->customer->name,
                'YETKILI' => $customer_email->customer_official,
                'ADDRESS' => $customer_email->customer->address,
                'GSM' => $customer_email->mobile,
                'LTYPE' => '',
            ];
            if (strlen($old_email) > 0) {
                $lists = Mailchimp::getLists();
                $lst = $lists[0];
                $listId = $lst['id'];
                $result = Mailchimp::check($listId, $old_email);

                if ($result) {
                    Mailchimp::subscribe($listId, $old_email, $merge, $confirm = false);
                }
            }

            return null;
        }

        $lists = Mailchimp::getLists();
        $lst = $lists[0];
        $listId = $lst['id'];
        Mailchimp::subscribe($listId, $customer_email->email, $merge, $confirm = false);
    }

}
