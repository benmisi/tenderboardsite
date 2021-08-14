<?php
namespace App\Repositories\administrator;

use App\Models\prazapplication;

class prazregistrationRepository{
    
    public function getList(){
        return prazapplication::with('items')->whereIn('status',['IN-PROGRESS','PROCESSED'])->get();
    }

    public function update($id){
        $application = prazapplication::whereid($id)->first();
        $application->status = "PROCESSED";
        $application->save();
        return redirect()->route('admin-prazregistrations.index')->with('statusSuccess','Application successfully processed');
    }
}