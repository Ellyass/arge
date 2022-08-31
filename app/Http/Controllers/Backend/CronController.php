<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Offer;
use Carbon\Carbon;
use DateTime;

class CronController extends Controller
{
    public function cron_30_min()
    {

        $test = Notification::all();
        $offers = Offer::where('cron_1_day', '0')->get();


        foreach ($offers as $offer) {
            $tarih1 = new DateTime($offer->created_at);
            $tarih2 = Carbon::now();
            $interval = $tarih1->diff($tarih2);

            $bildirim = new Notification();
            $bildirim->offer_id = $offer->id;
            $bildirim->customer_id = $offer->customer_id;
            $bildirim->offer_created_user = $offer->user_id;
            $bildirim->offer_save_date = $offer->crearted_at;
            $bildirim->created_at = Carbon::now();
            $bildirim->type_1_day = '0';
            $bildirim->type_1_week = '1';
            $bildirim->type_2_week = '1';
            $bildirim->explanation_1_day = '1 gün içinde ilk arama gerçekleşti';
            $deger = $test->where('type_1_day', '0')->where('offer_id', $offer->id)->count();

            if ($offer->cron_1_day == 1 && $interval->days >= 1) {
                if ($deger == 0) {
                    $bildirim->save();
                }
            }
        }
    }


    public function cron_one_week()
    {

        $test = Notification::all();
        $offers = Offer::where('cron_1_week', '0')->get();

        foreach ($offers as $offer) {
            $tarih1 = new DateTime($offer->created_at);
            $tarih2 = Carbon::now();
            $interval = $tarih1->diff($tarih2);

            $deger = $test->where('type_7_day', '1')->where('offer_id', $offer->id)->count();

            if ($offer->cron_1_week == 0 && $interval->days >= 7) {
                if ($deger == 1) {
                    $bildirim = Notification::where('offer_id', $offer->id)->first();
                    $bildirim->type_7_days = '0';
                    $bildirim->explanation_7_day = '1 hafta içinde 2 arama gerçekleşti';
                    $bildirim->save();
                }
            }
        }
    }


    public function cron_two_week()
    {

        $test = Notification::all();
        $offers = Offer::where('cron_2_week', ['0'])->get();

        foreach ($offers as $offer) {
            $tarih1 = new DateTime($offer->created_at);
            $tarih2 = Carbon::now();
            $interval = $tarih1->diff($tarih2);

            $deger = $test->where('type_14_day', '1')->where('offer_id', $offer->id)->count();
            if ($offer->cron_2_week == 0 && $interval->days >= 14) {
                if ($deger == 0) {
                    $bildirim = Notification::where('offer_id', $offer->id)->first();
                    $bildirim->type_14_day = '0';
                    $bildirim->explanation_14_day = '2 hafta içinde 3 kere arama gerçekleştirilmedi';
                    $bildirim->save();
                }
            }
        }
        if ($offers = Offer::where('cron_2_week', ['1'])->get()) {

            $test = Notification::all();
            $offers = Offer::where('cron_2_week', ['1'])->get();
            foreach ($offers as $offer) {
                $tarih1 = new DateTime($offer->created_at);
                $tarih2 = Carbon::now();
                $interval = $tarih1->diff($tarih2);

                $deger = $test->where('type_14_days', '1')->where('offer_id', $offer->id)->count();
                if ($offer->cron_2_week == 1 && $interval->days >= 14) {
                    if ($deger == 1) {
                        $bildirim = Notification::where('offer_id', $offer->id)->first();
                        $bildirim->type_14_day = '2';
                        $bildirim->explanation_14_day = '2 hafta içinde 3 arama gerçekleştirildi';
                        $bildirim->save();
                    }
                }
            }
        }
    }
}
