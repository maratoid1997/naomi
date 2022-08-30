<?php


namespace App\Nova\Actions;

use App\Models\Customers\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportCustomers extends DownloadExcel implements WithMapping, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'name',
            'email',
            'phone',
            'address',
        ];
    }

    public function map($customer): array
    {
        return [
            $customer->id,
            $customer->fullname,
            $customer->user->email,
            $customer->phone,
            $customer->address,
        ];
    }
}
