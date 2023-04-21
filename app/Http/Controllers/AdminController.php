<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Committee;
use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $meetings = DB::select('SELECT c.id "committee_id", m.id "meeting", concat(c.short_name, "-", m.id) "meeting_id", c.short_name, (SELECT COUNT(cm1.member_id) FROM committees c1, committee_members cm1 WHERE c1.id = cm1.committee_id GROUP BY c1.id HAVING c1.id = c.id) "no_of_members", m.meeting_time, COUNT(a.id) "no_of_agendas", COUNT(a.resolution) "no_of_resolutions", COUNT(NullIf(NullIf(att.attendance, -1), 0)) "present_members" FROM meetings m INNER JOIN agendas a ON (m.id = a.meeting_id) INNER JOIN attendances att ON (m.id=att.meeting_id) INNER JOIN committees c ON (c.id = m.committee_id) GROUP BY m.id');

        $members = Member::all();

        return view('admin.create_committee', compact('meetings', 'members'));
    }
}
