<?php

namespace App\Listeners;

use App\Events\InvoiceProcessed;
use App\Http\Respositories\NotificationRepositoryInterface;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendInvoiceNotification
{
    protected NotificationRepositoryInterface $notificationRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\InvoiceProcessed  $event
     * @return void
     */
    public function handle(InvoiceProcessed $event)
    {
        $customerId = $event->customerId;
        $items = [
            'customer_id' => $customerId,
            'content' => __('text.customer.notification.success'),
            'status' =>__('text.customer.notification.statusSuccess'),
        ];
        $this->notificationRepository->insert($items);
    }
}
