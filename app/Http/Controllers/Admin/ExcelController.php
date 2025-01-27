<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kursus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{

    public function importCourses(Request $request)
    {
        if ($request->isMethod('post')) {
            // Handle POST request for file preview and validation

            // Validate the uploaded file (for file type only)
            $request->validate([
                'file' => 'required|mimes:xlsx,xls'
            ]);

            // Initialize an array to hold error messages
            $errors = [];

            try {
                // Get File & Load
                $file = $request->file('file');
                $spreadsheet = IOFactory::load($file);

                // Get the first sheet
                $sheet = $spreadsheet->getActiveSheet();

                // Get all the data as an array
                $data = $sheet->toArray();

                // Check if the header is valid
                $headers = $data[0]; // First row must contain the column headers
                $requiredHeaders = ['nama_kursus', 'deskripsi', 'harga', 'status_kursus'];

                foreach ($requiredHeaders as $header) {
                    if (!in_array($header, $headers)) {
                        $errors[] = "The Excel file is missing the required column: $header.";
                    }
                }

                // Stop if there are any errors so far (the error must be due to invalid excel formats)
                if (count($errors) > 0) {
                    return back()->with('errors', $errors);
                }

                $dataValues = [];
                foreach (array_slice($data, 1) as $row) {  // Skip the first row (headers)
                    $rowData = [];
                    foreach ($headers as $index => $header) {
                        $rowData[$header] = $row[$index]; // Map each cell to the corresponding header
                    }
                    $dataValues[] = (object) $rowData; // Store row as an object
                }

                // Validate each row's data type
                $column_count = 0;
                foreach ($dataValues as $key) {
                    // Validate 'nama_kursus' (string, non-empty)
                    if (empty($key->nama_kursus) || !is_string($key->nama_kursus)) {
                        $errors[] = 'Invalid or empty "nama_kursus" value in row ' . ($column_count + 1);
                    }

                    // Validate 'deskripsi' (string, non-empty)
                    if (empty($key->deskripsi) || !is_string($key->deskripsi)) {
                        $errors[] = 'Invalid or empty "deskripsi" value in row ' . ($column_count + 1);
                    }

                    // Validate 'harga' (integer, positive value)
                    if (!is_numeric($key->harga) || $key->harga < 0) {
                        $errors[] = 'Invalid "harga" value in row ' . ($column_count + 1) . '. It must be a positive integer.';
                    }

                    // Validate 'status_kursus' (enum: 'active' or 'inactive')
                    $validStatuses = ['active', 'inactive'];
                    if (!in_array(strtolower($key->status_kursus), $validStatuses)) {
                        $errors[] = 'Invalid "status_kursus" value in row ' . ($column_count + 1) . '. It must be either "active" or "inactive".';
                    }
                    $column_count += 1;
                }

                // If there are any errors, return them as a session message
                if (count($errors) > 0) {
                    return back()->with('errors', $errors);
                }

                // If everything is valid, pass the preview data to the view
                return view('dashboard.admin.excel_import', ['dataValues' => $dataValues]);
            } catch (\Exception $e) {
                return back()->with('error', 'Error previewing Excel file: ' . $e->getMessage());
            }
        }

        // Handle GET request for showing the import form
        return view('dashboard.admin.excel_import');
    }


    // Handle the import after confirmation
    public function storeCourses(Request $request)
    {
        try {
            // Decode the JSON string into an array
            $dataValues = json_decode($request->input('dataValues'), true);

            // Process each row and store in the database
            foreach ($dataValues as $rowData) {
                // Store the data into the kursus table
                Kursus::create([
                    'id_kursus' => Str::uuid(), // Generate UUID for the primary key
                    'nama_kursus' => $rowData['nama_kursus'],
                    'deskripsi' => $rowData['deskripsi'],
                    'harga' => $rowData['harga'],
                    'status_kursus' => $rowData['status_kursus'],
                    'tgl_dibuat' => now(), // Current timestamp
                ]);
            }

            // If everything went well, redirect with a success message
            return back()->with('success', 'Data successfully imported.');
        } catch (\Exception $e) {
            // Catch any errors and return the message
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function exportExcel()
    {
        //
    }
}
