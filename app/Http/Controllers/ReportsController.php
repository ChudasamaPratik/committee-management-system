<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Member;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    function attendanceReport()
    {
        $committee_id = 1;
        $committee = DB::select('SELECT committees.name as committee_name, meetings.id as meeting_number, meetings.venue, meetings.meeting_time as time
                   FROM committees
                   JOIN meetings ON meetings.committee_id = committees.id
                   WHERE committees.id = ?', [$committee_id]);

        $members = DB::select('SELECT members.name, members.designation
                   FROM committee_members
                   JOIN members ON committee_members.member_id = members.id
                   WHERE committee_members.committee_id = ?', [$committee_id]);

        $title = 'Attendance Sheet';

        if (!empty($committee)) {
            $pdf = new Dompdf();
            $pdf->set_paper('A4', 'portrait');
            $pdf->loadHtml(view('reports.attendance', compact('title', 'committee', 'members')));
            $pdf->render();
            return $pdf->stream("Attendance_report_' . date('YmdHis') . '.pdf'", ["Attachment" => false]);
        } else {
            return 'No data found';
        }
    }

    function committeeConstitutionReport(Request $request)
    {
        $committee = Committee::findOrFail($request->committee_id);
        $chairPerson = Member::findOrFail($committee->chair_person);
        $secratory = Member::findOrFail($committee->secratory);

        $members = DB::select("SELECT * FROM members WHERE id in (SELECT member_id from committee_members WHERE committee_id = $committee->id) and id not in ($chairPerson->id, $secratory->id)");

        $pdf = new Dompdf();
        $pdf->set_paper('A4', 'portrait');
        $pdf->loadHtml(view('reports.committee_constitution', compact('committee', 'chairPerson', 'secratory', 'members')));
        $pdf->render();

        return $pdf->stream("committee_constitution_report.pdf", ["Attachment" => false]);
        // return view('reports.committee_constitution', compact('committee'));

    }
}
