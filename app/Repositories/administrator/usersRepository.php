<?php
namespace App\Repositories\administrator;

use App\Imports\userImport;
use App\Models\subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Excel;
class usersRepository{

    public function getList()
    {
        return User::get();
    }

    public function upload(Request $request){
        $data = Excel::toArray(new userImport, request()->file('filename'));
         if(count($data[0])>0){
             for ($i=1; $i < count($data[0]); $i++) { 
                $name =$data[0][$i][0];
                $surname = $data[0][$i][1];
                $email = $data[0][$i][2];
                $password = $data[0][$i][3];
                $package = $data[0][$i][4];
                $duration = $data[0][$i][5];
                $expiredate = $data[0][$i][6];
                if(!User::whereemail($email)->exists())
                {
                   $user=  User::create(['name'=>$name,'surname'=>$surname,'email'=>$email,'password'=>$password]);
                   subscription::create(['user_id'=>$user->id,'package_id'=>$package,'invoicenumber'=>'import'.$user->id,'duration'=>$duration,'expire_date'=>$expiredate,'status'=>'ACTIVE']);
                }
             }
         }

         return redirect()->route('admin-users.index')->with('statusSuccess','Users successfully Imported');
    }
}