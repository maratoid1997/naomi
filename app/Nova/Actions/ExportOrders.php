<?php


namespace App\Nova\Actions;
use App\Models\Orders\Order;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportOrders extends DownloadExcel implements WithMapping, WithHeadings, WithColumnWidths, WithStyles
{

    public function st(Spreadsheet $cell)
    {

    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:K1'    => [
                'font' => ['bold' => true],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '000'],
                    ],
                ],
            ],
            'A:Z'    => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 25,
            'D' => 15,
            'E' => 17,
            'F' => 17,
            'G' => 17,
            'H' => 20,
            'I' => 15,
            'J' => 20,
            'K' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'ORDER DATE',
            'NAME',
            'PHONE',
            'PAYMENT TYPE',
            'PAYMENT STATUS',
            'ORDER STATUS',
            'ORDER CLOSE DATE',
            'TOTAL',
            'EMAIL',
            'PRODUCT CODES',

//            'id',
//            'name',
//            'phone',
//            'email',
//            'delivery type',
//            'gift certificate',
//            'promo action',
//            'payment type',
//            'currency',
//            'subtotal',
//            'total',
//            'order status',
//            'shipping_address',
//            'store_address',
//            'total quantity',
        ];
    }

    public function map($order): array
    {
        $product_codes = [];
        foreach ($order->items as $item) {
            $product_codes[] = $item->product->sku;
        }

        return [
            $order->id,
            $order->created_at,
            $order->fullname,
            $order->phone,
            $order->paymentType->name,
            $order->paymentStatus->name,
            $order->status->name,
            $order->updated_at,
            $order->total,
            $order->email,
            implode(", ", $product_codes),

//            $order->id,
//            $order->fullname,
//            $order->phone,
//            $order->email,
//            $order->deliveryType ? $order->deliveryType->name : null,
//            $order->giftCertificate ? $order->giftCertificate->code : null,
//            $order->coupon ? $order->coupon->code : null,
//            $order->paymentType->name,
//            $order->currency ? $order->currency->code : null,
//            $order->subtotal,
//            $order->total,
//            $order->status->name,
//            $order->shipping_address,
//            $order->storeAddress ? $order->storeAddress->address : null,
//            $order->quantity_total,
        ];
    }
}
