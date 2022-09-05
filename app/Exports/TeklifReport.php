<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Excel;
use function Complex\rho;

class TeklifReport implements FromView
{

    protected $offers;
    protected $datas;

    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($offers,$datas)
    {
        $this->offers = $offers;
        $this->datas = $datas;
    }
    public function view():View
    {

        return view('backend.offer.report3',['offers'=>$this->offers,'datas'=>$this->datas]);
    }
}
