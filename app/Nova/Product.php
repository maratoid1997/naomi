<?php

namespace App\Nova;

use App\Helpers\ActionHelper;
use App\Nova\Actions\DuplicateResource;
use App\Nova\Actions\ExportProducts;
use Drobee\NovaSluggable\Slug;
use Drobee\NovaSluggable\SluggableText;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use NovaAttachMany\AttachMany;
use PhoenixLib\NovaNestedTreeAttachMany\NestedTreeAttachManyField;
use SimpleSquid\Nova\Fields\AdvancedNumber\AdvancedNumber;
use Spatie\TagsField\Tags;

class Product extends Resource
{
    use ActionHelper;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Products\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'sku'
    ];

    public static $group = 'MAIN PAGES';
    public static $priority = 4;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        \App\Models\Products\Filter::fixTree();
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Images::make('MAIN IMAGE', 'productMainImage')
                ->conversionOnPreview('thumb')
                ->rules('required'),
            Text::make('TITLE')
                ->displayUsing(function ($text){
                    return Str::limit($text,30);
                })
                ->onlyOnIndex(),
            Images::make('Product Images', 'productMultiImages')
                ->conversionOnPreview('thumb')
                ->onlyOnForms()
                ->rules('required'),
            NovaTabTranslatable::make([
                SluggableText::make('title')
                    ->rules('required_lang:az,ru')
                    ->slug('Slug'),
                Slug::make('Slug'),
                Trix::make('Description')
                    ->rules('required_lang:az,ru', 'max:200')
            ])->onlyOnForms(),
            Text::make('Product code','sku')->rules('required','string'),
            AdvancedNumber::make('PRICE')
                ->size('w-1/3')
                ->required(),
            AdvancedNumber::make('Sale price', 'sale_price')
                ->rules('nullable','lt:price')
                ->size('w-1/3'),
            Number::make('QUANTITY')
                ->size('w-1/3')
                ->rules('required'),
            BelongsTo::make('Brand')
                ->size('w-1/2'),
            BelongsTo::make('Category')->onlyOnIndex(),
            Select::make('Category','category_id')
                ->options($this->getMenusOptGroup($request->resourceId, (\App\Models\Categories\Category::class)))
                ->hideFromIndex()
                ->size('w-1/2')
                ->rules('required')
                ->displayUsingLabels(),
            BelongsTo::make('Color')
                ->hideFromIndex()
                ->size('w-1/2'),
            Tags::make('Tags')->hideFromIndex(),
            NestedTreeAttachManyField
                ::make('Filters',"filters","App\Nova\Filter")
                ->withFlatten(false)
                ->withLabelKey('translated_name')
                ->withPlaceholder('Select filters'),
            AttachMany::make('Similar products', 'similar', self::class)
                ->display(function ($thread){
                    return Str::limit($thread->title,50);
                })->rules('max:10'),
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
            new ExportProducts(),
            new DuplicateResource(),
        ];
    }
}
