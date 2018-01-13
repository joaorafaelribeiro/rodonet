<?php

namespace App\Admin\Controllers;

use App\Veiculo;
use App\Assento;
use App\TipoVeiculo;
use App\TipoCombustivel;

use Illuminate\Http\Request;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\MessageBag;

class VeiculoController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Veículos');
            $content->description('listagem dos veículos');
            $content->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/'],
                ['text' => 'Veículos', 'url' => '/veiculos']
            );
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Editar Veículo');
            $content->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/'],
                ['text' => 'Veículos', 'url' => '/veiculos'],
                ['text' => 'Editando']
            );
            $grid = Admin::grid(Assento::class, function(Grid $grid) use ($id) {
                $grid->model()->where('veiculo_id','=',$id)->orderBy('nome');
                $grid->column('nome','local')->editable();
                $states = [
                    'on'  => ['value' => 1, 'text' => 'Sim', 'color' => 'primary'],
                    'off' => ['value' => 0, 'text' => 'Não', 'color' => 'danger'],
                ];
                $grid->janela()->switch($states);
                $grid->paginate(20);
                $grid->disableFilter();
                $grid->disableExport();
                $grid->disableRowSelector();
                $grid->disablePagination();
                $grid->actions(function ($actions) {
                    $actions->disableEdit();
                });
                
            });
            $tab = new Tab();
            $tab->add('Veículo',$this->form()->edit($id));
            $tab->add('Assentos',$grid);
            $content->body($tab);
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Novo Veículo');
            $content->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/'],
                ['text' => 'Veículos', 'url' => '/veiculos'],
                ['text' => 'Novo']
            );
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Veiculo::class, function (Grid $grid) {

            $grid->column('placa')->sortable();
            $grid->column('modelo');
            $grid->column('marca');
            $grid->column('tipo_veiculo_id','Tipo')->display(function($id){
                return TipoVeiculo::find($id)->nome;
            });
            $grid->column('tipo_combustivel_id','Combustível')->display(function($id){
                return TipoCombustivel::find($id)->nome;
            });
            $grid->column('ano','Ano');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Veiculo::class, function (Form $form) {
            $form->tools(function (Form\Tools $tools) {
                $tools->disableBackButton();
            });
            $form->disableReset();
            $form->hidden('id');
                $form->text('placa' )->rules('required|regex:/\w\w\w-\d\d\d\d/',[
                    'regex' => 'Formato é AAA-9999'
                ]);
                $form->text('modelo')->rules('required');
                $form->text('marca' )->rules('required');
                $form->text('ano'   )->rules('required');
                $form->text('renavam'   )->rules('required');
                $form->select('tipo_veiculo_id',  'Tipo' )->options(TipoVeiculo::all()->pluck('nome','id'))->rules('required');
                $form->select('tipo_combustivel_id',  'Combustível' )->options(TipoCombustivel::all()->pluck('nome','id'))->rules('required');
        });
    }

    public function updateAssento($veiculo_id, $assento_id, Request $request) {
        $assento = Assento::find($assento_id);
        $assento->fill($request->all());
        if($request->get('janela')) {
            $assento->janela = ($request->get('janela') == 'on');
        }
        $assento->save();
        return new MessageBag([
            'title'   => 'title...',
            'message' => 'Assento atualizado',
        ]);
    }

    public function deleteAssento($veiculo_id, $assento_id, Request $request) {
        $assento = Assento::find($assento_id);
        $assento->delete();
        return new MessageBag([
            'title'   => 'title...',
            'message' => 'Assento excluído',
        ]);
    }

    public function createAssento($veiculo_id, Request $request) {
        $assento = new Assento();
        $assento->veiculo_id = $veiculo_id;
        $assento->nome = '##';
        $assento->janela = true;
        $assento->save();
        $success = new MessageBag([
            'title'   => 'Novo assento cadastrado',
            //'message' => 'Operação realizada com sucesso',
        ]);    
        return back()->with(compact('success'));
    }

}
