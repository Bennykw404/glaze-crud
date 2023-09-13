<?php

namespace App\Exports;

use App\Models\Glaze;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GlazeExport implements FromView
{
    public function view(): View
    {
        return view('pages.dataga.exports-xlsx', [
            'dataga' => Glaze::all()
        ]);
    }
}
