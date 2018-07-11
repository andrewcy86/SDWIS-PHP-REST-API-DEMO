<?php
/* Starts session so that username/password/primacy agency can be passed to all pages of the application. */ 
session_start();

$errorMessage='';

            /* THIS SECTION CAN NOT BE REUSED AND JUST PASSES OVER TEMPORARY USERNAMES AND PASSWORDS FOR A BASIC API AUTENTICATION IMPLEMENTATION */    

            /* Check Login form submitted */    
            if(isset($_POST['Submit'])){
                /* Define username and associated password array */
                $logins = array('[Username 1]' => '[Password 1]','[Username 2]' => '[Password 2]','[Username 3]' => '[Password 3]');

                /* Check and assign submitted Username, Password, and Primacy Agency to new variable */
                $Username = isset($_POST['username']) ? $_POST['username'] : '';
                $Password = isset($_POST['password']) ? $_POST['password'] : '';

                $primacyagency = isset($_POST['primacyagency']) ? $_POST['primacyagency'] : '';
                /* Check Username and Password existence in defined array */        
                if (isset($logins[$Username]) && $logins[$Username] == $Password){

                    /* Success: Set session variables and redirect to Protected page  */
                        $_SESSION['username'] = $Username;
                        $_SESSION['password'] = $Password;
                        $_SESSION['primacyagency'] = $primacyagency;   
                        
                    header("location:submission.php");
                    exit;
                } else {
                    /*Unsuccessful attempt: Set error message */
                    $errorMessage="<span style='color:red'>Invalid Login Details</span>";
                }
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Total Coliform Negative Sample Submission - PROOF OF CONCEPT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h1>Total Coliform Negative Sample Submission - PROOF OF CONCEPT</h1>

       <?php
		    if(!empty($errorMessage)) 
		    {
			    echo("<div class='alert alert-danger' role='alert'><p>There was an error with your form:</p>\n");
			    echo("<p><ul>" . $errorMessage . "</ul></p></div>\n");
            }
        ?>

<form class="form-horizontal" action="/index.php" method="post">

  <div class="form-group">
    <label for="primacyagency">Primacy Agency:</label>
      <select class="form-control" name="primacyagency" id="primacyagency">
    <option value="01">EPA Region 1</option>
    <option value="02">EPA Region 2</option>
    <option value="03">EPA Region 3</option>
    <option value="04">EPA Region 4</option>
    <option value="05">EPA Region 5</option>
    <option value="06">EPA Region 6</option>
    <option value="07">EPA Region 7</option>
    <option value="08">EPA Region 8</option>
    <option value="09">EPA Region 9</option>
    <option value="10">EPA Region 10</option>
    <option value="AK">Alaska</option>
    <option value="AL">Alabama</option>
    <option value="AR">Arkansas</option>
    <option value="AS">American Samoa</option>
    <option value="AZ">Arizona</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DC">District of Columbia</option>
    <option value="DE">Delaware</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="GU">Guam</option>
    <option value="HI">Hawaii</option>
    <option value="IA">Iowa</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="LA">Louisiana</option>
    <option value="MA">Massachusetts</option>
    <option value="MD">Maryland</option>
    <option value="ME">Maine</option>
    <option value="MI">Michigan</option>
    <option value="MN">Minnesota</option>
    <option value="MO">Missouri</option>
    <option value="MP">Northern Mariana Isl</option>
    <option value="MS">Mississippi</option>
    <option value="MT">Montana</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="NE">Nebraska</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NN">Navajo Nation</option>
    <option value="NV">Nevada</option>
    <option value="NY">New York</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="PA">Pennsylvania</option>
    <option value="PR">Puerto Rico</option>
    <option value="PW">Palau</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UT">Utah</option>
    <option value="VA">Virginia</option>
    <option value="VI">US Virgin Islands</option>
    <option value="VT">Vermont</option>
    <option value="WA">Washington</option>
    <option value="WI">Wisconsin</option>
    <option value="WV">West Virginia</option>
    <option value="WY">Wyoming</option>
      </select>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>

<input type="submit" class="btn btn-primary" value="Submit" name="Submit">
</form>

</div>

</body>
</html>