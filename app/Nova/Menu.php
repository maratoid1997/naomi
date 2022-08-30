<?php

namespace App\Nova;

use App\Helpers\ActionHelper;
use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Menu extends Resource
{
    use ActionHelper, HasSortableRows;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Menu::class;

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
        'title'
    ];

    public static $with = ['children'];

    public static $group = 'Other';
    public static $priority = 1;

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
                Text::make('Name'),
                Text::make('Path')
                    ->rules('required')
                    ->readonly(),
            ])->hideFromIndex()->hideFromDetail(),
            Text::make('Name')->hideWhenCreating()->hideWhenUpdating(),
            Text::make('Path')
                ->hideWhenCreating()
                ->hideWhenCreating(),
            Select::make('Parent menu', 'parent_id')
                ->options($this->getMenus($request->resourceId, (\App\Models\Menu::class)))
                ->default(null)
                ->displayUsingLabels(),
            Select::make('Section')->options([
                \App\Models\Menu::SECTION_HEADER => 'Header',
                \App\Models\Menu::SECTION_FOOTER => 'Footer',
            ]),
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
}
