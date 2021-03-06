<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::all();
        $id = 1;
        return view('donations.index', compact('donations'))->with('id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donations.create');
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
        $donation = new Donation();
        $donation->name = $request->name;
        $donation->firstphone = $request->firstphone;
        if ($request->secondphone) {
            $donation->secondphone = $request->secondphone;
        }
        $donation->address = $request->address;
        $donation->save();

        // Donation::create($request->all());

        return redirect()->back()->with('message', 'Donation created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        return view('donations.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $donation->update($request->all());
        return redirect()->route('donation.index')->with('message', 'Donation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donation.index')->with('success', 'Donation deleted successfully');
    }

    public function home()
    {
        $donations = Donation::orderBy('id', 'DESC')->get();
        return view('donation', compact('donations'));
    }
}
