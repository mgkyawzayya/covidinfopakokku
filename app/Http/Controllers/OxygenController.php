<?php

namespace App\Http\Controllers;

use App\Oxygen;
use Illuminate\Http\Request;

class OxygenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oxygens = Oxygen::all();
        $id = 1;
        return view('oxygens.index', compact('oxygens'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oxygens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'firstphone' => 'required',
            'address' => 'required',
        ]);
        if ($request->has('status')) {
            $oxygen = new Oxygen();
            $oxygen->name = $request->name;
            $oxygen->firstphone = $request->firstphone;
            if ($oxygen->descriptions) {
                $oxygen->descriptions = $request->descriptions;
            }
            if ($request->secondphone) {
                $oxygen->secondphone = $request->secondphone;
            }
            $oxygen->status = true;
            $oxygen->address = $request->address;
            $oxygen->save();
        } else {
            Oxygen::create($request->all());
        }
        return redirect()->back()->with('message', 'Oxygen created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oxygen  $oxygen
     * @return \Illuminate\Http\Response
     */
    public function show(Oxygen $oxygen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oxygen  $oxygen
     * @return \Illuminate\Http\Response
     */
    public function edit(Oxygen $oxygen)
    {
        return view('oxygens.edit', compact('oxygen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oxygen  $oxygen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oxygen $oxygen)
    {
        if ($request->status == 'on') {
            $oxygen->update(['name' => $request->name, 'firstphone' => $request->firstphone, 'secondphone' => $request->secondphone, 'status'=> true, 'descriptions' => $request->descriptions, 'address' => $request->address]);
        } else {
            $oxygen->update(['name' => $request->name, 'firstphone' => $request->firstphone, 'secondphone' => $request->secondphone, 'status'=> false, 'descriptions' => $request->descriptions, 'address' => $request->address]);
        }
        return redirect()->route('oxygen.index')->with('message', 'Oxygen updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oxygen  $oxygen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oxygen $oxygen)
    {
        $oxygen->delete();
        return redirect()->route('oxygen.index')->with('message', 'Oxygen deleted successfully');
    }
}
