<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\RefFacs;
use App\Models\User;

use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $ref_facs;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;

    protected $rules = [
        'user.name' => 'max:100|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'required|max:50',
        // 'user.about' => 'max:200',
        // 'user.location' => 'max:200',
        'user.FullNameDoc' => 'required|max:200',
        'user.FacID' => 'required|max:10',
    ];

    protected $messages = [
        'user.phone.required' => 'กรูณาระบุเบอร์ติดต่อกลับ',
        'user.FullNameDoc.required' => 'กรูณาระบุชื่อ-นามสกุล สำหรับลงเอกสาร',
        'user.FacID.required' => 'กรูณาระบุหน่วยงาน.',
    ];

    public function mount() {
        $this->user = auth()->user();
        // $this->user->FacID = ($this->user->FacID == 0) ? null : $this->user->FacID ;
        // dd($this->user->FacID);
        $this->ref_facs= RefFacs::where('id' , ">" ,0)->get();
        // dd($this->user);
    }

    public function save() {

        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
        // dd($this->user);

    }
    public function render()
    {
        return view('livewire.laravel-examples.user-profile');
    }
}
