<?php
// Load the HTML file
$htmlFile = 'packages.html'; // Ensure this is the correct path to your file
$htmlContent = file_get_contents($htmlFile);

// Suppress warnings for invalid HTML structure
libxml_use_internal_errors(true);

// Create a new DOMDocument instance
$dom = new DOMDocument();
$dom->loadHTML($htmlContent);
libxml_clear_errors();

// Use DOMXPath to query the HTML
$xpath = new DOMXPath($dom);

// Example: Extract all destinations
$destinations = $xpath->query("//div[@class='destination']");

if ($destinations->length > 0) {
    foreach ($destinations as $destination) {
        // Get the destination title (h2)
        $title = $destination->getElementsByTagName('h2')->item(0)->nodeValue;

        // Get the associated details (p tags)
        $details = [];
        foreach ($destination->getElementsByTagName('p') as $detail) {
            $details[] = $detail->nodeValue; // Collect details
        }

        // Find the approximate cost in details and filter based on cost
        foreach ($details as $detail) {
            if (strpos($detail, 'Approximate Cost:') !== false) {
                // Extract the cost using a regular expression
                preg_match('/\$(\d+)/', $detail, $matches);
                if (isset($matches[1]) && $matches[1] > 2000) {
                    // Display the extracted information for destinations over $2000
                    echo "<h3>Destination: $title</h3>";
                    echo "<ul>";
                    foreach ($details as $d) {
                        echo "<li>$d</li>";
                    }
                    echo "</ul>";
                    break; // Exit the details loop once the cost is found
                }
            }
        }
    }
} else {
    echo "No destinations found.";
}
?>
