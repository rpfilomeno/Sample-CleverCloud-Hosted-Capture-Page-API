# Sample-CleverCloud-Hosted-Capture-Page-API
Demo Application for using CleverCloud Hosted Capture Page API

This project demonstrate how to use the CleverCloud Capture API to launch a Hosted Captured Page (HCP).

The Windows application is built using Delphi 6 which executes a CMD command to run a PHP script with parameters.
These PHP script parameters are sent to the HTTP/s API via the PHP CURL method and receives a 402 redirect
url response which the Windows application receives back. The URL that was received is then launched by the Windows
application via a default browser.

Please Change the value for ```CURLOPT_URL => "https://domain.tld/hcp/capture.php"``` on php/generatehcp.php and
```--transactionKey=***REPLACE-WITH-TRANSACTION-KEY***``` on main.pas files.

Git: https://github.com/rpfilomeno/Sample-CleverCloud-Hosted-Capture-Page-API.git
