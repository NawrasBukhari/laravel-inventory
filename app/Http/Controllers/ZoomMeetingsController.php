<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ZoomMeetings;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;
use RealRashid\SweetAlert\Facades\Alert;

class ZoomMeetingsController extends Controller

{
    use MeetingZoomTrait;

    public function index()
    {
        $zoom_meetings = ZoomMeetings::all();
        return view('zoom.index', compact('zoom_meetings'));
    }

    public function create()
    {
        $zoom_meetings = ZoomMeetings::all();
        return view('zoom.create', compact('zoom_meetings'));
    }

    public function store(Request $request)
    {
        $meeting = $this->createMeeting($request);

        try {
            ZoomMeetings::create([
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_time' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $request->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url
            ]);
            Alert::success('Done!', 'Meeting has been successfully created', 'success');
            return redirect()->route('zoom.index')->withStatus('Product successfully registered.');

        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $meeting = Zoom::meeting()->find($request->id);
            $meeting->delete();
            ZoomMeetings::where('meeting_id', $request->id)->delete();
            return redirect()->route('zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
