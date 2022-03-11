<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use App\Models\Ustadz;
use Illuminate\Http\Request;
use App\Http\Resources\KajianResource;
use App\Models\Masjid;
use Illuminate\Support\Facades\Auth;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get kajian with order by date
        //$kajian=Kajian::orderBy('kajian_date', 'desc')->get();
        //return $kajian;
        $kajian=Kajian::with("masjid")->with('sylabus.speciality')->with('ustadz')->orderBy('id', 'desc')->paginate();
        //return with resource and sort by id


        return KajianResource::collection($kajian);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function saveKajian(Request $request)
    {
        $kajian=new Kajian;

        $request->validate([
            "title"=>"required",
            "date"=>"required",
            "sylabus"=>"required",
            "tipe_kajian"=>"required",
        ]);
        //save data
        $kajian->masjid_id=Auth::user()->masjid->id;

        $kajian->kajian_title=$request->title;
        $kajian->kajian_date=$request->date;
        $kajian->status_kajian="new";
        $kajian->sylabus_id=$request->sylabus;
        $kajian->save();

        //post to notification
        // $expo = \ExponentPhpSDK\Expo::normalSetup();

        // $accessToken="TF5HRg_Mrj66rv1Kh33Zz33o2HhjjLCFbU4KkrHd";
        // $expo->setAccessToken($accessToken);
        // $notification = ['body' => 'Permintaan Dakwah di Masjid '.Auth::user()->masjid->name];

        // $expo->notify("ustadz", $notification);


        //return success response
        return response()->json(['success'=>'Kajian created successfully'], 200);
    }
    public function store(Request $request)
    {
        $kajian=new Kajian;

        // $request->validate([
        //     "title"=>"required",
        //     "date"=>"required",
        //     "sylabus"=>"required",
        //     "tipe_kajian"=>"required",
        // ]);
        //save data
        $kajian->masjid_id=Auth::user()->masjid->id;

        $kajian->kajian_title=$request->title;
        $kajian->kajian_date=$request->date;
        $kajian->status_kajian="new";
        $kajian->sylabus_id=$request->sylabus;
        $kajian->save();

        //post to notification
        $expo = \ExponentPhpSDK\Expo::normalSetup();

        $accessToken="TF5HRg_Mrj66rv1Kh33Zz33o2HhjjLCFbU4KkrHd";
        $expo->setAccessToken($accessToken);
        $notification = ['body' => 'Permintaan Dakwah di Masjid '.Auth::user()->masjid->name];

        $expo->notify(["ustadz"], $notification);


        //return success response
        return response()->json(['success'=>'Kajian created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kajian  $kajian
     * @return \Illuminate\Http\Response
     */
    public function show(Kajian $kajian)
    {
        //return kajian
        return new KajianResource($kajian);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kajian  $kajian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kajian $kajian)
    {
        //update kajian
        $request->validate([
            "masjid_id"=>"required",
            "title"=>"required",
            "date"=>"required",
            "sylabus"=>"required",
        ]);
       
        $kajian->masjid_id=$request->masjid_id;
        $kajian->kajian_title=$request->title;
        $kajian->kajian_date=$request->date;
        $kajian->sylabus_id=$request->sylabus;
        $kajian->save();

        //return success response
        return response()->json(['success'=>'Kajian updated successfully'], 200);
    }

    //function for ustadz to propose kajian
    public function propose(Request $request, Kajian $kajian)
    {
        //update kajian
        $request->validate([
            "kafarah"=>"required",
        ]);
        
        //save many to many with ustadz
        $kajian=Kajian::find($request->id);
        $kajian->ustadz()->attach(Auth::user()->id, ['est_kafarah'=>$request->kafarah]);
        //post to notification
        $masjid_id=$kajian->masjid_id;
        $user_masjid=Masjid::find($masjid_id)->user_id;
        $expo = \ExponentPhpSDK\Expo::normalSetup();

        $accessToken="TF5HRg_Mrj66rv1Kh33Zz33o2HhjjLCFbU4KkrHd";
        $expo->setAccessToken($accessToken);
        $notification = ['body' => 'Ustadz '.Auth::user()->name. " meminta untuk menjadi pendakwah di masjid anda"];

        $expo->notify([$user_masjid], $notification);


        //return success response
        return response()->json(['success'=>'Success'], 200);
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kajian  $kajian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kajian $kajian)
    {
        //
    }
}
