<?php

namespace App\Admin\Controllers;

use App\Motorista;
use App\Pessoa;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MotoristaController extends Controller
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
        return Admin::grid(Motorista::class, function (Grid $grid) {

            
            $grid->column('pessoa.cpf', 'CPF');
            $grid->column('pessoa.nome', 'Nome');
            $grid->column('hab_categoria', 'Categoria');            
            $grid->column('hab_validade', 'Validade');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Motorista::class, function (Form $form) {

            $form->hidden('pessoa_id');
            $form->hidden('pessoa.id');
            $form->text('pessoa.cpf','CPF')->options(['mask' => '999.999.999-99']);
            $form->text('pessoa.nome','Nome');
            $form->date('pessoa.data_nascimento','Data de Nasc.');
            $form->text('pessoa.mae','Mãe');
            $form->text('pessoa.pai','Pai');
            $form->email('pessoa.email','E-mail');
            $form->mobile('pessoa.tel','Telefone')->options(['mask' => '(999) 9999-9999']);
            $form->divide();
            $form->text('hab_numero','Habilitação');
            $form->text('hab_categoria','Categoria');
            $form->date('hab_validade','Validade');

            $form->saving(function (Form $form) {
                $pessoa = new Pessoa();
                $pessoa->fill($form->pessoa);
                if($pessoa->id)
                    $pessoa->update();
                else
                    $pessoa->save();
                $form->pessoa_id = $pessoa->id; 
            });

        });
    }
}
