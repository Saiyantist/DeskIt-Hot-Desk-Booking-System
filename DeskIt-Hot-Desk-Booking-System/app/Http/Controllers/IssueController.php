<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.feedbacks-reports');
        // $issues = Issue::with('desk', 'user')->get();
        
        // return view('admin.issues', compact('issues'));
        return view('admin.issues');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // dd($id);
        // $issue = Issue::with('responses')->findOrFail($id);
        // return view('admin.issue', compact('issue'));
        // return view('admin.issue', ['issueId' => $id]);
        return view('admin.issue', ['issueId' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
