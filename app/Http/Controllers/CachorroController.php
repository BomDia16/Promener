<?php

namespace App\Http\Controllers;

use App\Models\Cachorro;
use App\Models\Passseador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CachorroController extends Controller
{
    private $cachorro;

    public function __construct(Cachorro $cachorro)
    {
        $this->cachorro = $cachorro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $cachorros = $this->cachorro->where('user_id', '=', auth()->user()->id)->get();
            return view('user.cachorro', 
                    compact('cachorros'));
        }
        return redirect()->route('user.login-view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('user.create-cachorro');
        }
        return redirect()->route('user.login-view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(Auth::check()) {
            $dados = $request->all();
            
            $inserir = $this->cachorro->inserir($dados);
            if($inserir['status']) {
                return redirect()->route('cachorro.index');
            }
            return redirect()
                    ->back()
                    ->withErrors($inserir['message']);
        }
        return redirect()->route('user.login-view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $cachorro = $this->cachorro->find($id);
            $passeadores = Passseador::get();
            $passeador = $passeadores->random();

            return view('user.create-pedido',
                            compact('cachorro', 'passeador'));
        }
        return redirect()->route('user.login-view');
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
