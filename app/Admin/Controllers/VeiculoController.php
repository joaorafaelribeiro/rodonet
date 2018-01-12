<?php

namespace App\Admin\Controllers;

use App\Veiculo;
use App\TipoVeiculo;
use App\TipoCombustivel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

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
            $content->body($this->form()->edit($id));
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
            // $tab = new Tab();
            // $tab->add('Veículo',$form);
            $form->tools(function (Form\Tools $tools) {

                // Disable back btn.
                $tools->disableBackButton();
            
            });
            $form->disableReset();
            $form->tab('Veículo',function(Form $form){
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
            $form->tab('Assentos',function(Form $form){
                $form->hasMany('assentos', function (Form\NestedForm $form) {
                    $form->text('nome','Local');
                    $form->radio('janela', 'Janela?')->options([1 => 'Sim', 0 => 'Não']);
                });
            });
            
        });
    }
}
