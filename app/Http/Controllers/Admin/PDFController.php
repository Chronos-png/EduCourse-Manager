<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Kursus;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Example data to pass into the PDF view
        $courses = Kursus::all();

        // Load the view with data and pass 'kursus' variable to the view
        $pdf = Pdf::loadView('dashboard.admin.courses', compact('courses'));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait'); // Or 'landscape' if needed

        // Return the generated PDF as a stream (inline view in browser)
        return $pdf->stream('kursus.pdf');

        // If you want to download the PDF instead of displaying it in the browser:
        // return $pdf->download('kursus.pdf');
    }
}
