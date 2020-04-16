<?php require __DIR__ . '/vendor/autoload.php';

    $channel = 'mya';
    $event   = 'mya';
    $message = 'docker_image';
    $options = [
        'cluster' => 'eu',
        // options below are needed for pusher local dev server
        'encrypted' => false,
        'host'      => 'pusher',
        'port'      => '57003',
    ];
    $pusher = new Pusher\Pusher(
        getenv('PUSHER_APP_KEY'),
        getenv('PUSHER_APP_SECRET'),
        getenv('PUSHER_APP_ID'),
        $options
    );

  

$int =0;
while(true){

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'http://206.189.87.169/getPatientObservation');
echo $response->getBody();

        echo 'Sending event: ' . $event . ' with message: ' . $message . ' to channel: ' . $channel . PHP_EOL;
        $pusher->trigger($channel, $event, $data = $response->getBody()."");
        sleep(1);
        $int++;
}
    