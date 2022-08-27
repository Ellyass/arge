<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Explanation;
use App\Models\Offer;
use App\Models\Customer;
use App\Models\OfferFile;
use App\Models\Product;
use App\Models\TargetSeller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Style\TablePosition;
use File;


class DocumentController extends Controller
{

    public function index()
    {
        return view('backend.offer.index');
    }


    public function tesvik_word_data(Request $request)
    {

        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/tesvik.docx');
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('accept_type', isset($request->accept_type) ? $request->accept_type == 'Aylık' ? number_format($request->offer_money, 2, ',', '.') . ' ₺ ' . '/ ' . $request->accept_type : ' % ' . $request->offer_money : '');
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));

            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');
            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);


            $offers = Offer::create([
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

            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);

                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }
            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function kvkk_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/KVKK.docx');
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('offer_money', number_format($request->offer_money, 2, ',', '.') . ' ₺');
            $newtesvik->setValue('yuzdelik', $request->yuzdelik);
            $newtesvik->setValue('home', $request->home);
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_not', isset($request->offer_not) ? $request->offer_not : null);

            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');

            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);

            $offers = Offer::create([
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

            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);

                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function egitim_word_data(Request $request)
    {

        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        $offers = Offer::create([
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

        if ($offers) {
            $offer = OfferFile::create([
                'customer_id' => $request->customer_id,
                'offer_id' => $offers->id,
            ]);

            if ($offer) {
                $explanations = Explanation::create([
                    'offer_id' => $offers->id,
                    'date' => $request->offer_date,
                    'explanation' => $request->explanation
                ]);
            }
        }

        if ($explanations) {
            return redirect(route('offer_index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function bordrolama_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        $offer_type = '';
        switch ($request->tesvik_type) {
            case 'Ücretsiz':
                {
                    $offer_type = 'Ücretsiz';
                }
                break;
            case 'net_ucret_tesvik':
                {
                    $offer_type = number_format($request->tesvik_money, 2, ',', '.') . ' ₺';
                }
                break;
            case 'yuzdelik_ucret_tesvik':
                {
                    $offer_type = '% ' . $request->tesvik_money;
                }
                break;
        }

        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/bordrolama .docx');
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('bordro_type', isset($request->bordro_type) ? $request->bordro_type == 'bordro_ucret' ? 'Bordro Başı Ücret' . ' ' . $request->offer_money . ' ₺' : number_format($request->offer_money, 2, ',', '.') . 'TL' : '');
            $newtesvik->setValue('tesvik_type', $offer_type);
            $newtesvik->setValue('tesvik_money', $request->tesvik_money);
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            //$newtesvik->setValue('offer_explanation', $request->offer_explanation);


            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');
            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);

            $offers = Offer::create([
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

//dd($offers);
            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);
                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }


            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function danismanlik_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        $offers = Offer::create([
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

        if ($offers) {
            $offer = OfferFile::create([
                'customer_id' => $request->customer_id,
                'offer_id' => $offers->id,
            ]);

            if ($offer) {
                $explanations = Explanation::create([
                    'offer_id' => $offers->id,
                    'date' => $request->offer_date,
                    'explanation' => $request->explanation
                ]);
            }
        }

        if ($explanations) {
            return redirect(route('offer_index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function ikmetrik_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/ikmetrik.docx');
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('summary_ckeditor', $request->summary_ckeditor);


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

            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');
            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);


            $offers = Offer::create([
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

//dd($offers);
            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);
                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function iys_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        $offers = Offer::create([
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

        if ($offers) {
            $offer = OfferFile::create([
                'customer_id' => $request->customer_id,
                'offer_id' => $offers->id,
            ]);

            if ($offer) {
                $explanations = Explanation::create([
                    'offer_id' => $offers->id,
                    'date' => $request->offer_date,
                    'explanation' => $request->explanation
                ]);
            }
        }

        if ($explanations) {
            return redirect(route('offer_index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function ebordro_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/ebordro.docx');
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('offer_money', number_format($request->offer_money, 2, ',', '.') . ' ₺');
            $newtesvik->setValue('offer_tur', $request->offer_tur);
            $newtesvik->setValue('kdv', $request->kdv);


            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');

            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);


            $offers = Offer::create([
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


            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);
                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }


            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function performans_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        $offers = Offer::create([
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

        if ($offers) {
            $offer = OfferFile::create([
                'customer_id' => $request->customer_id,
                'offer_id' => $offers->id,
            ]);
            if ($offer) {
                $explanations = Explanation::create([
                    'offer_id' => $offers->id,
                    'date' => $request->offer_date,
                    'explanation' => $request->explanation
                ]);
            }
        }
        if ($explanations) {
            return redirect(route('offer_index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function dkvkk_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/dkvkk.docx');
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('accept_type', $request->accept_type);
            $newtesvik->setValue('offer_money', $request->offer_money . ' ₺');
            $newtesvik->setValue('offer_yazılım', $request->offer_yazılım . ' ₺');

            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');
            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);


            $offers = Offer::create([
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


            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);
                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            return response()->download($path);
//            return redirect(route('offer_index'));
        }
    }

    public function dtesvik_word_tesvik(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();

        if ($customer) {

            $offers = Offer::create([
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


            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                ]);
                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            if ($explanations) {
                return redirect(route('offer_index'))->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('error', 'İşlem Başarısız');
            }
        }
    }

    public function mesem_word_data(Request $request)
    {
        $customer = Customer::where('id', $request->customer_id)->first();
        $seller = TargetSeller::where('id', $request->target_Seller_id)->first();
        $product = Product::where('id', $request->product_id)->first();
        $offer = Offer::where('id', $request->offer_id)->first();
        $explanation = Explanation::where('id', $request->explanation_id)->first();


        if ($customer) {
            File::makeDirectory('teklif_saves/' . $customer->id, 0777, true, true);
            Settings::setOutputEscapingEnabled(true);
            $random_new_tesvik = rand(0, 999999999);
            $newtesvik = new TemplateProcessor('teklif_documents/mesem.docx');
            $newtesvik->setValue('customer_name', $customer->name);
            $newtesvik->setValue('customer_address', $customer->address);
            $newtesvik->setValue('accept_type', isset($request->accept_type) ? $request->accept_type == 'Aylık' ? number_format($request->offer_money, 2, ',', '.') . ' ₺ ' . '/ ' . $request->accept_type : ' % ' . $request->offer_money : '');
//            $newtesvik->setValue('deger_money',$request->offer_money);
            $newtesvik->setValue('kdv', $request->kdv);
            $newtesvik->setValue('offer_date', date('d.m.Y', strtotime($request->offer_date)));
            //$newtesvik->setValue('offer_explanation', $request->offer_explanation);


            $newtesvik->saveAs('teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx');
            $path = 'teklif_saves/' . $customer->id . '/' . $random_new_tesvik . '.docx';
            session(['offer_file_path' => $path]);


            $offers = Offer::create([
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


            if ($offers) {
                $offer = OfferFile::create([
                    'customer_id' => $request->customer_id,
                    'offer_id' => $offers->id,
                    'offer_file' => $path
                ]);

                if ($offer) {
                    $explanations = Explanation::create([
                        'offer_id' => $offers->id,
                        'date' => $request->offer_date,
                        'explanation' => $request->explanation
                    ]);
                }
            }

            return response()->download($path);
        }
    }


    public function convert()
    {
        $path = session()->get('offer_file_path');

        $random = rand(0, 999999999);
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path() . '/' . $path);


        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');

        $PDFWriter->save(public_path('new-result.pdf'));
        $PDFWriter->save(public_path() . '/pdf/' . $random . '.pdf');
        echo 'Dosya Başarılı Bir Şekilde Çevirildi';
    }


}
