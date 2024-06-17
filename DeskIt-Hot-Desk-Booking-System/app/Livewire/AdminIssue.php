<?php

namespace App\Livewire;

use App\Models\Issue;
use Livewire\Component;

class AdminIssue extends Component
{

    public $issueId;

    public function mount($issueId = null)
    {
        $this->issueId = $issueId;
        if ($this->issueId) {
            $this->render($issueId);
        }
    }

    public function render($id)
    {
        // $issue = Issue::find($id)->with('responses')->get();
        // dd('tae', $this->issueId);
        return view('livewire.admin-issue', [
            'issue' => Issue::with('responses.user')->findOrFail($this->issueId)
        ]);
    }

    public function hey()
    {
        return dump('tabe');
    }
}
