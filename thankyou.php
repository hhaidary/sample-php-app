<?php 

require("ESLPackageCreation.php");

$package = new ESLPackageCreation();

$packageId = $package->buildPackage($_POST['firstName'], $_POST['lastName'], $_POST['emailAddress']);

$response = $package->buildDocument($packageId, $_POST['firstName'], $_POST['lastName'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['country'], $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['company'], $_POST['policyNumber']);

$package->buildSend($packageId);

$package->buildSign($packageId);

$token = $package->buildToken($packageId);

?>

<html>
<head>
<title>Form Processing</title>
</head>
<body>
  <h3>Thank you for completing the form! Please sign the document below:</h3>
  
   <iframe src="https://sandbox.esignlive.com/access?sessionToken=<?php echo $token['value']; ?>" width="1000" height="700"></iframe>
     
</body>
</html>