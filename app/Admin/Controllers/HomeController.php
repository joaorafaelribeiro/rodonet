<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Dashboard');
            $content->description('Resumo dos dados do sistema');

            //$content->row(Dashboard::title());

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