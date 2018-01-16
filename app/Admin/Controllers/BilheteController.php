<?php

namespace App\Admin\Controllers;

use App\Bilhete;
use App\Pessoa;
use App\Viagem;
use App\Assento;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\DB;

class BilheteController extends Controller
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
        return Admin::grid(Bilhete::class, function (Grid $grid) {

            $grid->column('data')->sortable();
            $grid->column('pessoa.cpf','CPF');
            $grid->column('pessoa.nome','Nome');
            $grid->column('viagem_id','Viagem')->display(function($id){
                $viagem = Viagem::find($id);
                return $viagem->data.' - '.$viagem->origem->nome.' x '.$viagem->destino->nome;
            });
            $grid->column('assento.nome','Assento');
            $grid->column('valor','Valor');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Bilhete::class, function (Form $form) {

            $form->select('pessoa_id', 'Passageiro')->options(function ($id) {
                $pessoa = Pessoa::find($id);
            
                if ($pessoa) {
                    return [$pessoa->id => $pessoa->cpf.' - '.$pessoa->nome];
                }
            })->ajax('/api/pessoa');
            $form->select('viagem_id', 'Viagem')->options(Viagem::disponiveis()->pluck('text','id'))->load('assento_id','/api/assentos');
            $form->select('assento_id', 'Assento')->options(function ($id) {
                $assento = Assento::find($id);
                if ($assento) {
                    return [$assento->id => $assento->nome];
                }
            });
            $form->currency('valor', 'Valor')->symbol('R$');
            $form->hidden('data')->value(now());
            
        });
    }
}
