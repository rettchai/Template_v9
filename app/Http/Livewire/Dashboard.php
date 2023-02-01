<?php

namespace App\Http\Livewire;

use Throwable;
use Carbon\Carbon;


use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;


use App\Mail\TestMail;
use App\Models\Donate;
use App\Models\RefFund;
use Livewire\Component;
use App\Mail\ThankyouMSG;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class Dashboard extends Component
{
    use WithFileUploads;
    use Actions;
    use WithPagination;


    public $titleNameModel = false;
    public $isModelOpen = false;
    public $isPages = "" ;
    public $pdfID = null ;
    public $onClickPDF = null ;
    public $sumTotal = 0 ;

    public $ref_funds;
    public $sumApproved;
    public $sumReject;
    public $sumPending;
    public $Newest;

    public $donate = [];
    // public $TableDonates ;

    public function mount()
    {
        $this->donate['FundID'][1]['Amount'] = 0;
        $this->donate['FundID'][2]['Amount'] = 0;
        $this->donate['FundID'][3]['Amount'] = 0;

        $this->ref_funds = RefFund::all();
        $this->Newest = Donate::where('user_id', auth()->user()->id)
        ->where('ReceiptStatus', '=', 'approved')
        ->limit(5)->orderby('id', 'desc')->get();

        $this->sumApproved = Donate::where('ReceiptStatus', '=', 'approved')
        ->groupBy('ReceiptStatus')
        ->sum('Amount');

        $this->sumReject = Donate::where('ReceiptStatus', '=', 'reject')
        ->groupBy('ReceiptStatus')
        ->sum('Amount');

        $this->sumPending = Donate::where('ReceiptStatus', '=', 'pending')
        ->groupBy('ReceiptStatus')
        ->sum('Amount');
        // dd($this->sumPending);
    }

    public function render()
    {
        return view('livewire..dashboards.dashboard', [
            'TableDonates' => Donate::where('user_id', auth()->user()->id)->paginate(5),
        ]);
    }

    public function onClickCreateDonate()
    {
        $this->titleNameModel = "สร้างการบริจาค (Donate)";
        $this->isModelOpen = true;
        $this->isPages = "popup-create-donate";
    }

    public function onClickCreateDonateSave()
    {
        // dd($this->donate['FundID'],is_bool($this->donate['FundID'][1]));
        try {
            $path = "storage/slip/";
            $vadi = array(
                    'donate.ReceiptName' => 'required',
                    'donate.ReceiptTexID' => 'required',
                    'donate.ReceiptAddress' => 'required',
                    'donate.ReceiptSender' => 'required',
                    'donate.ContactTel' => 'required',
                    'donate.DateTrafer' => 'required',
                    'donate.ContactName' => 'required',
                    'donate.Amount' => 'required|numeric',
                    'donate.FileSlip' => 'required|mimes:jpg,png|max:10000',
                );
            $vadiText = array(
                'donate.*.required' => 'กรุณาตรวจสอบข้อมูล',
            );
            if (@$this->donate['FundID'][1] == true or @$this->donate['FundID'][2] == true or @$this->donate['FundID'][3] == true) {
                if (@$this->donate['FundID'][1] == true) {
                    $vadi['donate.FundID.1.1'] = 'required';
                    $vadi['donate.FundID.1.2'] = 'required';
                    $vadi['donate.FundID.1.3'] = 'required';
                    $vadi['donate.FundID.1.4'] = 'required';
                    $vadi['donate.FundID.1.5'] = 'required';
                    $vadi['donate.FundID.1.Amount'] = 'required|numeric';
                    $vadiText['donate.FundID.1.*.required'] = 'กรุณาตรวจสอบข้อมูล';
                }
                if (@$this->donate['FundID'][2] == true) {
                    $vadi['donate.FundID.2.Amount'] = 'required|numeric';
                    $vadiText['donate.FundID.2.*.required'] = 'กรุณาตรวจสอบข้อมูล';
                }
                if (@$this->donate['FundID'][3] == true) {
                    $vadi['donate.FundID.3.Amount'] = 'required|numeric';
                    $vadiText['donate.FundID.3.*.required'] = 'กรุณาตรวจสอบข้อมูล';
                }
            } else {
                $vadi['donate.FundID.1'] = 'required';
                $vadi['donate.FundID.2'] = 'required';
                $vadi['donate.FundID.3'] = 'required';
                $vadiText['donate.FundID.*.required'] = 'กรุณาตรวจสอบข้อมูล';
            }

            $chkvalidate = $this->validate($vadi, $vadiText);
            // dd($chkvalidate);

            // dd(auth()->user()->email);
            $donates = Donate::updateorCreate(
                [
                    'id'=> null,
                ],
                [
                    'FundID'=>1,
                    'ReceiptName'=>$this->donate['ReceiptName'],
                    'ReceiptTexID'=>$this->donate['ReceiptTexID'],
                    'ReceiptAddress'=>$this->donate['ReceiptAddress'],
                    'ReceiptSender'=>$this->donate['ReceiptSender'],
                    'ContactName'=>$this->donate['ContactName'],
                    'ContactTel'=>$this->donate['ContactTel'],
                    'DateTrafer'=>$this->donate['DateTrafer'],
                    'Amount'=>$this->donate['Amount'],

                    // 'CapitalScholarship'=>true,
                    'CapitalScholarship'=> is_bool($this->donate['FundID'][1]) ? false : true ,
                    'CapitalScholarship_Amount'=>isset($this->donate['FundID'][1]['Amount']) ? $this->donate['FundID'][1]['Amount'] : 0,

                    'CapitalScholarship_StudyCondition'=>isset($this->donate['FundID'][1][1]) ? $this->donate['FundID'][1][1] : "-",
                    'CapitalScholarship_PoorName'=>isset($this->donate['FundID'][1][2]) ? $this->donate['FundID'][1][2] : "-",
                    'CapitalScholarship_FundName'=>isset($this->donate['FundID'][1][3]) ? $this->donate['FundID'][1][3] : "-",
                    'CapitalScholarship_FundCondition'=>isset($this->donate['FundID'][1][4]) ? $this->donate['FundID'][1][4] : "-",
                    'CapitalScholarship_Other'=>isset($this->donate['FundID'][1][5]) ? $this->donate['FundID'][1][5] : "-",

                    // 'CapitalResearch'=>true,
                    'CapitalResearch'=>is_bool($this->donate['FundID'][2]) ? false : true ,
                    'CapitalResearch_Amount'=>isset($this->donate['FundID'][2]['Amount']) ? $this->donate['FundID'][2]['Amount'] : 0,

                    // 'CapitalActivity'=>true,
                    'CapitalActivity'=>is_bool($this->donate['FundID'][3]) ? false : true ,
                    'CapitalActivity_Amount'=>isset($this->donate['FundID'][3]['Amount']) ? $this->donate['FundID'][3]['Amount'] : 0,

                    'user_id'=>auth()->user()->id,
                    'ReceiptStatus'=> "pending",
                    'FileSlip'=> ($this->donate['FileSlip']->store('slip', 'public')) ?? $path.$this->donate['FileSlip']->hashName(),
                    // 'ReceiptStatus'=>$this->donate['ReceiptStatus'],
                ]
            );
            // dd($donates);
            $this->dialog()->show([
                'title'       => 'Thank you',
                'description' => 'Thank you for your recent donation successfull saved',
                'icon'        => 'success'
            ]);

            $email = auth()->user()->email;
            $mailstatus = Mail::to($email)->send(new ThankyouMSG($this->donate['ReceiptName']));

            $this->isModelOpen = false;
            return redirect()->route('dashboard')->with('message', 'Thank you for your recent donation!');
        } catch (Throwable $e) {
            report($e);
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'please contact administrator line official account @arit-rmutr'
            );
            return false;
        }
    }


    public function calSumTotal()
    {
        $this->donate['Amount'] = 0;
        $vadiR = array();
        if (@$this->donate['FundID'][1] == true) {
            $this->validate(
                [
                    'donate.FundID.1.Amount' => 'required|numeric',
                ]
            );
            $this->donate['Amount'] = $this->donate['Amount'] + $this->donate['FundID'][1]['Amount'];
        }
        if (@$this->donate['FundID'][2] == true) {
            $this->validate(
                [
                    'donate.FundID.2.Amount' => 'required|numeric',
                ]
            );
            $this->donate['Amount'] = $this->donate['Amount'] +  $this->donate['FundID'][2]['Amount'];
        }
        if (@$this->donate['FundID'][3] == true) {
            $this->validate(
                [
                    'donate.FundID.3.Amount' => 'required|numeric',
                ]
            );
            $this->donate['Amount'] = $this->donate['Amount'] +  $this->donate['FundID'][3]['Amount'];
        }
    }
}
