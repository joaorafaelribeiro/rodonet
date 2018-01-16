<?php

namespace App\Admin\Controllers;


use App\Assento;
use App\Veiculo;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Request;

class AssentoController extends Controller
{
    use ModelForm;
    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Assento');
            $content->breadcrumb(
                ['text' => 'Dashboard', 'url' => '/'],
                ['text' => 'Veículos', 'url' => '/veiculos'],
                ['text' => 'Assentos', 'url' => '/assentos'],
                ['text' => 'Novo']
            );
            $content->body($this->form());
        });
    }

        /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Assento::class, function (Form $form) {
            $form->tools(function (Form\Tools $tools) {
                $tools->disableBackButton();
            });
            $form->disableReset();
            $form->hidden('veiculo_id')->value(Request::input('veiculo_id'));
            $form->text('nome','Local' );
            $form->radio('janela','Janela?')->options([0=>'Não',1=>'Sim']);
            $form->saved(function (Form $form) {
                $success = new MessageBag([
                    'title' => 'Operação',
                    'message' => 'Assento cadastrado',
                ]);
                return redirect('/admin/veiculos/'.Request::input('veiculo_id').'/edit#tab_2087203549')->with(compact('success'));
            
            });
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
}
