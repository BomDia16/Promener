<?php

namespace App\Http\Controllers;

use App\Models\Passseador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasseadorController extends Controller
{
    private $passeador;

    public function __construct(Passseador $passeador)
    {
        $this->passeador = $passeador;
    }

    public function index_login()
    {
        return view('passeador.login');
    }

    public function index_register()
    {
        return view('passeador.register');
    }

    public function login(Request $request) {
        $dados = $request->all();
        $login = $this->passeador->login($dados);
        if(!$login) {
            return back()
                    ->withInput()
                    ->withErrors([
                        'As credenciais fornecidas não correspondem aos nossos registros.'
                    ]);
        }
        return redirect()->intended(route('passseador.index'));
    }

    public function logout() {
        $this->passeador->logout();
        return redirect()->route('passeador.login-view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('passeador')->check()) {
            return view('passeador.index');
        }
        return redirect()->route('passeador.login-view');
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
        $dados = $request->all();
        
        $inserir = $this->passeador->inserir($dados);
        if($inserir['status']) {
            return redirect()->route('passeador.login-view');
        }
        return redirect()
                ->back()
                ->withErrors($inserir['message']);
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
