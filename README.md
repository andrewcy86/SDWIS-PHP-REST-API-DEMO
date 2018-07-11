# SDIWS-PHP-REST-API-DEMO
A proof of concept demonstrating GET and POST request to SDWIS PRIME REST API's.

Deployment instructions onto cloud.gov

1) Input username and passwords environmnetal variables where there are placeholders in the following files:
- index.php
- json.php
- json2.php
- json3.php
- json4.php

Please contact the SDWIS team for access to these APIs for TESTING purposes

2) Use the 'cf push' command to push the application using Cloud Foundry.

NOTES:
- The REST API endpoints need to be replaced [ENDPOINT URL]
- Replace the [SERVER PATH] with the path to where the json#.php is located.
- API authentication has not yet been built out and needs to be addressed
