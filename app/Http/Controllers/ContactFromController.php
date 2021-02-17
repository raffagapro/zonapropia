<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Categoria;
use App\Models\ContactLeads;
use App\Models\Proyecto;
use App\Mail\ContactFormMail;

class ContactFromController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 0;
        $contact = ContactLeads::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'priceRange' => $request->priceRange,
            'message' => $request->message,
            'status' => $status,
        ]);
        if ($request->category !== null) {
            $cat = Categoria::findOrFail($request->category);
            $cat->contactLeads()->save($contact);
        }
        if ($request->proyect !== null) {
            // dd($request->proyect);
            $proyecto = Proyecto::findOrFail((int)$request->proyect);
            $proyecto->contactLeads()->save($contact);
        }
        Mail::to($request->mail)->send(new ContactFormMail($contact));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
