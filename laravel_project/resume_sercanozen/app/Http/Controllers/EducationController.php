<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationAddRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function list()
    {
        $list = Education::all();
        return view('admin.education_list', compact('list'));
    }

    public function changeStatus(Request $request)
    {
        $id = $request->educationID;
        $newStatus = null;

        $findEducation = Education::find($id);
        $status = $findEducation->status;
        if ($status){
            $status = 0;
            $newStatus = "Pasif";
        } else{
            $status = 1;
            $newStatus = "Aktif";
        }

        $findEducation->status = $status;
        $findEducation->save();

        return response()->json([
            'newStatus' => $newStatus,
            'educationID' => $id,
            'status' => $status
        ]);


    }

    public function addShow(Request $request)
    {
        $id = $request->educationID;
        $education = null;
        if(!is_null($id)){
            $education = Education::find($id);
        }
        return view('admin.education_add',compact('education'));
    }

    public function add(EducationAddRequest $request)
    {
        $status = 0;
        $order = $request->order;
        if (isset($request->status)) {
            $status = 1;
        }
        if (isset($request->educationID)) {
            $id = $request->educationID;
            $education = Education::where("id", $request->educationID)->update([
                "education_date" => $request->education_date,
                "university_name" => $request->university_name,
                "university_branch" => $request->university_branch,
                "description" => $request->description,
                "status" => $status,
                "order" => $order ? $order : 999
            ]);

            alert()->success('Guncellendi', $id.' id-li Egitim bilgisi guncellendi')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);


        } else{
            Education::create([
                "education_date" => $request->education_date,
                "university_name" => $request->university_name,
                "university_branch" => $request->university_branch,
                "description" => $request->description,
                "status" => $status,
                "order" => $order ? $order : 999
            ]);

            alert()->success('Basarili', 'Egitim bilgisi eklendi')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);
            return redirect()->route('admin.education.list');
        }




    }

    public function  delete(Request $request){
        $id = $request->educationID;

        Education::where('id',$id)->first()->delete();

        return response()->json([], 200);

    }
}
