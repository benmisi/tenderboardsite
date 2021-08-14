<?php

namespace App\Repositories\administrator;

use App\Models\vendorapplication;
use App\Notifications\approvedNotification;

class vendorRepository{

    public function getList(){
        return vendorapplication::whereIn('status',['IN-PROGRESS','PROCESSED'])->get();
    }

    public function update($id){
        $application  = vendorapplication::whereid($id)->first();
        $application->status = "PROCESSED";
        $application->save();

        return redirect()->route('admin-vendorregistrations.index')->with('statusSuccess','Application successfully processed');
       
    }
}