<?php

namespace App\Livewire;

use App\Models\Issue;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIssues extends Component
{

    use WithPagination;

    public $search = '';
    public $type = '';
    
    public $sortBy = 'id';
    public $sorting = 'DESC';
    
    public $perPage = 5;
    
    public function render()
    {
        return view('livewire.admin-issues', [
            'issues' => Issue::join('users', 'issues.user_id', '=', 'users.id')
                        ->join('desks', 'issues.desk_id', '=', 'desks.id')
                        ->select('issues.*', 'users.name', 'desks.desk_num')
                        ->when($this->type === 'feedback', function($query){
                            $query->where('type',  $this->type);
                        })
                        ->when($this->type === 'bug', function($query){
                            $query->where('type',  $this->type);
                        })
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sorting)
                        ->paginate($this->perPage)
        ]);
    }

    public function setSortBy($sortBy)
    {
        if($this->sortBy === $sortBy)
        {
            $this->sorting = ($this->sorting == 'ASC') ? "DESC" : "ASC";
            return;
        }
        $this->sortBy = $sortBy;
        $this->reset('sorting');
    }

    // public function show($id)
    // {
    //     $issue = Issue::with('responses')->findOrFail($id);
    //     return view('livewire.admin-issue-show', compact('issue'));
    // }

    // public function show($issueId)
    // {
    //     // dd($issueId);
    //     // $this->dispatch('showIssue', $issueId);
    //     return view('admin.issue', ['showIssue' => $issueId]);
    // }

    public function hey()
    {
        return dump('Tae');
    }
}

