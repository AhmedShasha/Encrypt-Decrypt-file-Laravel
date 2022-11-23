<?php

namespace App\Http\Controllers\AES;

use App\Http\Controllers\Controller;
use App\Models\AES\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Response;
use SoareCostin\FileVault\Facades\FileVault;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // for get all files
    public function index()
    {
        $files = File::all();
        return view('AES-App.index', compact('files'));
    }

    // store & save file
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $file = new File();
        
        // file variables definition
        $fileSize = $request->file->getSize(); // size in bytes
        $fileExtention = $request->file->extension();
        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName);

        $file->name = time() . '_' . $request->file->getClientOriginalName();   // uniqe name with time 
        $file->path = '/storage/' . $filePath;

        // store file data
        $file->name = $fileName;
        $file->size = $fileSize;    // in bytes
        $file->path = $filePath;
        $file->extention = $fileExtention;

        $file->save();

        toast()->success('Added Successfully');
        return redirect()->route('home');
    }

    // function download attachments
    public function preview($id)
    {
        $file = File::find($id);

        $filepath = storage_path('app/uploads')."/".$file->name;
        
        return Response::download($filepath);         

    }

    public function destroy($id)
    {

        $file = File::find($id);

        $filepath = storage_path('app/uploads')."/".$file->name;
        unlink($filepath);  // unlink from storage

        $file->delete();

        // toast()->success('Deleted Successfully');
        return redirect()->back();
    }

    public function encryptfile($id)
    {
        $file = File::find($id);
        $file->fill([
            'path' => Crypt::encryptString($file->path)
        ])->save();


        $file->status = 1;
        $file->update();

        toast()->success('Path Encrypted Successfully');
        return redirect()->route('home');
    }

    public function decryptfile($id)
    {
        $file = File::find($id);

        $file->path = Crypt::decryptString($file->path);
        $file->status = 0;
        $file->update();

        toast()->success('Path Decrypted Successfully');
        return redirect()->route('home');
    }
}
