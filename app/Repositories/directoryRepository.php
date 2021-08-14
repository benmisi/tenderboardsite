<?php
namespace App\Repositories;

use App\Models\directory;
use App\Models\directory_product;
use App\Models\receipts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class directoryRepository{

    public function getList(){
        return directory::whereNotIn('user_id',[Auth::user()->id])->get();
    }

    public function get_list_by_user(){
        return directory::with('products')->whereuser_id(Auth::user()->id)->first();
    }

    public function get_published_list(){
        return directory::with('products')->get();
    }
    public function get_directory($id){
        return directory::with('products')->whereid($id)->first();   
    }

    public function create(Request $request){
        $directory = directory::whereuser_id($request->user()->id)->first();
        if(is_null($directory))
        {
            $uuid = Str::uuid();
            directory::create(['user_id'=>$request->user()->id,'uuid'=>$uuid,'emails'=>$request->emails,"company"=>$request->company,"address"=>$request->address,"phones"=>$request->phones,'bio'=>$request->bio]);
 
        }else{
            $directory->emails = $request->emails;
            $directory->company = $request->company;
            $directory->address = $request->address;
            $directory->phones = $request->phones;
            $directory->bio = $request->bio;
            $directory->save();
        }
        return redirect()->route('directory.index')->with('statusSuccess','Directory Successfully Created');
  }

  public function deleteDirectory($uuid){

    $directory = directory::whereuuid($uuid)->first();
    directory_product::wheredirectory_id($directory->id)->delete();
    $directory->delete();
    return redirect()->route('directory.index')->with('statusSuccess','Directory Successfully Deleted');


  }

  public function addProduct(Request $request){
      
      $path = !is_null($request->file('image'))? $request->file('image')->store("products","publicFile") : "products/default.jpeg";
      
       directory_product::create(['directory_id'=>$request->id,"name"=>$request->name,"image"=>$path]);
       return redirect()->route('directory.index')->with('statusSuccess','Product Successfully Created');
  }

  

  public function updateProduct(Request $request,$id){
      $product = directory_product::whereid($id)->first();
      $path = $request->file('image')->store("products","publicFile");
      $product->name = $request->name;
      $product->path = $path;
      $product->save();
      return redirect()->route('directory.index')->with('statusSuccess','Product Successfully Updated');

  }

  public function deleteProduct($id){
    $product = directory_product::whereid($id)->first();
    $product->delete() ;
    return redirect()->route('directory.index')->with('statusSuccess','Product Successfully deleted');
  }
}