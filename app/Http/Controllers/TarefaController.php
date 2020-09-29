<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TarefaFormRequest;
use App\Tarefa;
use App\Avaliacao;
use Config;
use DB;
use DateTime;

class TarefaController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
        

    public function index(Request $request, $avalId) {
        $tarefas = Tarefa::query()->where('avaliacao_id', '=', $avalId)->orderByDesc('data_criacao')->get();
        $avaliacao = Avaliacao::find($avalId);
        return view('tarefa.lista', [
            'tarefas' => $tarefas,
            'avalId' => $avalId,
            'area' => $avaliacao->area,
            'status' => $avaliacao->status,
        ]);
    }

    public function create($avalId){
        return view('tarefa.adicionar', [
            'avalId' => $avalId
        ]);
    }

    public function edit($avalId, $id){
        $tarefa = Tarefa::find($id);
        return view('tarefa.editar', [
            'tarefa' => $tarefa,
            'avalId' => $avalId
        ]);
    }

    public function store(TarefaFormRequest $request, $avalId){
        $request->request->add(['data_criacao' => new DateTime()]);
        try{
            DB::beginTransaction();
                $tarefa = new Tarefa($request->all());
                $avaliacao = Avaliacao::find($avalId);
                $avaliacao->tarefas()->save($tarefa);
            DB::commit();
                return redirect()->route('listar_tarefa', [
                    'avalId' => $avalId
                ]);
        } catch (Exception $e){
            DB::rollback();
        }
    }

    public function update(Request $request, $avalId, $id){
        try{
            DB::beginTransaction();
                $tarefa = Tarefa::find($id);
                $tarefa->energia_fim = $request->energia_fim;
                $tarefa->objetivo_meta = $request->objetivo_meta;
                $tarefa->objetivo_habito_bom = $request->objetivo_habito_bom;
                $tarefa->objetivo_habito_ruim = $request->objetivo_habito_ruim;
                $tarefa->objetivo_habilidade = $request->objetivo_habilidade;
                $tarefa->objetivos_obtidos = $request->objetivos_obtidos;
                $tarefa->save();
                $this->count($avalId);
            DB::commit();
            return redirect()->route('listar_tarefa', [
                'avalId' => $avalId
            ]);
        } catch (Exception $e){
            DB::rollback();
        }
    }

    public function count($avalId){
        try{
            $count = Tarefa::query()->where('avaliacao_id', '=', $avalId)->count();
            if ( $count == Config::get('constants.habito') ) {
                DB::beginTransaction();
                    $total = Tarefa::query()->where('avaliacao_id', '=', $avalId)->sum('objetivos_obtidos');
                    $avaliacao = Avaliacao::find($avalId);
                    $avaliacao->objetivo_total = $total;
                    $avaliacao->status = 'finalizado';
                    $avaliacao->save();
                DB::commit();
            }
        } catch (Exception $e){
                DB::rollback();
        }
    }

}
