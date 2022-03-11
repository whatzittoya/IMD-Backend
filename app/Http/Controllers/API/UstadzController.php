<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KajianResource;
use App\Http\Resources\ScheduleUstadzResource;
use App\Http\Resources\UstadzResource;
use App\Models\Kajian;
use App\Models\ScheduleKajianMasjid;
use App\Models\ScheduleUstadzMasjid;
use App\Models\Ustadz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UstadzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ustadz=Ustadz::with('speciality')->paginate();
        return UstadzResource::collection($ustadz);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function show(Ustadz $ustadz)
    {
        //
    }

    //function ustadz has kajian
    public function hasKajian(Request $request)
    {
        //get ustadz with pivot kafarah
        
        //get kajian with order by date
      
        //get kajian that only had by this ustadz
        $kajian=ScheduleUstadzMasjid::where('ustadz_id', Auth::user()->ustadz->id)->get();
        return ScheduleUstadzResource::collection($kajian);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ustadz $ustadz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ustadz  $ustadz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ustadz $ustadz)
    {
        //
    }
}
