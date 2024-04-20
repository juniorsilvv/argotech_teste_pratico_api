<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\TodoListModel;
use App\Http\Requests\CreateTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use App\Http\Requests\UpdateStatusTodoListRequest;

class TodoListController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new TodoListModel();
    }

    /**
     * Retorna todas as tarefas
     * @return void
     * @author Junior <hjuniorbsilva@gmail.com>
     */
    public function all()
    {
        $list = $this->model->all();
        return response()->json($list);
    }

    /**
     * Cria a tarefa
     *
     * @param CreateTodoListRequest $request
     * @return void
     * @author Junior <hjuniorbsilva@gmail.com>
     */
    public function create(CreateTodoListRequest $request)
    {
        try {
            $todoListId = $this->model->create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Tarefa criada com sucesso',
                'data' => $todoListId
            ]);

        } catch (Exception $e) {
           return response()->json([
            'error' => true,
            'message' => 'Erro ao criar tarefa'
           ]);
        }
    }

    /**
     * Atuliza a tarefa
     *
     * @param UpdateTodoListRequest $request
     * @return void
     * @author Junior <hjuniorbsilva@gmail.com>
     */
    public function update(UpdateTodoListRequest $request)
    {
        try {
            $this->model->find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Tarefa Atualizado com sucesso'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erro ao atualizar tarefa'
            ]);
        }
    }

    /**
     * Muda o status da tarefa
     *
     * @param UpdateStatusTodoListRequest $request
     * @return void
     * @author Junior <hjuniorbsilva@gmail.com>
     */
    public function updateStatus(UpdateStatusTodoListRequest $request)
    {
        try {
            $this->model->find($request->id)->update([
                'status' => $request->status
            ]);
            return response()->json([
                'error' => false,
                'message' => 'Status da tarefa atualizado com sucesso'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erro ao atualizar status da tarefa'
            ]);
        }
    }

    /**
     * Apaga a tarefa
     *
     * @param DeleteTodoListRequest $request
     * @return void
     * @author Junior <hjuniorbsilva@gmail.com>
     */
    public function delete(Request $request)
    {
        try {
            $this->model->find($request->id)->delete();
            return response()->json([
                'error' => false,
                'message' => 'Tarefa apagada com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Erro ao apagar tarefa',
            ]);
        }
    }
}
