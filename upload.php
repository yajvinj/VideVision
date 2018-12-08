<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vide Vision</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    </style>
</head>

<body>
    <center>
        <img src="uploads/test2.jpg">
    </center>
    <br>
    <?php

// namespace Google\Cloud\Samples\Vision;

putenv('GOOGLE_APPLICATION_CREDENTIALS=/opt/lampp/htdocs/videVision/VideVision-42ad157fe0e6.json'); //your path to file of cred

require '/opt/lampp/htdocs/videVision/vendor/autoload.php';
# imports the Google Cloud client library
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
# instantiates a client
$imageAnnotator = new ImageAnnotatorClient();
# the name of the image file to annotate
# $fileName = 'test/data/wakeupcat.jpg';
$fileName = "uploads/test2.jpg";
# prepare the image to be annotated
$image = file_get_contents($fileName);
# performs label detection on the image file
$response = $imageAnnotator->labelDetection($image);
$labels = $response->getLabelAnnotations();

echo "<center>";

if ($labels) {
    echo("Labels:" . PHP_EOL);
    foreach ($labels as $label) {
        echo($label->getDescription() . PHP_EOL);
    }
} else {
    echo('No label found' . PHP_EOL);
}

echo "</center><br>";

$response = $imageAnnotator->webDetection($image);
$web = $response->getWebDetection();
// Print best guess labels
#printf('%d best guess labels found' . PHP_EOL, count($web->getBestGuessLabels()));
echo "<center>";

foreach ($web->getBestGuessLabels() as $label) {
printf('Best guess label: %s' . PHP_EOL, $label->getLabel());
}

echo "</center><br>";
// print(PHP_EOL);

$count = 0;

// printf('%d web entities found' . PHP_EOL, count($web->getWebEntities()));
echo "<center><table id='student_table' border='1px'><tr><td style='text-align:center;vertical-align:middle; width:200px;'><strong>Filtered Tags</strong></td><td style='text-align:center;vertical-align:middle; width:150px;'><strong>Probability Score</strong></td></tr>";

    foreach ($web->getWebEntities() as $entity) {

        $desc = strtolower($entity->getDescription());
        $score = $entity->getScore();

        if (strpos($desc, 'anger') !== false || strpos($desc, 'rage') !== false || strpos($desc, 'assault') !== false || strpos($desc, 'criminal') !== false || strpos($desc, 'violent') !== false || strpos($desc, 'violence') !== false || strpos($desc, 'crime') !== false || strpos($desc, 'fight') !== false || strpos($desc, 'kick') !== false || strpos($desc, 'push') !== false || strpos($desc, 'rob') !== false || strpos($desc, 'knife') !== false || strpos($desc, 'gun') !== false || strpos($desc, 'police') !== false || strpos($desc, 'mop') !== false || strpos($desc, 'steal') !== false || strpos($desc, 'mug') !== false || strpos($desc, 'snatching') !== false || strpos($desc, 'theft') !== false || strpos($desc, 'robbery')) {
            echo "<tr><td style='text-align:center;vertical-align:middle'>".$desc."</td><td style='text-align:center;vertical-align:middle'>".$score."</td></tr>";
            $count++;
        }
        
        // printf('Description: %s, Score %s' . PHP_EOL,
        //     $entity->getDescription(),
        //     $entity->getScore());
    }
    echo "</table></center>";

    if ($count > 0) {
        echo "<center><p>Result: THREAT DETECTED</p></center>";
    } else {
        echo "<center><p>Result: NO THREAT DETECTED</p></center>";
    }

//     $response = $imageAnnotator->faceDetection($image);
//     $faces = $response->getFaceAnnotations();

//     # names of likelihood from google.cloud.vision.enums
//     $likelihoodName = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY',
//     'POSSIBLE','LIKELY', 'VERY_LIKELY'];

//     printf("%d faces found:" . PHP_EOL, count($faces));
//     foreach ($faces as $face) {
//     $anger = $face->getAngerLikelihood();
//     printf("Anger: %s" . PHP_EOL, $likelihoodName[$anger]);

//     $joy = $face->getJoyLikelihood();
//     printf("Joy: %s" . PHP_EOL, $likelihoodName[$joy]);

//     $surprise = $face->getSurpriseLikelihood();
//     printf("Surprise: %s" . PHP_EOL, $likelihoodName[$surprise]);

//     # get bounds
//     $vertices = $face->getBoundingPoly()->getVertices();
//     $bounds = [];
//     foreach ($vertices as $vertex) {
//         $bounds[] = sprintf('(%d,%d)', $vertex->getX(), $vertex->getY());
//     }
//     print('Bounds: ' . join(', ',$bounds) . PHP_EOL);
//     print(PHP_EOL);
// }

    // $response = $imageAnnotator->safeSearchDetection($image);
    // $safe = $response->getSafeSearchAnnotation();

    // $adult = $safe->getAdult();
    // $medical = $safe->getMedical();
    // $spoof = $safe->getSpoof();
    // $violence = $safe->getViolence();
    // $racy = $safe->getRacy();

    // # names of likelihood from google.cloud.vision.enums
    // $likelihoodName = ['UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY',
    // 'POSSIBLE','LIKELY', 'VERY_LIKELY'];

    // printf("Adult: %s" . PHP_EOL, $likelihoodName[$adult]);
    // printf("Medical: %s" . PHP_EOL, $likelihoodName[$medical]);
    // printf("Spoof: %s" . PHP_EOL, $likelihoodName[$spoof]);
    // printf("Violence: %s" . PHP_EOL, $likelihoodName[$violence]);
    // printf("Racy: %s" . PHP_EOL, $likelihoodName[$racy]);

# [END vision_quickstart]
// return $labels;
?>
</body>

</html>