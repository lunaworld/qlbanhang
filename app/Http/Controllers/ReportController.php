<?php

namespace App\Http\Controllers;

use App\Models\OrderDetailModel;
use Illuminate\Http\Request;
use App\Models\OrderDetaiModel;
use App\Exports\ExportDemo;
use Excel;
class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $orderDetailModel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->orderDetailModel = new OrderDetailModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['data'] = $this->orderDetailModel->get();
        $customname = 'gggg';
        return Excel::download(new ExportDemo, $customname.'xlsx', \Maatwebsite\Excel\Excel::XLSX);
        // return view('report.index',$data);
    }

}
