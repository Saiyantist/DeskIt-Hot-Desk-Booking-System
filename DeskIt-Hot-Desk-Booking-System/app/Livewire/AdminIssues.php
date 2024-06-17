<?php

namespace App\Livewire;

// use App\Models\Issue;

use App\Models\Issue;
use Livewire\Component;

class AdminIssues extends Component
{
    public function render()
    {
        return view('livewire.admin-issues', [
            'issues' => Issue::with('desk')->paginate(10)
        ]);
    }

    // public function show($id)
    // {
    //     $issue = Issue::with('responses')->findOrFail($id);
    //     return view('livewire.admin-issue-show', compact('issue'));
    // }

    public function show($id)
    {
        // dd($id);
        $url = '/admin/issues/' . $id;
        $this->redirect($url);
        return view('livewire.admin-issue', ['issueId' => $id]);
    }

    public function hey()
    {
        return dump('Tae');
    }
}

