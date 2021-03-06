<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeaSer;
use App\TeaCat;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TeaSerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacategories = TeaCat::orderBy('id', 'asc')
        // Paginate the contents
        ->paginate(4);
        $teaseries = TeaSer::all();

        //toast('Tea Menu Redirect successful', 'info')->position('top');
        //return $teacategories;
        return view('teaser.index', compact('teacategories', 'teaseries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teaseries = TeaSer::all();
        $teacategories = TeaCat::all();
        return view('teaser.create', compact('teacategories', 'teaseries'))->withSuccess('Created Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png,gif,psd|required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        //store data
        $teaserie = new TeaSer();

        $teaserie->tea_cat_id = $request->input('cats_id');
        $teaserie->name = $request->input('name');
        $teaserie->description = $request->input('description');
        $teaserie->price = $request->input('price');

        if($request->hasfile('image')) {

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('/img', $filename, 'public');

            $teaserie->image = $filename;
        }else{
            return $request;
            $teaserie->image = '';
        }

        //return $teaserie;
        $teaserie->save();
    
        return redirect('/teaser')->withSuccess('Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teaserie = TeaSer::find($id);
        $_tea_cat_id = $teaserie->tea_cat_id;
        $teacategory = TeaCat::find($_tea_cat_id);
        //return $teaserie;
        return view('teaser.show', compact('teacategory', 'teaserie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teaserie = TeaSer::find($id);
        $_tea_cat_id = $teaserie->tea_cat_id;
        $teacategory = TeaCat::find($_tea_cat_id);
        //return $teacategory;
        return view('teaser.edit', compact('teacategory', 'teaserie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png,gif,psd|required',
        ]);

        if ($validator->fails()||($request->image->getClientOriginalName() == 'noimamge.png')) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput($request->all());
        }

        //update data
        // $teaserie = TeaSer::find($id);

        // $teaserie->name = $request->input('name');
        // $teaserie->description = $request->input('description');
        // $teaserie->price = $request->input('price');
        
        // if($request->hasfile('image')) {

        //     $filename = $request->image->getClientOriginalName();
        //     $request->image->storeAs('/img', $filename, 'public');

        //     $teaserie->image = $filename;
        // }

        // $teaserie->save();
    
        //return $teaserie;
        return redirect('/teas')->withSuccess('Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $teaserie = TeaSer::find($id);
        $teaserie->delete($teaserie->id);
        
        alert('Delete Success',$teaserie->name." deleted", 'success');
        return redirect('/teas');
    }

    

}
