<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

//use Psy\Util\Str;
use Illuminate\Support\Str;

class PersonalInformationController extends Controller
{
    public function index()
    {

        $information = PersonalInformation::find(1);
        return view('admin.personal_information', compact('information'));
    }

    public function update(Request $request)
    {
        $this->validate($request,
            [
                'cv' => 'mimes:pdf,doc,docx',
                'image' => 'mimes:jpeg,jpg,png'

            ],
            [
                'cv.mimes' => 'Secilen cv yalnizca .pdf, .doc, .docx uzantili olabilir.',
                'image.mimes' => 'Secilen resim yalnizca .jpeg, .jpg, .png uzantili olabilir.'
            ]);
        $information = PersonalInformation::find(1);
        // storage-a dosya ekleme
        if ($request->file('cv'))
        {
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;

            Storage::putFileAs('public/cv', $file, $fileOriginalName);
            $information->cv = 'public/cv/' . $fileOriginalName;
        }

        //storage-a resim ekleme
        if ($request->file('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;

            Storage::putFileAs('public/image', $file, $fileOriginalName);
            $information->image = 'public/image/' . $fileOriginalName;
        }

        $information->main_title = $request->main_title;
        $information->about_text = $request->about_text;
        $information->btn_contact_text = $request->btn_contact_text;
        $information->small_title_left = $request->small_title_left;
        $information->small_title_right = $request->small_title_right;
        $information->full_name = $request->full_name;
        $information->task_name = $request->task_name;
        $information->birthday = $request->birthday;
        $information->website = $request->website;
        $information->phone = $request->phone;
        $information->mail = $request->mail;
        $information->address = $request->address;
        $information->languages = $request->lang;
        $information->interests = $request->interests;

        $information->save();

        alert()->success('Basarili', 'Kisisel bilgiler guncellendi')->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);
        return redirect()->back();


    }
}
