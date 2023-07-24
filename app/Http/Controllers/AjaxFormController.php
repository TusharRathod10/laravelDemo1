<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajax;
use Illuminate\Support\Facades\File;

class AjaxFormController extends Controller
{
    public function create(Request $request)
    {
        $ajax = new ajax;

        // if ($request->hasFile('profile')) {
        //     $file = $request->file('profile');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = rand(111111111, 999999999) . '.' . $extension;
        //     $file->move('assets/ajax/', $filename);
        // }
        if ($files = $request->file('profile')) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111111111, 999999999) . '.' . $extension;
                $file->move('assets/ajax/', $filename);
                $image[] = $filename;
            }
            $ajax->profile = implode(',', $image);
        }
        $ajax->name = $request->name;
        $ajax->email = $request->email;
        $ajax->password = $request->password;
        // $ajax->profile = $filename;

        $ajax->save();
        return response()->json(['res' => 'Data Insert Successfully']);
    }
    public function alldata()
    {
        $data = Ajax::all();
        return response()->json(['alldata' => $data]);
    }
    public function deletedata($id)
    {
        $data = Ajax::where('id', $id)->first();
        $image = explode(',', $data->profile);
        foreach ($image as $img) {
            $destination = 'assets/ajax/' . $img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $data->delete();

        return response()->json(['res' => 'Data Delete Successfully']);
    }
    public function editdata($id)
    {
        $data = Ajax::where('id', $id)->get();
        return view('ajax.ajax-edit', ['editdata' => $data]);
    }
    public function updatedata(Request $request)
    {
        $data = Ajax::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;

        if ($request->hasFile('profile')) {
            foreach (explode(',', $data->profile) as $img) {
                $destination = 'assets/ajax/' . $img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            if ($files = $request->file('profile')) {
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111111111, 999999999) . '.' . $extension;
                    $file->move('assets/ajax/', $filename);
                    $image[] = $filename;
                }
                $data->profile = implode(',', $image);
            }
            // if ($request->file('profile')) {
            //     $file = $request->file('profile');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = rand(111111111, 999999999) . '.' . $extension;
            //     $file->move('assets/ajax/', $filename);
            // }
            // $data->profile = $filename;
        }

         $data->save();
        return response()->json(['res' => 'Data Update Successfully']);
    }
}
