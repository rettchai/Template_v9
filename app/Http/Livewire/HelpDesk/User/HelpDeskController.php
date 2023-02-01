<?php

namespace App\Http\Livewire\HelpDesk\User;

use App\Models\Items;
use Livewire\Component;
use App\Models\Helpdesk;
use App\Models\HelpdeskDetails;

class HelpDeskController extends Component
{
    public $helpdesks;
    public $get_helpdesks;
    public $get_helpdesksDetails;
    public $items;
    // public $helpdesk;
    public $listItems;
    public $isModelOpen = false;

    protected $rules = [
        'helpdesks.ItemID' => 'required',
        'helpdesks.OtherName' => 'required_if:helpdesks.ItemID,=,0',
        'helpdesks.Place' => 'required',
        'helpdesks.Details' => 'required',
    ];

    protected $messages = [
        'helpdesks.ItemID.required' => ' ',
        'helpdesks.OtherName.required_if' => ' ',
        'helpdesks.Place.required' => ' ',
        'helpdesks.Details.required' => ' ',
    ];

    public function mount()
    {
        $this->items = Items::where("ItemTypeID", 2)->where("id", ">=", 1)
        ->orderby('ItemName')->get();


    }

    public function render()
    {
        return view('livewire.help-desk.user.help-desk-views');
    }

    public function onChangelistItems()
    {
        dd($this->listItems);
    }

    public function onClickAddJob()
    {
        $this->validate();
        $createHD = Helpdesk::create(
            [
            'userID' => auth()->user()->id,
            'ItemID' => $this->helpdesks['ItemID'],
            'ItemName' => Items::where('id',$this->helpdesks['ItemID'])->limit(1)->get()[0]->ItemName,
            'OtherName' => @$this->helpdesks['OtherName'],
            'Place' => $this->helpdesks['Place'],
            'Details' => $this->helpdesks['Details'],
            'Phone' => auth()->user()->phone,
            'FullNameDoc' => auth()->user()->FullNameDoc,
            'Position' => auth()->user()->Position,
            'FacDoc' => auth()->user()->getFac->FacNameTH,
            'HelpDeskStatus' => true,
            'StatusText' => "created",
            'created_by' => auth()->user()->id,

            ]
        );
        // dd($createHD,$createHD->id);

        HelpdeskDetails::create(
            [
               'HelpDeskID' => $createHD->id,
                'Comments' => "created",
                'DetailStatus' => true,
                'DetailStatusText' => "created",
                'created_by' => auth()->user()->id,

            ]
        );
        // dd($this->listItems, $this->helpdesk);
    }


}
