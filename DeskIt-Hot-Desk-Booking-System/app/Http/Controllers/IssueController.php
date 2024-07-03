<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
         // Validate the form data
         $validated = $request->validate([
            'deskNumber' => 'required|int',
            'subject' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'required|string|max:4000',
        ]);

        $deskId = Desk::where('desk_num', $validated['deskNumber'])->pluck('id');

        // dd($deskId[0]);

        // Create a new issue record
        $issue = Issue::create([
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'status' => 'to review',
            'user_id'=> Auth::user()->id,
            'desk_id' => $deskId[0],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your feedback has been submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($issueId)
    {
        // dd($id);
        // $issue = Issue::with('responses')->findOrFail($id);
        // return view('admin.issue', compact('issue'));
        // return view('admin.issue', ['issueId' => $id]);
        // return view('admin.issue', ['showIssue' => $id]);
        return view('admin.issue', ['issueId' => $issueId]);
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
