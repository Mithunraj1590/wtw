<?php
// error_reporting(0); // Commented out for development purposes. You can enable it for debugging.

switch($_REQUEST['task']) {
    case 'request':
        
        // Create the HTML content for the email
        $content = '<table width="80%" border="0" align="left" cellpadding="3" cellspacing="3" style="border-right:1px solid #d3d3d3;font-size:12px;border-bottom:1px solid #d3d3d3;font-family:Verdana,Arial,Helvetica,sans-serif;font-weight:normal;border-top:1px solid #d3d3d3;border-left:1px solid #d3d3d3">
                      <tr>
                        <td colspan="3" align="left" valign="middle"><strong>Travel & Tour Booking</strong></td>
                      </tr>
                      <tr>
                        <td valign="top">First Name&nbsp;</td>
                        <td valign="top">:</td>
                        <td valign="top">&nbsp;'.$_REQUEST['firstname'].'</td>
                      </tr>
                      <tr>
                        <td valign="top">Last Name&nbsp;</td>
                        <td valign="top">:</td>
                        <td valign="top">&nbsp;'.$_REQUEST['lastname'].'</td>
                      </tr>
                      <tr>
                        <td valign="top">Email Id&nbsp;</td>
                        <td valign="top">:</td>
                        <td valign="top">&nbsp;'.$_REQUEST['new_email'].'</td>
                      </tr>
                      <tr>
                        <td valign="top">Message</td>
                        <td valign="top">:</td>
                        <td valign="top">&nbsp;'.$_REQUEST['message'].'</td>
                      </tr>
                    </table>';
        
        // Set email parameters
        $frm = 'mithunraj1590@gmail.com';
        $adminname = "Travel & Tour Booking";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";      
        $headers .= "From:$frm\r\n"."Reply-To: $_POST[email]\r\n";  
        
        // Send the email
        $mailSuccess = mail("mithunraj1590@gmail.com", "From Travel & Tour Booking", $content, $headers);
        
        // Check if the email was sent successfully
        if ($mailSuccess) {
            echo "<script>alert('Email has been sent successfully!');</script>";
        } else {
            echo "<script>alert('Failed to send the email. Please try again later.');</script>";
        }

        break;
}

header("Location: " . $_SERVER['PHP_SELF']);
exit;
?>
