<?php

namespace App\Exports;

use App\Models\Ticket;
use Carbon\Carbon;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;



class TicketExport implements FromView, WithEvents
{
    use RegistersEventListeners;
    protected $params;
    private $tickets;
    public function __construct(array $params)
    {
        $this->params = $params;
        $startDate = Carbon::createFromFormat('Y-m-d', $params["start_date"]);
        $endDate = Carbon::createFromFormat('Y-m-d', $params["end_date"]);
        $this->tickets = Ticket::with("logBefore")->with("logAfter")->with("user")->whereIn("status_tiket", ["closed","dispatch"])->whereBetween('created_at', [$startDate, $endDate])->get();
    }
    public function view(): View
    {
        // dd($this->tickets);
        return view("exports.tickets_excel", ["tickets" => $this->tickets]);
    }
    public static function afterSheet(AfterSheet $event)
    {
        // Create Style Arrays
        $default_font_style = [
            'font' => ['name' => 'Arial', 'size' => 10]
        ];

        $strikethrough = [
            'font' => ['strikethrough' => true],
        ];

        // Get Worksheet
        $active_sheet = $event->sheet->getDelegate();

        // Apply Style Arrays
        $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);

        // strikethrough group of cells (A10 to B12) 
        $active_sheet->getStyle('A10:B12')->applyFromArray($strikethrough);
        // or
        $active_sheet->getStyle('A10:B12')->getFont()->setStrikethrough(true);

        // single cell
        $active_sheet->getStyle('A13')->getFont()->setStrikethrough(true);

        // $styleArray = [
        //     'borders' => [
        //         'outline' => [
        //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        //             'color' => ['argb' => 'FFFF0000'],
        //         ],
        //     ],
        // ];
        
        // $active_sheet->getStyle('A1:F8')->applyFromArray($styleArray);
    }
}
