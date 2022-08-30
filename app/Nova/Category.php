<?php

namespace App\Nova;

use App\Helpers\ActionHelper;
use Drobee\NovaSluggable\SluggableText;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Drobee\NovaSluggable\Slug;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use PhoenixLib\NovaNestedTreeAttachMany\NestedTreeAttachManyField;
use NovaAttachMany\AttachMany;

class Category extends Resource
{
    use ActionHelper, HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Categories\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'slug',
        'name'
    ];

    public static $with = ['products','children'];

    public static $group = 'Category';
    public static $priority = 6;

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
            NovaTabTranslatable::make([
                SluggableText::make('Name')
                    ->rules('required')
                    ->slug('Slug'),
                Slug::make('Slug')
                    ->rules('required')
                    ->readonly(),
            ])
            ->hideFromIndex()->hideFromDetail(),
            Text::make('Name')->hideWhenCreating()->hideWhenUpdating(),
            Select::make('Parent Category', 'parent_id')
                ->options($this->getMenus($request->resourceId, (\App\Models\Categories\Category::class)))
                ->default(null)
                ->displayUsingLabels(),
            Images::make('Cover', 'categoryImages') // second parameter is the media collection name
            ->conversionOnIndexView('thumb') // conversion used to display the image
            ->rules('required'), // validation rules,
            AttachMany::make('Promo actions', 'coupons', Coupon::class),
            BelongsToMany::make('PROMO ACTIONS', 'coupons', Coupon::class),
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
        return [];
    }

    public static function canSort(NovaRequest $request, $resource)
    {
        return true;
    }
}
