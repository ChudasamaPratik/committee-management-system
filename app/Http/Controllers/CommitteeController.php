<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Committee::where('short_name', '=', $request->short_name)->first() != null || Committee::where('name', '=', $request->name)->first() != null) {
            return ['Error' => 'Committee exists'];
        }

        
        $committee = new Committee();
        $committee->type = $request->type;
        $committee->name = $request->name;
        $committee->short_name = $request->short_name;
        $committee->effect_date = $request->effect_date;
        $committee->restructuring_date = $request->restructuring_date;
        $committee->meeting_frequency = $request->meeting_frequency;
        $committee->save();
        
        $memberIds = explode(',', $request->selected_member);
        
        foreach ($memberIds as $memberId) {
            $member = Member::find($memberId);
            $committeeMember = new CommitteeMember();
            $committeeMember->committee_id = $committee->id;
            $committeeMember->member_id = $member->id;
            $committeeMember->save();
        }
        
        $committee->secratory = $request->selected_secratory;
        $committee->chair_person = $request->selected_chair_person;
        $committee->save();
        
        return redirect()->route('admin.dashboard');
        // return "<script>alert('Committee Created')</script>";
    }

    /**
     * Display the specified resource.
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Committee $committee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Committee $committee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Committee $committee)
    {
        //
    }
}
