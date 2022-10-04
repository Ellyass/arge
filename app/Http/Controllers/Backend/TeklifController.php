<?php

namespace App\Http\Controllers\Backend;

use App\Exports\TeklifReport;
use App\Http\Controllers\Controller;
use App\Models\Agreement;
use App\Models\CallExplanation;
use App\Models\OfferPdf;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Offer;
use App\Models\Explanation;
use App\Models\CustomerEmail;
use App\Models\TargetSeller;
use App\Models\OfferFile;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;
use File;
use Prophecy\Call\Call;
use Excel;


class TeklifController extends Controller
{

    public function offer_detail_delete(Request $request, $id)
    {
        OfferFile::where('id', $id)->delete([]);
        return back()->with('success', 'İşlem Başarılı');
    }


    public function delete($id)
    {
        $offer = Offer::where('id', $id)->delete();
        $file = OfferFile::where('offer_id', $id)->delete();
        $explanations = Explanation::where('offer_id', $id)->delete();
        if ($offer) {
//            return redirect(route('offer_index'));
            return back()->with('success', 'İşlem Başarılı');
        }
    }


    public function index()
    {

        $error = 0;
        $targets = TargetSeller::select('id', 'user_id')->get();
        $user_id = Auth::user()->id;

        foreach ($targets as $target) {
            if ($user_id == $target->user_id) {
                $id = $target->id;
            }
        }
        if (Auth::user()->power_status == 1 || Auth::user()->power_status == 2) {
            $products = Product::all();
            $offers = Offer::with('tproduct')->orderBy('id', 'DESC')->get();
            return view('backend.offer.index', compact('offers'));
        } else {
            $products = Product::all();
            if (isset($id)) {
                $offers = Offer::with('tproduct')->orderBy('id', 'DESC')->where('target_seller_id', $id)->get();
                if ($offers->count() == 0) {
                    $error = 1;
                }
            }

//        return view('backend.offer.index',compact('offers','products','error'));
            return view('backend.offer.index', compact('offers'));
        }
    }


    public function offersIndex($id)
    {
        $products = Product::all();
        $sellers = TargetSeller::where('target_status', '1')->get();
        $customers = Customer::orderBy('name', 'ASC')->get();

        switch ($id) {
            case 1 :
            {
                return view('backend.offer.forms.new_tesvik_create', compact('customers', 'sellers', 'products'));
            }

            case 2 :
            {
                return view('backend.offer.forms.new_kvkk_create', compact('customers', 'sellers', 'products'));
            }

            case 3 :
            {
                return view('backend.offer.forms.new_bordroloma_create', compact('customers', 'sellers', 'products'));
            }
            case 4 :
            {
                return view('backend.offer.forms.new_ikmetrik_create', compact('customers', 'sellers', 'products'));
            }
            case 5 :
            {
                return view('backend.offer.forms.new_performans_create', compact('customers', 'sellers', 'products'));
            }
            case 6 :
            {
                return view('backend.offer.forms.new_danismanlik_create', compact('customers', 'sellers', 'products'));
            }
            case 7 :
            {
                return view('backend.offer.forms.new_egitim_create', compact('customers', 'sellers', 'products'));
            }
            case 8 :
            {
                return view('backend.offer.forms.new_iys_create', compact('customers', 'sellers', 'products'));
            }
            case 9:
            {
                return view('backend.offer.forms.new_mesem_create', compact('customers', 'sellers', 'products'));
            }
            case 10 :
            {
                return view('backend.offer.forms.new_ebordro_create', compact('customers', 'sellers', 'products'));
            }
            case 11 :
            {
                return view('backend.offer.forms.new_dtesvik_create', compact('customers', 'sellers', 'products'));
            }
            case 12 :
            {
                return view('backend.offer.forms.new_dkvkk_create', compact('customers', 'sellers', 'products'));
            }
        }
    }


    public function import(Request $request)
    {
        $birim = $_POST['offer_amount'];
        $money = $_POST['offer_money'];
        $total = $money * (int)$birim;


        if ($request->hasFile('offer_file')) {
            $request->validate([
                'offer_file' => 'required|file|mimes:word|max:10000'
            ]);

            $file = $request->file('offer_file');
            $filename = uniqid() . '.' . $request->offer_file->getClientOriginalExtension();
            $filePath = public_path() . '/word/';
            $file->move($filePath, $filename);
            $file = $filename;
        }
        $offer = Offer::create([
            "customer_id" => $request->customer_id,
            "offer_amount" => $birim,
            "user_id" => Auth::user()->id,
            "offer_money" => $money,
            "offer_total" => $total,
            "offer_date" => $request->offer_date,
            "product" => $request->product,
            "offer_status" => 1,
            "target_seller_id" => $request->Seller,
            "kdv" => $request->kdv
        ]);

        $offer_file = OfferFile::create([
            "customer_id" => $request->customer_id,
            "offer_id" => $offer->id,
            "offer_file" => $filename
        ]);

        $explanitons = Explanation::create([
            "offer_id" => $offer->id,
            "explanation" => $request->offer_explanation
        ]);


        if ($offer) {
            return redirect(route('offer_index'))->with('success', 'Teklif Kaydetme İşlemi Başarılı');
        } else {
            return redirect(route('offer_create'))->with('danger', 'Teklif Kaydetme İşlemi Başarısız');
        }
    }


    public function create()
    {
        $products = Product::all();
        $sellers = TargetSeller::where('target_status', '1')->get();
        $customers = Customer::orderBy('name', 'ASC')->get();
        return view('backend.offer.offer_create', compact('customers', 'sellers', 'products'));
    }


    public function newcreate()
    {
        $products = Product::all();
        $sellers = TargetSeller::where('target_status', 1)->get();
        $customers = Customer::orderBy('name', 'ASC')->get();
        return view('backend.offer.offer_new_create', compact('customers', 'sellers'));
    }


    public function jquery(Request $request)
    {
        $offer_data = Offer::select();

        $mounth = $_POST['mounth'];
        $product = $_POST['product'];
        $year = $_POST['year'];
        $status = $_POST['status'];


        if (!empty($mounth)) {
            $offer_data->whereMonth('offer_date', $mounth)->sum('offer_total');
        }
        if (!empty($product)) {
            $offer_data->where('product', $product)->sum('offer_total');
        }
        if (!empty($year)) {
            $offer_data->whereYear('offer_date', $year)->sum('offer_total');
        }
        if (!empty($status)) {
            $offer_data->where('offer_status', $status)->sum('offer_total');
        }

        $jquerys = $offer_data->get();
        $products = Product::all();

        return view('backend.offer.jquery', compact('jquerys', 'products'));
    }


    public function edit($id, $case)
    {
        $offer = Offer::find($id);
        $customers = Customer::where('id', $offer->customer_id)->first();
        $sellers = TargetSeller::where('target_status', '1')->get();

        switch ($case) {
            case 1 :
            {
                return view('backend.offer.edit.tesvik_edit', compact('sellers', 'offer', 'customers'));
            }
            case 2:
            {
                return view('backend.offer.edit.kvkk_edit', compact('sellers', 'offer', 'customers'));
            }
            case 3:
            {
                return view('backend.offer.edit.egitim_edit', compact('sellers', 'offer', 'customers'));
            }
            case 4:
            {
                return view('backend.offer.edit.bordro_edit', compact('sellers', 'offer', 'customers'));
            }
            case 5:
            {
                return view('backend.offer.edit.danismanlik_edit', compact('sellers', 'offer', 'customers'));
            }
            case 6:
            {
                return view('backend.offer.edit.ikmetrik_edit', compact('sellers', 'offer', 'customers'));
            }
            case 7:
            {
                return view('backend.offer.edit.iys_edit', compact('sellers', 'offer', 'customers'));
            }
            case 9:
            {
                return view('backend.offer.edit.performans_edit', compact('sellers', 'offer', 'customers'));
            }
            case 10:
            {
                return view('backend.offer.edit.ebordro_edit', compact('sellers', 'offer', 'customers'));
            }
            case 11:
            {
                return view('backend.offer.edit.dkvkk_edit', compact('sellers', 'offer', 'customers'));
            }
            case 12:
            {
                return view('backend.offer.edit.dtesvik_edit', compact('sellers', 'offer', 'customers'));
            }
            case 13:
            {
                return view('backend.offer.edit.mesem_edit', compact('sellers', 'offer', 'customers'));
            }
        }
    }


//    public function contract_upload($id)
//    {
//        $offer = Offer::find($id);
//        $sellers = TargetSeller::where('target_status','1')->get();
//        return view('backend.offer.contract_upload',compact('offer','sellers'));
//    }

    public function status($id)
    {
        $status = Offer::where('id', $id)->get();
        return view('backend.offer.status', compact('status'));

    }


    public function up(Request $request, $id)
    {
        $customer = Offer::where('id', $id)->first();

        $status = Offer::where('id', $id)->update([
            'offer_status' => $request->offer_status
        ]);

        if ($request->offer_status == 2) {
            $customer = Customer::where('id', $customer->customer_id)->update([
                'status' => '2'
            ]);
            if ($customer) {
                return redirect(route('offer_index'));
            } else {
                return back()->with('error', 'İşleminiz yapılamadı.');
            }
        } else {
            return redirect(route('offer_index'));
        }
    }


    public function update(Request $request)
    {

        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        if ($request->product == 1) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\tesvik.docx'));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('accept_type', isset($request->accept_type) ? $request->accept_type == 'Aylık' ? number_format($request->offer_money, 2, ',', '.') . ' ₺ ' . '/ ' . $request->accept_type : ' % ' . $request->offer_money : '');
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));

            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads' . '/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);

            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                    'offer_file' => $path
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads'. '/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//tesvik
        if ($request->product == 2) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\KVKK.docx'));
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('offer_money', number_format($request->offer_money, 2, ',', '.') . ' ₺');
            $newtesvik->setValue('yuzdelik', $request->yuzdelik);
            $newtesvik->setValue('home', $request->home);
            $newtesvik->setValue('kdv', $request->kdv);

            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));

            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);


            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);


            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                    'offer_file' => $path
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->offer_explanation
                    ]);
                }
            }
            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//kvkk
        if ($request->product == 3) {

            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);


            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'Güncelleme İşlemi Başarılı');
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//egitim
        if ($request->product == 4) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\bordrolama .docx'));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('bordro_type', isset($request->bordro_type) ? $request->bordro_type == 'bordro_ucret' ? 'Bordro Başı Ücret' . ' ' . $request->offer_money . ' ₺' : number_format($request->offer_money, 2, ',', '.') . '₺' : '');
//            $newtesvik->setValue('tesvik_type', $offer_type);
            $newtesvik->setValue('tesvik_money', $request->tesvik_money);
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            //$newtesvik->setValue('offer_explanation', $request->offer_explanation);


            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);

            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                    'offer_file' => $path
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//bordrolama
        if ($request->product == 5) {
            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);


            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'Güncelleme İşlemi Başarılı');
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//danışmanlık
        if ($request->product == 6) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\ikmetrik.docx'));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));



            $summary_ckeditor = str_replace(["\r\n", "\n", "\r", "\t", "&nbsp;", "<caption>", "</caption>", "<p>", "</p>"], '', $request->summary_ckeditor);
            preg_match("/<tbody>(.*)<\/tbody>/", $summary_ckeditor, $summary_ckeditor_tbody);
            preg_match_all("/<tr>(.*?)<\/tr>/", $summary_ckeditor_tbody[1], $summary_ckeditor_tr);

            $table = new Table([
                'borderSize' => 6,
                'borderColor' => 'black',
                'cellMargin' => 80,
                'valign' => 'center'
            ]);

            foreach ($summary_ckeditor_tr[1] as $tr) {
                $table->addRow();
                preg_match_all("/<td>(.*?)<\/td>/", $tr, $summary_ckeditor_td);
                foreach ($summary_ckeditor_td[1] as $td) {

                    $table->addCell(1750)->addText(strip_tags($td), ['bold' => strstr($td, "strong") ? true : false]);
                }
            }

            $newtesvik->setComplexBlock('summary_ckeditor', $table);

            $newtesvik->SaveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);


            $updates = Offer::update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => isset($request->month_free) ? $request->month_free : $request->year_free,
                'offer_total' => isset($request->month_free) ? $request->month_free : $request->year_free,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $request->offer_id,
                    'offer_file' => $path
                ]);
                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }
            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//ikmetrik
        if ($request->product == 7) {
            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'Güncelleme İşlemi Başarılı');
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//iys
        if ($request->product == 9) {
            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'Güncelleme İşlemi Başarılı');
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//performans
        if ($request->product == 10) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\ebordro.docx'));
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('offer_money', number_format($request->offer_money, 2, ',', '.') . ' ₺');
            $newtesvik->setValue('offer_tur', $request->offer_tur);
            $newtesvik->setValue('kdv', $request->kdv);


            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);

            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $request->offer_id,
                    'offer_file' => $path
                ]);
                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//e/bordro
        if ($request->product == 11) {

            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\dkvkk.docx'));
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('accept_type', $request->accept_type);
            $newtesvik->setValue('offer_money', $request->offer_money . ' ₺');
            $newtesvik->setValue('offer_yazılım', $request->offer_yazılım . ' ₺');

            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);


            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $request->offer_id,
                    'offer_file' => $path
                ]);
                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }
            if ($explanations) {
                return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//dkvkk
        if ($request->product == 12) {
            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => null,
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offer->id,
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'Güncelleme İşlemi Başarılı');
            } else {
                return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
            }
        }
//dtesvik
        if ($request->product == 13) {
            File::makeDirectory('public/storage/uploads/offer_uploads' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor(Storage::disk('storage')->path('offer_documents\mesem.docx'));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('accept_type', isset($request->accept_type) ? $request->accept_type == 'Aylık' ? number_format($request->offer_money, 2, ',', '.') . ' ₺ ' . '/ ' . $request->accept_type : ' % ' . $request->offer_money : '');
//            $newtesvik->setValue('deger_money',$request->offer_money);
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            //$newtesvik->setValue('offer_explanation', $request->offer_explanation);


            $newtesvik->saveAs(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
            $path = 'offer_uploads' . $customer->id . '/' . $random_new_tesvik . '.docx';
//            session(['offer_file_path' => $path]);


            $updates = Offer::where('id', $request->offer_id)->update([
                'customer_id' => $request->customer_id,
                'user_id' => $seller->user_id,
                'target_seller_id' => $request->target_Seller_id,
                'offer_money' => $request->offer_money,
                'offer_total' => $request->offer_money,
                'offer_date' => $request->offer_date,
                'product' => $request->product,
                'offer_status' => '1',
                'kdv' => ($request->kdv == 'KDV DAHİLDİR') ? '1' : '2',
                'accept_type' => $request->accept_type
            ]);

            if ($updates) {
                $update = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $request->offer_id,
                    'offer_file' => $path
                ]);

                if ($update) {
                    $explanations = Explanation::create([
                        'offer_id' => $request->offer_id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
                if ($explanations) {
                    return response()->download(Storage::disk('storage')->path('offer_uploads/' . $customer->id . '/' . $random_new_tesvik . '.docx'));
                } else {
                    return redirect(route('offer_index'))->with('error', 'Güncelleme İşlemi Başarısız');
                }
            }
        }
//mesem
    }


    public function file($id)
    {
        $offer = Offer::find($id);
        $call = CallExplanation::where('offer_id', $offer->id)->get();
        $customer = Customer::where('id', $offer->customer_id);
        return view('backend.offer.detail', compact('offer', 'customer', 'call'));
    }


    public function callExplanation(Request $request)
    {
        $call = CallExplanation::where('offer_id', $request->offer_id)->get();
        $offer = Offer::where('id', $request->offer_id)->first();
        $customer = Customer::where('id', $request->customer_id)->first();


        $calls = CallExplanation::create([
            'customer_id' => $request->customer_id,
            'offer_id' => $request->offer_id,
            'call_explanation' => isset($request->call_explanation) ? $request->call_explanation : ' '
        ]);
        $id = $request->offer_id;

        return redirect(route('nots', ['id' => $id]));
    }


    public function callss($id)
    {
        $call = CallExplanation::where('offer_id', $id)->orderBy('id', 'ASC')->get();
        $offer = Offer::where('id', $id)->first();
        $customer = Customer::where('id', $offer->customer_id)->first();

        return view('backend.offer.detail', compact('call', 'offer', 'customer'))->with('success', 'İşlem Başarılı');
    }


    public function teklifReport(Request $request)
    {
        $datas = $request;

        $offers = Offer::whereBetween('offer_date', [date('Y-m-d', strtotime($request->first_date)), date('Y-m-d', strtotime($request->last_date))])
            ->whereIn('product', $request->types)
            ->whereIn('offer_status', $request->status)
            ->get();

        return Excel::download(new TeklifReport($offers, $datas), 'Teklifler.xlsx');

    }


    public function agreement($id)
    {
        $offer = Offer::find($id);
        return view('backend.offer.offer_agreement',compact('offer'));
    }


    public function agreementpost(Request $request)
    {
        File::makeDirectory('pdf/' . $request->customer_id, 0777, true, true);
       // $file_name = uniqid().'.'.$request->offer_file->getClientOriginalExtension();
        $file_name = $request->offer_file->getClientOriginalName();
        $request->offer_file->move(public_path('pdf/'.$request->customer_id.'/'),$file_name);
        $pdf=OfferPdf::create([
            'offer_id' => $request->offer_id,
            'customer_id' => $request->customer_id,
            'offer_pdf' => 'pdf/'.$request->customer_id.'/'.$file_name
        ]);
        if($pdf)
        {
            return redirect(route('offer_index'))->with('success','işlem başarılı');
        }
    }

}

