<?php

namespace App\Admin\Controllers;

use App\Pessoa;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PessoaController extends Controller
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

            $content->header('Passageiros');
            $content->description('listas dos passageiros cadastrados no sistema');

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
        return Admin::grid(Pessoa::class, function (Grid $grid) {
            $grid->disableRowSelector();
            //$grid->disableCreation();
            $grid->actions(function ($actions) {
                $actions->append('<a href=""><i class="fa fa-eye"></i></a>');
                $actions->disableDelete();
            });
            $grid->paginate(50);
            $grid->column('cpf','CPF');
            $grid->column('nome')->sortable();
            $grid->column('email');
            $grid->column('data_nascimento','Nasc');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Pessoa::class, function (Form $form) {

            $form->hidden('id', 'ID');
            $form->text('cpf')->rules('required|cpf');
            $form->text('nome')->rules('required');
            $form->date('data_nascimento')->rules('required');
            $form->text('pai');
            $form->text('mae');
            $form->email('email')->rules('required');
            $form->hidden('tel');
            

        });
    }

    
}
