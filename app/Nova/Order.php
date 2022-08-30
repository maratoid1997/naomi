<?php

namespace App\Nova;

use App\Nova\Actions\ExportOrders;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;
use Titasgailius\SearchRelations\SearchesRelations;

class Order extends Resource
{
    use SearchesRelations;

//    public static $searchRelations = [
//        'customer'
//    ];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Orders\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'phone',
        'fullname',
        'email',
        'shipping_address'
    ];

    public static $group = 'Orders';
    public static $priority = 11;


    public static $with = [
        'items',
        'deliveryType',
        'storeAddress',
        'giftCertificate',
        'coupon',
        'currency',
        'paymentType',
    ];
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Name', 'fullname'),
            DateTime::make('Order Date', 'created_at')->format('DD MMMM YYYY H:mm')->onlyOnIndex(),
            Text::make('email')->hideFromIndex(),
            Text::make('Shipping Address')->hideFromIndex(),
            Text::make('Phone'),
//            Text::make('Status',
//                function (){
//                return view('vendor.nova.partials.status', [
//                    'status' => $this->status->name,
//                    'color' => $this->status->type == Status::STATUS_FINISHED ? Status::COLOR_STATUS_FINISHED : Status::COLOR_STATUS_NOT_FINISHED
//                ])->render();
//            }
//            )
//            ->asHtml()
//            ->hideWhenUpdating()
//            ->hideWhenCreating(),
            BelongsTo::make('Order status', 'status')->viewable(false),
//                ->hideFromDetail()
//                ->hideFromIndex(),
            BelongsTo::make('Payment status','paymentStatus')->viewable(false),
            BelongsTo::make('Payment type', 'paymentType')->hideFromIndex(),
            AdvancedNumber::make('Total'),
            AdvancedNumber::make('Subtotal')->hideFromIndex(),
            BelongsTo::make('Delivery type', 'deliveryType')
                ->nullable()
                ->hideFromIndex(),
            BelongsTo::make('Gift certificate', 'giftCertificate')
                ->nullable()
                ->hideFromIndex(),
            BelongsTo::make('Promo action', 'coupon', Coupon::class)
                ->nullable()
                ->hideFromIndex(),
            BelongsTo::make('Store Address', 'storeAddress')
                ->nullable()
                ->hideFromIndex(),
            BelongsTo::make('Currency', 'currency')
                ->nullable()
                ->hideFromIndex(),
            HasMany::make('Order item', 'items'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new ExportOrders())
        ];
    }
}
