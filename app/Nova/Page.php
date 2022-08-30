<?php

namespace App\Nova;

use Drobee\NovaSluggable\SluggableText;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Drobee\NovaSluggable\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Page::class;

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
    ];

    public static $group = 'MAIN PAGES';
    public static $priority = 3;

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
                SluggableText::make('title')
                    ->slug('Slug')
                    ->rules('required'),
                Slug::make('Slug')->readonly(),
                Trix::make('description'),
            ])->hideFromIndex()->hideFromDetail(),
            Slug::make('Slug')
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            Text::make('TITLE')->hideWhenCreating()->hideWhenUpdating(),
            Text::make('Description')->hideWhenCreating()->hideWhenUpdating()->hideFromIndex(),
            Boolean::make('PUBLISH', 'published'),
            Images::make('Image', 'pageImages') // second parameter is the media collection name
            ->conversionOnIndexView('thumb')
            ->onlyOnForms(), // conversion used to display the image
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
