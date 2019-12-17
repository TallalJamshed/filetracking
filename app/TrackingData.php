<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class TrackingData extends Model
{
    protected $table = "trackingdata";
    protected $primaryKey = "track_id";
    protected $fillable = [
        "fk_file_id" , "fk_department_id" , "fk_user_id" , "fk_position_id" , 
        "date_recieved" , "recieved_by" , "sent_to" , "track_name" , "track_date" 
    ];

    public static function saveTrackData($request , $id){
        // dd($request);
        if(isset($request->prev_track_id)){
            $prevtrackid = TrackingData::find($request->prev_track_id);
            $prevtrackid->sent_to = $request->fk_position_id;
            $prevtrackid->save();
        }
        
        $trackdata = new TrackingData;
        $trackdata->fk_file_id = $id;
        // $trackdata->reference_no = $request->ref_initial .'-'. $request->ref_no;
        $trackdata->fill($request->all());
        $trackdata->fk_user_id = Auth::user()->user_id;
        $trackdata->track_date = date('Y-m-d');
        $trackdata->save();
    }

    public static function changeStatusToVisible($id){
        $file = TrackingData::find($id);
        $file->date_recieved = date('Y-m-d');
        $file->recieved_by = Auth::user()->user_id;
        $file->save();
    }
    // public static function updateFiles($request){

    // }
}
