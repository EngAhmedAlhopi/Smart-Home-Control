<?php

namespace App\Exports;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Fill;

class DataExport implements FromCollection, WithHeadings, WithStyles
{

    public function collection()
    {
        // $response = Http::get('http://localhost/Esp32/public/get_things_data');
        // $response = Http::get('http://localhost/laravel-projects/MyAPIs/public/api/');
        // $data = $response->json();
        // return collect($data);

        $apiUrl = 'http://localhost/laravel-projects/MyAPIs/public/api/get_sensors_data';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $requestBody = [
            'date_from' => Session::get('date_from'),
            'date_to' => Session::get('date_to'),
        ];

        $jsonRequestBody = json_encode($requestBody);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonRequestBody);

        $apiResponse = curl_exec($curl);

        if (curl_errno($curl)) {
            $error = curl_error($curl);
            curl_close($curl);
            return response()->json(['error' => $error], 500);
        }

        // Close curl
        curl_close($curl);

        $responseData = json_decode($apiResponse, true);

        $p_result_out = $responseData;

        return collect($p_result_out);
    }

    public function headings(): array
    {
        return [
            '#',
            'المسافة',
            'نسبة الغاز',
            'نسبة الكربون',
            'الحريق',
            'درجة الحرارة',
            'نسبة الرطوبة',
            'شدة الاضاءة',
            'التاريخ'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $headerStyle = [
            'font' => [
                'color' => ['rgb' => '0000FF'], // Blue color
                'size' => 17,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D3D3D3'], // Gray color
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $rowStyle = [
            'font' => [
                'color' => ['rgb' => '000000'], // Black color
                'size' => 14,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFFFFF'], // White color
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'], // Black color
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $sheet->getStyle('A1')->applyFromArray($headerStyle);

        for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
            $sheet->getStyle('A' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('B' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('C' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('D' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('E' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('F' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('G' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('H' . $row)->applyFromArray($rowStyle);
            $sheet->getStyle('I' . $row)->applyFromArray($rowStyle);
        }

        // Auto-size columns based on content
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        return [
            1 => $headerStyle,
        ];
    }
}
