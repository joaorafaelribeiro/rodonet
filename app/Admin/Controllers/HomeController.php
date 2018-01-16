<?php

namespace App\Admin\Controllers;

use App\Veiculo;
use App\Viagem;
use App\Motorista;
use App\Bilhete;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Resumo dos dados do sistema');

            
            $content->row(function (Row $row) {
                $infoBox1 = new InfoBox('Viajens (Hoje)', 'road', 'green', '/admin/viagens', Viagem::hoje());
                $infoBox2 = new InfoBox('Bilhetes (Hoje)', 'ticket', 'yellow', '/admin/bilhetes', Bilhete::hoje());
                $infoBox3 = new InfoBox('Veículos', 'car', 'red', '/admin/veiculos', Veiculo::count());
                $infoBox4 = new InfoBox('Motoristas', 'users', 'aqua', '/admin/motoristas', Motorista::count());
                $row->column(3, $infoBox1);
                $row->column(3, $infoBox2);
                $row->column(3, $infoBox3);
                $row->column(3, $infoBox4);
            });

            $content->row(function (Row $row) {

                
                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });
                
                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
                            $row->column(4, function (Column $column) {
                                $column->append(Dashboard::environment());
                            });
            });
        });
    }
}
