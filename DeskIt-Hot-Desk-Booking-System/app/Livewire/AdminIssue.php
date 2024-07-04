<?php

namespace App\Livewire;

use App\Models\Issue;
use App\Services\AuditTrailService;
use Livewire\Component;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AdminIssue extends Component
{

    public $issue;
    public $dateTime;
    public $status;
    // public $responses;

    // protected $listeners = ['showIssue'];

    // public function mount($issueId = null)
    // {
    //     $this->issueId = $issueId;
    //     if ($this->issueId) {
    //         $this->render($issueId);
    //     }
    // }

    public function mount($issueId)
    {
        
        $this->issue = Issue::findOrFail($issueId);
        $this->status = $this->issue->status;

        $dateString = $this->issue->created_at;

        $date = new DateTime($dateString);
        $this->dateTime = $date->format('F d, Y g:i A');
    }

    public function changeStatus()
    {
        if($this->status == 'to review')
        {
            $this->issue->update(['status' => 'to review']);
        }
        elseif($this->status == 'reviewing')
        {
            $this->issue->update(['status' => 'reviewing']);
        }
        else
        {
            $this->issue->update(['status' => 'resolved','resolved_at' => Carbon::now()]);
        }

        AuditTrailService::createTrail(Auth::user()->email, "Issue Update", Auth::user()->name ." updated issue " . $this->issue->id . " into status \"" . $this->issue->status . "\"", "success");
    }

    public function goBack()
    {
        return $this->redirect('/admin/issues');
    }

    public function render()
    {
        // $issue = Issue::find($id)->with('responses')->get();
        // dd('tae', $this->issueId);
        // return view('livewire.admin-issue', [
        //     'issue' => Issue::with('responses.user')->findOrFail($this->issueId)
        // ]);
        // return view('livewire.admin-issue', compact($this->issue));
        return view('livewire.admin-issue');
    }
}
