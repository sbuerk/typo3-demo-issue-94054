#!/bin/env php
<?php

//-------------------------------------------------------------------------------------------------
// Adjust your domains
//-------------------------------------------------------------------------------------------------
$baseUriRoot      = 'https://root.htaccess-playground.test';                // DOCROOT: ./subfolder
$baseUriSubfolder = 'https://subfolder.htaccess-playground.test/subfolder'; // DOCROOT: ./
//-------------------------------------------------------------------------------------------------
$baseUriRoot      = 'https://root.htaccess-playground.test';                // DOCROOT: ./subfolder
$baseUriSubfolder = 'https://subfolder.htaccess-playground.test/subfolder'; // DOCROOT: ./
//-------------------------------------------------------------------------------------------------




//-------------------------------------------------------------------------------------------------
// test data
//-------------------------------------------------------------------------------------------------
$domains = [
    'root'      => $baseUriRoot,
    'subfolder' => $baseUriSubfolder,
];
$htaccessFiles = [
    'root-htaccess-master', 
    'root-htaccess-dollar-zero', 
    'root-htaccess-removed-duplicate',
];
$tests = [
    // BE
    '/typo3/'                   => 'BE',
    '/typo3/index.php'          => 'BE',    
    '/typo3/module/dashboard'   => 'BE',
    '/typo3/module/dashboard/'  => 'BE',
    // FE
    '/'                         => 'FE',
    '/index/'                   => 'FE',
    '/index.php'                => 'FE',
    '/virtual/products/typo3'   => 'FE',
    '/virtual/products/typo3/'  => 'FE',
    
];




//-------------------------------------------------------------------------------------------------
// helper
//-------------------------------------------------------------------------------------------------
function fetchUriContext(string $uri, string $expectedContext): void
{
    $context = '';
    if ($content = @file_get_contents($uri))
        if (!empty($content))
            if ($decoded = json_decode($content, true))
                $context = $decoded['context'] ?? '';

    $matched = ($context === $expectedContext ? ' OK ' : 'FAIL');
    echo sprintf(
        '[%s][EXP: %s][CON: %s] %s',
        $matched,        
        $expectedContext,
        $context,
        $uri
    ) . PHP_EOL;
}


//-------------------------------------------------------------------------------------------------
// execute tests
//-------------------------------------------------------------------------------------------------
foreach($htaccessFiles as $htaccessFile) {
    echo '---------------------------------------------------------------------------------------------' . PHP_EOL;
    echo 'Using ' . $htaccessFile . PHP_EOL . PHP_EOL;
    file_put_contents('subfolder/.htaccess', file_get_contents($htaccessFile));    

    foreach($domains as $domainType => $domain) {
        foreach($tests as $uri => $context) {
            fetchUriContext(
                rtrim($domain, '/') . '/' . ltrim($uri, '/'), 
                $context
            );
        }
    }

    echo PHP_EOL;
}
//-------------------------------------------------------------------------------------------------