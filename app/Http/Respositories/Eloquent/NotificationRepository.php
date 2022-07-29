<?php

namespace App\Http\Respositories\Eloquent;

use App\Http\Respositories\NotificationRepositoryInterface;
use App\Models\Notification;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Notification $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
