<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

    <title>PHPMailer Lite - DKIM and Callback Function test</title>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://34.123.222.213/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
</head>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

<body>

<?php
/* This is a sample callback function for PHPMailer Lite.
 * This callback function will echo the results of PHPMailer processing.
 */

/* Callback (action) function
 *   boolean $result        result of the send action
 *   string  $to            email address of the recipient
 *   string  $cc            cc email addresses
 *   string  $bcc           bcc email addresses
 *   string  $subject       the subject
 *   string  $body          the email body
 * @return boolean
 */
function callbackAction($result, $to, $cc, $bcc, $subject, $body)
{
    /*
    this callback example echos the results to the screen - implement to
    post to databases, build CSV log files, etc., with minor changes
    */
    $to = cleanEmails($to, 'to');
    $cc = cleanEmails($cc[0], 'cc');
    $bcc = cleanEmails($bcc[0], 'cc');
    echo $result . "\tTo: " . $to['Name'] . "\tTo: " . $to['Email'] . "\tCc: " . $cc['Name'] .
        "\tCc: " . $cc['Email'] . "\tBcc: " . $bcc['Name'] . "\tBcc: " . $bcc['Email'] .
        "\t" . $subject . "\n\n". $body . "\n";
    return true;
}

require_once '../PHPMailerAutoload.php';
$mail = new PHPMailer();

try {
    $mail->isMail();
    $mail->setFrom('you@example.com', 'Your Name');
    $mail->addAddress('another@example.com', 'John Doe');
    $mail->Subject = 'PHPMailer Test Subject';
    $mail->msgHTML(file_get_contents('../examples/contents.html'));
    // optional - msgHTML will create an alternate automatically
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    $mail->addAttachment('../examples/images/phpmailer.png'); // attachment
    $mail->addAttachment('../examples/images/phpmailer_mini.png'); // attachment
    $mail->action_function = 'callbackAction';
    $mail->send();
    echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}

function cleanEmails($str, $type)
{
    if ($type == 'cc') {
        $addy['Email'] = $str[0];
        $addy['Name'] = $str[1];
        return $addy;
    }
    if (!strstr($str, ' <')) {
        $addy['Name'] = '';
        $addy['Email'] = $addy;
        return $addy;
    }
    $addyArr = explode(' <', $str);
    if (substr($addyArr[1], -1) == '>') {
        $addyArr[1] = substr($addyArr[1], 0, -1);
    }
    $addy['Name'] = $addyArr[0];
    $addy['Email'] = $addyArr[1];
    $addy['Email'] = str_replace('@', '&#64;', $addy['Email']);
    return $addy;
}
?>
</body>
</html>
