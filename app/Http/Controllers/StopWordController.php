<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use App\StopWord;
class StopWordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'download');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stopword/index');
    }

    public function handleUpload(Request $request) {
		$path = $request->file('stopwords')->storeAs(
		    'files', 'stopwords.txt', 'public_uploads'
		);
        if ($file = fopen("uploads/files/stopwords.txt", "r")) {
            StopWord::truncate();
            while(!feof($file)) {
                $line = trim(fgets($file));
                StopWord::firstOrCreate(['word' => $line]);
            }
            fclose($file);
        }
		return redirect('/stopwords');
    }

    public function download(){
    	return Storage::download('/public/uploads/files/stopwords.txt');
    }

    public function show(){
        $words = StopWord::all();
        foreach ($words as $key) {
            # code...
            print_r($key->word);
            print_r("<br/>");
        }
    }
}
