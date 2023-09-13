<?php

namespace App\Http\Controllers;

use App\Models\Glaze;
use PDF;
use App\Exports\GlazeExport;
use App\Imports\GlazeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Glaze::query();

            // Mengambil filter tanggal dari input tersembunyi
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');

            if ($start_date && $end_date) {
                $data->whereBetween('created_at', [$start_date, $end_date]);
            }

            $data = $data->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.pages.dataga.index');
    }

    public function exportpdf()
    {
        $report =  Glaze::all();
        view()->share('report', $report);
        $pdf = PDF::loadView('admin.pages.dataga.print-pdf')->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function export()
    {
        return Excel::download(new GlazeExport, 'glaze.xlsx');
    }

    public function import()
    {
        Excel::import(new GlazeImport, 'glaze.xlsx');

        return redirect()->route('admin.data')->with('success', 'Data Berhasil Di Import!');
    }
}
