<?php

require_once __DIR__ . '/common/renderer.php';
require_once __DIR__ . '/common/analyzer.php';

$userInputDomains = $_POST['domains'] ?? '';

$domains = $userInputDomains ? explode(',', $userInputDomains) : [];

$domains = array_filter($domains, function ($domain) {
    return trim($domain) !== '';
});

$result = analyze($domains);

$content = rendering(__DIR__ . '/index.html', [
    'input' => $userInputDomains,
    'result' => $result,
    'domains' => $domains,
]);

echo $content;