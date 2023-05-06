<?php

namespace Pqe\Admin\Traits;

use Illuminate\Database\Eloquent\Model;
use Pqe\Admin\Models\AuditLog;

trait Auditable {

    public static function bootAuditable() {
        static::created(function (Model $model) {
            self::audit('created', $model);
        });

        static::updated(function (Model $model) {
            self::audit('updated', $model);
        });

        static::deleted(function (Model $model) {
            self::audit('deleted', $model);
        });
    }

    protected static function audit($description, $model) {
        if (isset($model->resource_code_id)) {
            $code = $model->resource_code()->get()->pluck('resource_code')->first();
        } elseif (isset($model->resource_code)) {
            $code = $model->resource_code;
        } else {
            $code = $model->id;
        }

        AuditLog::create(
                [
                    'code' => $code ?? null,
                    'description' => $description,
                    'subject_id' => $model->id ?? null,
                    'subject_type' => get_class($model) ?? null,
                    'user_name' => auth()->user()->username ?? null,
                    'user_id' => auth()->id() ?? null,
                    'properties' => $model ?? null,
                    'updated_data' => $model->getDirty() ?? null,
                    'host' => request()->ip() ?? null,
                ]);
    }
}
