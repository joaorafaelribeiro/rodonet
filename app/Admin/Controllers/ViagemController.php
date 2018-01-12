<?php

namespace App\Admin\Controllers;

use App\Viagem;
use App\Bilhete;
use App\Parada;
use App\Veiculo;
use App\TipoVeiculo;
use App\Motorista;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ViagemController extends Controller
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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');
            $tab = new Tab();
            $rows = Bilhete::join('pessoas','pessoas.id','=','pessoa_id')->where('viagem_id','=',$id)
            ->select('pessoas.cpf','pessoas.nome','pessoas.data_nascimento','assento')->get();
            
            //$rows = array_pluck($rows,['cpf','nome','data_nascimento','assento']);
            $table = new Table(['CPF', 'Name', 'Idade', 'Assento'], $rows->toArray());
            $tab->add('Viagem',$this->form()->edit($id));
            $tab->add('Passageiros',$table);
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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Viagem::class, function (Grid $grid) {

            $grid->column('data','Saída')->sortable();
            $grid->column('veiculo.placa','Veículo');
            $grid->column('veiculo_id','Tipo')->display(function($id){
                $tipo = Veiculo::find($id)->tipo_veiculo_id;
                return TipoVeiculo::find($tipo)->nome;
            });
            $grid->column('origem.nome','Origem');
            $grid->column('destino.nome','Destino');
            $grid->column('valor','Valor');            
            $grid->filter(function ($filter) {

                $filter->between('data', 'Saída')->datetime();
            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = Admin::form(Viagem::class, function (Form $form) {

            $form->datetime('data');
            $form->select('origem_id','Origem')->options(Parada::all()->pluck('nome','id'));
            $form->select('destino_id','Destino')->options(Parada::all()->pluck('nome','id'));
            $form->select('veiculo_id','Veículo')->options(Veiculo::all()->pluck('placa','id'));
            $form->select('motorista_id','Motorista')->options(Motorista::all()->pluck('pessoa.nome','id'));
            $form->currency('valor')->symbol('R$');
            $form->hidden('id');
        });
        
        return $form;
        
    }
}
