<?php

namespace App\Nova\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DuplicateResource extends Action
{

    use SerializesModels;

    public $showOnDetail = true;
    public $showOnIndex = false;
    public $showOnTableRow = true;
    public $confirmButtonText = 'Duplicate';
    public $cancelButtonText = 'Cancel';
    public $confirmText = 'Are you sure you want to duplicate this resource?';
    public $withoutActionEvents = true;

    protected $keepRelations = [];
    protected $duplicateRelations = [];

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param Collection $models
     *
     * @return mixed
     */

    public function actionClass()
    {
        return 'gg-duplicate';
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        if ($models->count() !== 1) {
            return Action::danger('Cannot duplicate multiple models simultaneously.');
        }

        $model = $models->first();
        $newModel = $model->replicate();

        // Override values from fields
        foreach ($fields->getAttributes() as $key => $value) {
            if (isset($value)) {
                $newModel->$key = $value;
            }
        }

        $newModel->push();

        if (!empty($this->duplicateRelations)) {
            // load the relations
            $model->load($this->duplicateRelations);
            foreach ($model->getRelations() as $relation => $items) {
                // works for hasMany
                foreach ($items as $item) {
                    // clean up our models, remove the id and remove the appends
                    unset($item->id);
                    $item->setAppends([]);
                    // create a relation on the new model with the data.
                    $newModel->{$relation}()->create($item->toArray());
                }
            }
        }

        if (!empty($this->keepRelations)) {
            // load the fresh model with relations to maintain
            unset($model->relations);
            $model->load($this->keepRelations);

            foreach ($model->getRelations() as $relation => $items) {
                // works for hasMany
                foreach ($items as $item) {
                    $newModel->{$relation}()->attach($item);
                }
            }
        }

        $newModel->save();

        if(request()->segments()[1] == 'products'){
            foreach ($model->getMedia('productMultiImages') as $media){
                $media->copy($newModel, 'productMultiImages');
            }
            foreach ($model->getMedia('productMainImage') as $image){
                $image->copy($newModel, 'productMainImage');
            }
        }

        return Action::message($this->getSuccessMessage($model, $newModel, $fields));
    }

    protected function getSuccessMessage(Model $originalModel, Model $newModel, ActionFields $fields): string
    {
        return 'Resource has been duplicated.';
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
