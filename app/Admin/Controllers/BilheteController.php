<?php

namespace App\Admin\Controllers;

use App\Bilhete;
use App\Pessoa;
use App\Viagem;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

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
            $grid->column('assento','Assento');
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
                    return [$pessoa->id => $pessoa->name];
                }
            })->ajax('/api/pessoa');
            $form->select('viagem_id', 'Viagem')->options(function ($id) {
                $viagem = Viagem::find($id);
            
                if ($viagem) {
                    return [$viagem->id => $viagem->data.' - '.$viagem->origem->nome.' x '.$viagem->destino->nome];
                }
            })->ajax('/api/viagem');
            $form->text('assento', 'Assento');
            $form->currency('valor', 'Valor')->symbol('R$');
            $form->hidden('data')->value(now());
            
        });
    }
}
