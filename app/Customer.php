<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Customer;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['firstname','lastname','phone'];
    public function storeData(Request $request){
       $inserting = Customer::create($request->all());
       if($inserting){
           return "done";
       } else{
           return "not done";
       }
    }

    public function getData(){
        $data = Customer::latest()->paginate(10);
        return $data;
    }

    public function createUser(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required'
        ]);

        $creation = Customer::create($request->all());
        if($creation){
            return "done";
        } else{
            return "not done";
        }
    }

    public function getUser($id){
        $data = Customer::find($id);
        return $data;
    }

    public function editUser(Request $request, $id){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required'
        ]);
        $biodata = Customer::find($id);
        $biodata->firstname = $request->get('firstname');
        $biodata->lastname = $request->get('lastname');
        $biodata->phone = $request->get('phone');
        $result = $biodata->save();
        if($result){
            return "done";
        } else{
            return "not done";
        }
    }

    public function deleteUser($id){
        $biodata = Customer::find($id);
        $deletion = $biodata->delete();
        if($deletion){
           return "done"; 
        } else{
            return "not done";
        }
    }

    public function fileUpload(Request $request){
        $request->validate([
            'filetoupload'=>'required|file'
        ]);
        $request->filetoupload->storeAs('uploads',$request->filetoupload->getClientOriginalName());
        $file_n = storage_path('app/uploads/'.$request->filetoupload->getClientOriginalName());
        $file = fopen($file_n, "r");
        $all_data = array();
        $final_array = array();
        while ( ($data = fgetcsv($file, 200, ",")) !==FALSE) {
        $firstname = $data[0];
        $lastname = $data[1];
        $phone = $data[2];
        $request = new \Illuminate\Http\Request();
        $request->replace(['firstname' => $firstname,'lastname' =>$lastname,'phone'=>$phone]);
        $insertData = new Customer();
        $ins = $insertData -> storeData($request);
        if(!$ins){
            return "not done";
        }
        }
        fclose($file);
        return;
    }
}
