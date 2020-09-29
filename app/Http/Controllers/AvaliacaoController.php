<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AvaliacaoFormRequest;
use App\Avaliacao;
use App\User;
use DB;
use DateTime;

class AvaliacaoController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }        

    public function index(Request $request){
        $avaliacoes = Avaliacao::query()->where('user_id', '=', Auth::id())->orderBy('area')->orderBy('status')->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('avaliacao.lista', ['avaliacoes' => $avaliacoes, 'mensagem' => $mensagem]);
    }

    public function create(){
        return view('avaliacao.area');
    }

    public function edit($id){
        $avaliacao = Avaliacao::find($id);
        return view('avaliacao.editar', [
            'avaliacao' => $avaliacao
        ]);
    }

    public function store(AvaliacaoFormRequest $request){
        $request->request->add(['data_criacao' => new DateTime()]);
        try{
            DB::beginTransaction();
            $avaliacao = new Avaliacao($request->all());
            $user = User::find(Auth::id());
            $user->avaliacoes()->save($avaliacao);
            DB::commit();
            $request->session()->flash('mensagem', "Avaliação $request->area iniciada com sucesso!");
            return redirect()->route('listar_avaliacao');                
        } catch (Exception $e){
            DB::rollback();
        }
    }
    
    public function update(Request $request, $id){
        $avaliacao = Avaliacao::find($id);
        $avaliacao->nota_fim = $request->nota_fim;
        $avaliacao->meta = $request->meta;
        $avaliacao->habito_bom = $request->habito_bom;
        $avaliacao->habito_ruim = $request->habito_ruim;
        $avaliacao->habilidade = $request->habilidade;
        $avaliacao->save();
        $request->session()->flash('mensagem', "Avaliação $request->area ajustada com sucesso!");
        return redirect()->route('listar_avaliacao');
    }

}
