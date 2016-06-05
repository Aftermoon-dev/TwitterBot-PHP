<?php
/*
	This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License 
	as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
	without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
	See the GNU General Public License for more details.
	You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.
*/

/** INCLUDE **/
require_once('lib/codebird.php');
require_once('lib/config.php');

/** Get Now Time**/
$times = date("Y-m-d H:i");

/** Twitter Upload Part **/
\Codebird\Codebird::setConsumerKey(CONSUMER_KEY, CONSUMER_SECRET);
$cb = \Codebird\Codebird::getInstance();
$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_OBJECT);
$cb->setToken(ACCESS_TOKEN, ACCESS_SECRET);
$status = "[$times] Test"; // Your Message
$reply = $cb->statuses_update("status=$status");

// If Error
if($reply->httpstatus != "200")
{
	$errors = $reply->errors; // Error 
	$errorcode = $errors[0]->code; // Error Code
	$errormessage = $errors[0]->message; // Error Message
	echo "CODE = $reply->httpstatus, ERROR CODE = $errorcode, MESSAGE = $errormessage";
}

?>
