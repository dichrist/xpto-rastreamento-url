<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = DB::table('urls')
                    ->orderBy('id', 'desc')
                    ->get();

        return view(
            'admin.urls.index', 
            ['urls' => $urls]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $url = new Url();
        $url->link = $request->link;

        $url->save();

        $request->session()->flash('message', 'Url cadastrada com sucesso!');

        return redirect()->route('url.view');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = Url::find($id);

        return view(
            'admin.urls.details', 
            ['url' => $url]
        );
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        return view('admin.urls.delete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Url::find($id)->delete();

        return redirect()->route('url.view');
    }
}
