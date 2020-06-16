<?php

namespace App\Http\Controllers;

use App\User;
use App\Card;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wallets.show');
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
        //
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
        $request->validate([
            'seriNumber' => 'required',
        ]);
        if (Card::where('seri_number', $request->seriNumber)->doesntExist()) {
            session()->flash('success', 'Wrong seri number.');
            return redirect(route('wallets.index'));
        } else {
            if (Card::where(['seri_number' => $request->seriNumber])->value('status') == 0) {
                session()->flash('success', 'Seri number has been used.');
                return redirect(route('wallets.index'));
            } else {
                $card_value = Card::where(['seri_number' => $request->seriNumber])->value('value');
                if (($request->yourSelf) == 1) {
                    $user = User::find($id);
                    $user->wallet = $user->wallet + $card_value;
                    $card = Card::where('seri_number', $request->seriNumber)->update(['status' => 0]);
                    $user->save();
                    session()->flash('success', 'Charged successfully.');
                    return redirect(route('wallets.index'));
                } else if ($request->friendEmail == 0) {
                    $request->validate([
                        'friendEmail' => 'required',
                    ]);
                    if (User::where('email', $request->friendEmail)->doesntExist()) {
                        session()->flash('success', 'Wrong email.');
                        return redirect(route('wallets.index'));
                    } else {
                        $friend_user = User::where('email', $request->friendEmail)->first();
                        $friend_user->wallet = $friend_user->wallet + $card_value;
                        $card = Card::where('seri_number', $request->seriNumber)->update(['status' => 0]);
                        $friend_user->save();
                        session()->flash('success', 'Charged successfully.');
                        return redirect(route('wallets.index'));
                    }
                }
            }
        }
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
