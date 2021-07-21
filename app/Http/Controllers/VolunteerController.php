<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        $id = 1;
        return view('volunteers.index', compact('volunteers'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('volunteers.create');
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

        $volunteer = new Volunteer();
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

        return redirect()->back()->with('message', 'Volunteer created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $volunteer->update($request->all());
        return redirect()->route('volunteer.index')->with('message', 'Volunteer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index')->with('message', 'Volunteer deleted successfully');
    }


    public function home()
    {
        $volunteers = Volunteer::all();

        return view('volunteer', compact('volunteers'));
    }
}
