<?php

namespace App\Http\Controllers;

use App\Models\Cachorro;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    private $totalPage = 7;

    private $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $pedidos = $this->pedido->where('user_id', '=', auth()->user()->id)
                                ->paginate($this->totalPage);
            return view('user.pedido',
                        compact('pedidos'));
        }
        return redirect()->route('user.login-view');
    }

    public function passeador()
    {
        if (Auth::guard('passeador')->check()) {
            $pedidos = $this->pedido->where('passeador_id', '=', auth()->guard('passeador')->user()->id)
                                    ->join(Cachorro::class, $this->pedido->id, '=', Cachorro::get())
                                    ->paginate($this->totalPage);
            dd($pedidos);
            
            return view('passeador.pedido',
                        compact('pedidos'));
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
        
        $inserir = $this->pedido->inserir($dados);
        if($inserir['status']) {
            return redirect()->route('cachorro.index');
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
        if (!$pedidos = $this->pedido->find($id)) {          
            return redirect()->route('pedido.index');
        }

        $dados = $request->all();

        $editando = $pedidos->update($dados);

        if($editando) {
            return redirect()->route('pedido.index');
        }
        
        return redirect()->back();
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
