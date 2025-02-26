<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{
    public function downloadTemplateXLS($filename)
    {
        $filePath = storage_path("/template-excel/{$filename}");
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($filePath);
    }
}
