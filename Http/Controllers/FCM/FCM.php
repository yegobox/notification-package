<?php


namespace App\FCM;


use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\ServiceAccount;

class FCM
{
    private $serviceAccount;
    private $firebase;
    private $database;
    private $messaging;

    /**
     * FCM constructor.
     */
    public function __construct()
    {
        // $this->serviceAccount = ServiceAccount::fromValue(__DIR__ . '/yegobox-2ee43-73b8031f7764.json');
        $this->firebase = (new Factory)
            ->withServiceAccount(__DIR__ . '/yegobox-2ee43-73b8031f7764.json');
        // $this->database = $this->firebase->getDatabase();
        $this->messaging = $this->firebase->createMessaging();
    }

    
    public function sendNotificationToClients()
    {

        // reference: https://firebase-php.readthedocs.io/en/5.1.0/cloud-messaging.html
        $message = CloudMessage::withTarget(/* see sections below */)
            ->withNotification(Notification::create('Title', 'Body'))
            ->withData(['key' => 'value']);
        
        $messaging->send($message);

        // $message = CloudMessage::fromArray([
        //     'topic' => 'cb',
        //     'notification' => [/* Notification data as array */], // optional
        //     'data' => ['name' => 'my message'], // optional
        // ]);

        // return $this->messaging->send($message);
    }
}