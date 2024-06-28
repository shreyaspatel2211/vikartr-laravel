<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhatsappLogsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsAppLogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view whatsapp log', ['only' => ['index']]);
      
    }
    public function index(WhatsappLogsDataTable $dataTable)
    {
        return $dataTable->render('admin.whatsappLogs.index');
    }
}
