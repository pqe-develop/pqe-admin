<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

// namespace Illuminate\Database\Eloquent;
class SoftPqeDeletingScope implements Scope {
    /**
     * All of the extensions to be added to the builder.
     *
     * @var string[]
     */
    protected $extensions = [
        'Restore',
        'RestoreOrCreate',
        'CreateOrRestore',
        'WithTrashed',
        'WithoutTrashed',
        'OnlyTrashed'
    ];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model) {
        $builder->where($model->getQualifiedPqeDeletedColumn(), 0);
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    public function extend(Builder $builder) {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }

        $builder->onDelete(
                function (Builder $builder) {
                    $column = $this->getPqeDeletedColumn($builder);

                    return $builder->update([
                        $column => $builder->getModel()->freshTimestamp()->getTimestamp()
                    ]);
                });
    }

    /**
     * Get the "deleted at" column for the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return string
     */
    protected function getPqeDeletedColumn(Builder $builder) {
        if (count((array) $builder->getQuery()->joins) > 0) {
            return $builder->getModel()->getQualifiedPqeDeletedColumn();
        }

        return $builder->getModel()->getPqeDeletedColumn();
    }

    /**
     * Add the restore extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addRestore(Builder $builder) {
        $builder->macro('restore',
                function (Builder $builder) {
                    $builder->withTrashed();

                    return $builder->update([
                        $builder->getModel()->getPqeDeletedColumn() => 0
                    ]);
                });
    }

    /**
     * Add the restore-or-create extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addRestoreOrCreate(Builder $builder) {
        $builder->macro('restoreOrCreate',
                function (Builder $builder, array $attributes = [], array $values = []) {
                    $builder->withTrashed();

                    return tap($builder->firstOrCreate($attributes, $values),
                            function ($instance) {
                                $instance->restore();
                            });
                });
    }

    /**
     * Add the create-or-restore extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addCreateOrRestore(Builder $builder) {
        $builder->macro('createOrRestore',
                function (Builder $builder, array $attributes = [], array $values = []) {
                    $builder->withTrashed();

                    return tap($builder->createOrFirst($attributes, $values),
                            function ($instance) {
                                $instance->restore();
                            });
                });
    }

    /**
     * Add the with-trashed extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addWithTrashed(Builder $builder) {
        $builder->macro('withTrashed',
                function (Builder $builder, $withTrashed = true) {
                    if (!$withTrashed) {
                        return $builder->withoutTrashed();
                    }

                    return $builder->withoutGlobalScope($this);
                });
    }

    /**
     * Add the without-trashed extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addWithoutTrashed(Builder $builder) {
        $builder->macro('withoutTrashed',
                function (Builder $builder) {
                    $model = $builder->getModel();

                    $builder->withoutGlobalScope($this)->where($model->getQualifiedPqeDeletedColumn(), 0);

                    return $builder;
                });
    }

    /**
     * Add the only-trashed extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return void
     */
    protected function addOnlyTrashed(Builder $builder) {
        $builder->macro('onlyTrashed',
                function (Builder $builder) {
                    $model = $builder->getModel();

                    $builder->withoutGlobalScope($this)->whereNot($model->getQualifiedPqeDeletedColumn(),0);

                    return $builder;
                });
    }
}
