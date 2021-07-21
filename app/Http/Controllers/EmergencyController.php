<?php

namespace App\Http\Controllers;

use App\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergencies = Emergency::all();
        $id = 1;
        return view('emergencies.index', compact('emergencies'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emergencies.create');
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
            'name' => 'required',
            'firstphone' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $volunteer = new Emergency();
        if ($request->file('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('uploads', $imageName, 'public');

            $volunteer->path = '/storage/'. $path;
        }

        $volunteer->name = $request->name;
        $volunteer->firstphone = $request->firstphone;
        if ($request->secondphone) {
            $volunteer->secondphone = $request->secondphone;
        }
        $volunteer->address = $request->address;
        $volunteer->save();

        return redirect()->back()->with('message', 'Emergency created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function show(Emergency $emergency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function edit(Emergency $emergency)
    {
        return view('emergencies.edit', compact('emergency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emergency $emergency)
    {
        $emergency->update($request->all());

        return redirect()->route('emergency.index')->with('message', 'Emergency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emergency $emergency)
    {
        $emergency->delete();

        return redirect()->route('emergency.index')->with('message', 'Emergency deleted successfully');
    }

    public function home()
    {
        $emergencies = Emergency::all();

        return view('emergency', compact('emergencies'));
    }
}
