<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class NovaNavigationComposer
{
    public const resourceGroupPriorities = [
        'Other' => 1,
        'Main' => 2,
        'MAIN PAGES' => 3,
        'Category' => 4,
        'Orders' => 5,
        'Settings' => 6
    ];

    public function compose(View $view)
    {
        $navigation = $this->sortGroups($view->navigation);
        $view->with('navigation', $navigation);
    }

    protected function sortGroups(Collection $navigation)
    {
        return collect($navigation)
            ->keys()
            ->sortBy(function ($group) {
                return self::resourceGroupPriorities[$group] ?? self::resourceGroupPriorities['Other'];
            })
            ->mapWithKeys(function ($group) use ($navigation) {
                return [$group => $navigation[$group]];
            });
    }
}
