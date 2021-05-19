<?php
namespace Packages\Admin\Traits;

use Jenssegers\Date\Date;

trait DatesTraslator
{
    public function getCreatedAtAttribute($created_at)
    {
        return new Date($created_at);
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return new Date($updated_at);
    }

    public function getDeletedAtAttribute($deleted_at)
    {
        return (!empty($deleted_at)) ? new Date($deleted_at) : null;
    }
}
