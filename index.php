<?php
// Set content type to plain text
header('Content-Type: text/plain');

// Redis configuration
$redisHost = getenv('REDIS_HOST') ?: 'localhost';
$redisPort = getenv('REDIS_PORT') ?: 6379;
$sequenceKey = getenv('REDIS_SEQUENCE_KEY') ?: 'sequence_counter';

try {
    // Connect to Redis
    $redis = new Redis();
    $redis->pconnect($redisHost, $redisPort);

    // Atomically increment the sequence key
    $nextVal = $redis->incr($sequenceKey);

    // Output the next sequence value
    echo $nextVal;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
