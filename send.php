<?php
require dirname( __FILE__ ) . '/vendor/autoload.php';
use Aws\Sns\SnsClient;

$client = SnsClient::factory(
    array(
        'profile' => 'sns-reminders',
        'region'  => 'us-west-2',
        'version' => '2010-03-31',
    )
);

$message = array_pop( $argv );

$payload = array(
    'TopicArn' => 'arn:aws:sns:us-west-2:065471715791:sns-reminders',
    'Message' => $message,
    'MessageStructure' => 'string',
);
try {
    $client->publish( $payload );
    echo 'Sent message: "' . $message . '"';
} catch ( Exception $e ) {
    echo "Send Failed!\n" . $e->getMessage();
}
