<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushSubscription;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class NotificationController extends Controller
{
    public function sendNotification()
    {
        $subscriptions = PushSubscription::all();
        $auth = [
            'VAPID' => [
                'subject' => 'mailto:localsoftbr@gmail.com',
                'publicKey' => env('VAPID_PUBLIC_KEY'),
                'privateKey' => env('VAPID_PRIVATE_KEY'),
            ],
        ];
        
        $webPush = new WebPush($auth);

        foreach ($subscriptions as $subscription) {
            // $sub = Subscription::create(['endpoint' => 'https://fcm.googleapis.com/fcm/send/eJ_2YtjZ4BM:APA91bHqWjrTxlEqB1_2sm7mjjjG7_0nLB7e8M_G6PEHNvgDJ9JBwiNg2NTVBq-nVbLswNdxrHhv5KMuV0fDvdx4NJXDATZOtgXMN6S1POkeoTJP2bBHIfWSr-8hIpix8cnmUyELtnBV']);
            $sub = Subscription::create(
                [
                    'endpoint' => $subscription->endpoint,
                    'publicKey' => env('VAPID_PUBLIC_KEY'),
                    // 'authToken' => $subscription['auth'],
                    'contentEncoding' => 'aes128gcm',// $subscription['content_encoding'],
                ]
            );
            $webPush->sendOneNotification(
                $sub,
                json_encode([
                    'title' => 'Notificação de Teste',
                    'body' => 'Esta é uma notificação de teste',
                    'icon' => 'icon-url',
                    'badge' => 'badge-url'
                ])
            );
        }

        foreach ($webPush->flush() as $report) {
            $endpoint = $report->getRequest()->getUri()->__toString();
            if ($report->isSuccess()) {
                echo "[v] Message sent successfully for subscription {$endpoint}.";
            } else {
                echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
            }
        }
    }
}