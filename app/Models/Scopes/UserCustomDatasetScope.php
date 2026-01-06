<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserCustomDatasetScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        //
        if (auth()->check()) {
        $builder->where(function ($query) {
            // Show standard items (available to everyone)
            $query->where('is_custom', false)
                  // OR show custom items ONLY if they belong to the current user
                  ->orWhere(function ($sub) {
                      $sub->where('is_custom', true)
                          ->where('user_id', auth()->id());
                  });
        });
    } else {
        // If not logged in, only show standard items
        $builder->where('is_custom', false);
    }
    }
}
