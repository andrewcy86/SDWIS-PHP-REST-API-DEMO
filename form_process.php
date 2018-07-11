<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sample Submission</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<br />
<?php

session_start();

/* Fields on Form */

$primacy_agency = $_SESSION['primacyagency'];
$watersystem_id = $_POST['watersystemid'];
$facility_id = $_POST['facilityid'];
$sampling_point_id = $_POST['samplingpointid'];
$sample_collected_date = $_POST['samplecollecteddate'];
$sample_received_date = $_POST['samplereceiveddate'];
$sample_for_compliance = $_POST['sampleforcompliance'];
$sample_comments = $_POST['samplecomments'];
$sample_lab_id_code = $_POST['samplelabidcode'];
$legal_entity_id = $_POST['legalentityid'];
$sample_result_agency_received_date = $_POST['sampleagencyreceiveddate'];

$datetime1 = new DateTime($sample_collected_date);
$datetime2 = new DateTime($sample_received_date);
$datetime3 = new DateTime($sample_result_agency_received_date);

$data_string = json_encode(array(
  "sampleResultDataQuality" => array(
    "identifier" => 38878
  ),
  "sampleResultAgencyReceivedDate" => $datetime3->format(DateTime::ATOM),
  "sampleResultAnalyte" => array(
    "referenceIdentifier" => 30189
    ),
  "microbialAbsentPresent" => "A",
  // "microbialSourceType" => array(
  //   "identifier" => 45835
  // ),
  // "microbialInterference" => array(
  //   "identifier" => 38871
  // ),
  // "microbialUnitType" => array(
  //   "identifier" => 38856
  // ),
  "sampleJobPrimacyAgency" => array(
    "primacyAgencyCode" => $primacy_agency
  ),
  "sampleJobStatus" => array(
    "identifier" => 39140
  ),
  "sampleJobOrgCode" => $primacy_agency,
  "sampleJobOrgType" => $primacy_agency,
  "sampleWaterSystem" => array(
    "waterSystemId" => $watersystem_id
  ),
  "sampleCategory" => array(
    "identifier" => 38826
  ),
  "sampleFacility" => array(
    "facilityIdentifier" => $facility_id
  ),
  "sampleFacilitySamplingPoint" => array(
    "samplingPointIdentifier" => $sampling_point_id
  ),
  "sampleLabIdentificationCode" => $sample_lab_id_code,
  "sampleLab" => array(
    "legalEntityIdentifier" => $legal_entity_id
  ),
  // "sampleCollector" => "Toll Collector",
  "sampleCollectedDate" => $datetime1->format(DateTime::ATOM),
  "sampleReceivedDate" => $datetime2->format(DateTime::ATOM),
  "sampleType" => array(
    "identifier" => 38831
  ),
  // "microbialVolume" => 0,
  // "sampleVolume" => array(
  //   "valueData" => 0
  // ),
  // "microbialVolumeUnits" => array(
  //   "identifier" => 38863
  // ),
  "sampleForCompliance" => $sample_for_compliance,
  "sampleComments" => $sample_comments
));

/* Set Basic Autentication Username & Password */
$username = $_SESSION['username'];
$password = $_SESSION['password'];

/* Determine URL */
$post_url = "[ENDPOINT URL]/sample-data/" . $primacy_agency . "/microbial";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json',
    'Content-Type: application/json')
);

$result = curl_exec($ch);

if($result === false)
{
    echo 'Curl error: ' . curl_error($ch);
}


$errors = curl_error($ch);

$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

//echo $returnCode;

switch ($returnCode) {
    case '400':
	echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> A bad argument has been submitted.</div>';
        break;
    case '401':
	echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> The user is not authorized to make a submission.</div>';
        break;
    case '403':
	echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Access was denied.</div>';
        break;
    case '404':
        echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Entity not found.</div>';
        break;
    case '409':
       echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> A duplicate entry already exists.</div>';
        break;
    case '422':
       echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Your submission could not be processed. Please see errors below.</div>';
        break;
    case '500':
       echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Internal Error detected.</div>';
        break;
    case '503':
       echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Service unavailable. Please try again later.</div>';
        break;
    case '200':
	echo '<div class="alert alert-success alert-dismissible"><strong>Success!</strong> Your have succesfully made a submission.</div>';
        break;
    case '201':
	echo '<div class="alert alert-success alert-dismissible"><strong>Success!</strong> Your have succesfully created a record.</div>';
        break;
    case '204':
	echo '<div class="alert alert-warning alert-dismissible"><strong>Warning!</strong> No entries found.</div>';
        break;
    case '202':
	echo '<div class="alert alert-success alert-dismissible"><strong>Success!</strong> You submission has been accepted.</div>';
        break;
    case '501':
        echo '<div class="alert alert-warning alert-dismissible"><strong>Warning!</strong> Not Implemented.</div>';
        break;
    case '504':
        echo '<div class="alert alert-danger alert-dismissible"><strong>Warning!</strong> Gateway Timeout.</div>';
        break;
    default:
        echo '<div class="alert alert-info alert-dismissible"><strong>Info</strong> No alerts or warnings found.</div>';

}

//var_dump($errors);

//print_r(json_decode($result, true));

$error = json_decode($result, true);
echo '<ul>';
foreach($error['pridexElement']['errorMessage'] as $item) {
$remove_errorcode = substr($item['text'], 27);
    echo '<li><strong>' . $remove_errorcode . '</strong></li>';
}

foreach($error['pridexElement']['simpleSampleJob']['sampleList']['sample'] as $item) {
    echo '<li><strong>Job Identifier: ' . $item['sampleJobIdentifier'] . '</strong></li>';
    echo '<li><strong>Sample Identifier: ' . $item['sampleIdentifier'] . '</strong></li>';
}

$sample_result_id = $error['pridexElement']['simpleSampleJob']['sampleList']['sample'][0]['sampleResultAnalyteList']['sampleResultAnalyte'][0]['sampleResultIdentifier'];

if (!empty($sample_result_id)) {
echo '<li><strong>Sample Result Identifier: ' . $sample_result_id . '</strong></li>';
}
	
echo '</ul>';


//print_r($result);

echo '<script>';
echo 'console.log(' . json_encode($result) . ');';
echo '</script>';

?>
<br />
<a href="submission.php">Go back to re-submit.</a>

</div>
</body>
</html>
