<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailDemo;
use Illuminate\Support\Facades\Mail;

class BuyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::latest()->get();
        return view('buyers.index', ['buyers' => $buyers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyers.create');
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
            'nama_pembeli' => 'required|string|max:255',
            'email_pembeli' => 'required|max:255|unique:buyers,email_pembeli|email:rfc,dns',
            'stocks_id' => 'required|exists:stocks,id',
            'no_hp' => 'required|numeric',
            'jumlah_mobil' => 'required|numeric'
        ]);

        $buyer = Buyer::create($request->all());

        $stk = Stock::findOrFail($request->stocks_id);
        $stk->stock_mobil -= $request->jumlah_mobil;
        $stk->save();

        Mail::to($request->email_pembeli)->send(new EmailDemo($buyer));

        return redirect('/buyers')->with('status', 'New Buyer Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        $stock = $buyer->stock;
        return view ('buyers.show', compact('buyer','stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        return view('buyers.edit', compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'email_pembeli' => 'required|max:255|email:rfc,dns|unique:buyers,email_pembeli,'.$buyer->id,
            'stocks_id' => 'required',
            'no_hp' => 'required|numeric',
            'jumlah_mobil' => 'required|numeric'
        ]);

        $stk = Stock::findOrFail($buyer->stocks_id);
        $stk->stock_mobil += $buyer->jumlah_mobil;
        $stk->save();



        Buyer::where('id', $buyer->id)
            ->update([
                'nama_pembeli' => $request->nama_pembeli,
                'email_pembeli' => $request->email_pembeli,
                'stocks_id' => $request->stocks_id,
                'no_hp' => $request->no_hp,
                'jumlah_mobil' => $request->jumlah_mobil
            ]);

        $stk = Stock::findOrFail($request->stocks_id);
        $stk->stock_mobil -= $request->jumlah_mobil;
        $stk->save();


        return redirect('/buyers')->with('status', 'Data Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {

        $stk = Stock::findOrFail($buyer->stocks_id);
        $stk->stock_mobil += $buyer->jumlah_mobil;
        $stk->save();

        Buyer::destroy($buyer->id);
        return redirect('/buyers')->with('status', 'Data Successfully Deleted!');
    }


}

