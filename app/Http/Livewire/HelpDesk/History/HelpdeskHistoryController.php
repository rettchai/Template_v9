<?php

namespace App\Http\Livewire\HelpDesk\History;

use Livewire\Component;
use App\Models\Helpdesk;
use App\Models\HelpdeskDetails;

class HelpdeskHistoryController extends Component
{
    public $get_helpdesksDetails;
    public $get_helpdesks;
    public $isModelOpen = false;
    public $helpdeskID;
    public $Comments;


    public function mount()
    {
        $this->get_helpdesks = Helpdesk::where("userID", auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.help-desk.history.helpdesk-history-views');
    }

      public function onClickTimeline($helpdeskID)
      {
          // dd($helpdeskDetailID);
          $this->helpdeskID = $helpdeskID;
          $this->get_helpdesksDetails = HelpdeskDetails::where('HelpDeskID', $helpdeskID)->orderby('created_at')->get();
          $this->isModelOpen = true;
      }

      public function onClickChat()
      {
        //   dd($this->Comments);
          $createChat = HelpdeskDetails::create(
              [
                'HelpDeskID' => $this->helpdeskID,
                'Comments' => $this->Comments,
                'DetailStatus' => true,
                'DetailStatusText' => "ask",
                'created_by' => auth()->user()->id,
                'created_type' => "user",

              ]
          );
          $this->get_helpdesksDetails = HelpdeskDetails::where('HelpDeskID', $this->helpdeskID)->orderby('created_at')->get();
          $this->Comments = null;
      }
}
