<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: *");

// Function to read counts from a file
function readCountsFromFile()
{
    $countsFile = 'state.json';
    if (file_exists($countsFile)) {
        $countsData = file_get_contents($countsFile);
        return json_decode($countsData, true);
    } else {
        return array('visitors' => 0, 'calculated' => 0, 'shares' => 0,'instagram' => 0,'whatsapp' => 0,'github' => 0);
    }
}

// Function to write counts to a file
function writeCountsToFile($counts)
{
    $countsFile = 'state.json';
    file_put_contents($countsFile, json_encode($counts));
}

// Increment visitor count
function incrementVisitorCount()
{
    $counts = readCountsFromFile();
    $counts['visitors']++;
    writeCountsToFile($counts);
}

// Increment calculated count
function incrementCalculatedCount()
{
    $counts = readCountsFromFile();
    $counts['calculated']++;
    writeCountsToFile($counts);
}

// Increment share count
function incrementShareCount()
{
    $counts = readCountsFromFile();
    $counts['shares']++;
    writeCountsToFile($counts);
}

function incrementInstagramCount()
{
    $counts = readCountsFromFile();
    $counts['instagram']++;
    writeCountsToFile($counts);
}

function incrementWhatsappCount()
{
    $counts = readCountsFromFile();
    $counts['whatsapp']++;
    writeCountsToFile($counts);
}

function incrementGithubCount()
{
    $counts = readCountsFromFile();
    $counts['github']++;
    writeCountsToFile($counts);
}

// Handle GET request to increment counter
if (isset($_GET['state'])) {
    $counter = $_GET['state'];
    switch ($counter) {
        case 'visitor':
            incrementVisitorCount();
            break;
        case 'calculator':
            incrementCalculatedCount();
            break;
        case 'share':
            incrementShareCount();
            break;
        case 'instagram':
            incrementInstagarmCount();
            break;
        case 'whatsapp':
            incrementWhatsappCount();
            break;
        case 'github':
            incrementGithubCount();
            break;
        default:
            // Invalid counter specified
            break;
    }
}
