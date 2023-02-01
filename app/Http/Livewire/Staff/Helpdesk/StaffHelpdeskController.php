<?php

namespace App\Http\Livewire\Staff\Helpdesk;

use Livewire\Component;
use App\Models\Helpdesk;
use Livewire\WithPagination;
use App\Models\HelpdeskStatus;
use App\Models\HelpdeskDetails;

class StaffHelpdeskController extends Component
{
    use WithPagination;

    public $get_helpdesksDetails;
    public $refStatus;
    public $get_helpdesks;
    public $isModelOpen = false;
    public $helpdeskID;
    public $Comments;
    public $statuss;


    public function mount()
    {
        // $this->get_helpdesks = Helpdesk::all();
    }

    public function render()
    {
        $dataHelp = Helpdesk::orderby('id','desc')->paginate();
        // $this->get_helpdesks = Helpdesk::latest()->paginate(2);
        // dd($dataHelp);
        return view('livewire.staff.helpdesk.staff-helpdesk-views',compact('dataHelp'));
    }

    public function onClickTimeline($helpdeskID)
    {
        // dd($helpdeskDetailID);
        $this->helpdeskID = $helpdeskID;
        $this->get_helpdesksDetails = HelpdeskDetails::where('HelpDeskID', $helpdeskID)->orderby('created_at')->get();

        $this->refStatus = HelpdeskStatus::where('id', ">", 1)->get();
        $this->isModelOpen = true;
    }

      public function onClickChat()
      {
          //   dd($this->Comments);

          $this->validate(
              [
            'Comments' => 'required',
            'statuss' => 'required'
          ],
              [
                  'Comments.required' => 'กรุณาใส่ข้อความ',
                  'statuss.required' => 'ตรวจสอบสถานะของงาน'
              ]
          );
          $createChat = HelpdeskDetails::create(
              [
                'HelpDeskID' => $this->helpdeskID,
                'Comments' => $this->Comments,
                'DetailStatus' => true,
                'DetailStatusText' => $this->statuss,
                'created_by' => auth()->user()->id,
                'created_type' => "user",

              ]
          );


          Helpdesk::where('id', $this->helpdeskID)->update(['StatusText' => $this->statuss]);



          $this->get_helpdesksDetails = HelpdeskDetails::where('HelpDeskID', $this->helpdeskID)->orderby('created_at')->get();
          $this->Comments = null;
      }
}
