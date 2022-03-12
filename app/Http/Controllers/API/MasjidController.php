<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MasjidKajianResource;
use App\Models\Masjid;
use Illuminate\Http\Request;
//import masjidresource
use App\Http\Resources\MasjidResource;
use App\Models\Kajian;
use App\Models\ScheduleUstadzMasjid;
use App\Models\Ustadz;
use App\Notifications\UstadAcceptedNotif;
use Illuminate\Support\Facades\Auth;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get masjid with img
        $masjid=Masjid::paginate();
        return MasjidResource::collection($masjid);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function show(Masjid $masjid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masjid $masjid)
    {
        //
    }

    //masjid has kajian with ustadz
    public function hasKajian(Request $request)
    {
        //get masjid with pivot kafarah
        $masjid_id=Auth::user()->masjid->id;
        //get ustadz kajian
        $kajian=Kajian::where('masjid_id', $masjid_id)->with('ustadz')->with('sylabus.speciality')->get();
        return MasjidKajianResource::collection($kajian);
    }

    //accpt ustadz in kajian
    public function acceptUstadz(Request $request)
    {
        //get masjid with pivot kafarah
        $kajian=Kajian::find($request->id);
        $kajian->status_kajian="has_ustadz";
        $kajian->save();
        //update many to many ustadz kajian
        $schedule_ustadz_masjid=ScheduleUstadzMasjid::where("schedule_kajianmasjid_id", $kajian->id)->where("ustadz_id", $request->ustadz_id)->first();
        $schedule_ustadz_masjid->accepted=true;
        $schedule_ustadz_masjid->save();

        $ustadz_user=Ustadz::find($request->ustadz_id)->user;

        //notify ustadz
        $ustadz_user->notify(new UstadAcceptedNotif($kajian));

        
        //return success
        return response()->json([
            'success' => true,
            'message' => 'ustadz has been accepted'
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masjid $masjid)
    {
        //
    }
}
