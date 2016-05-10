<?php
namespace SendGrid;

require __DIR__ . '/../../../vendor/autoload.php';
require  __DIR__ . '/../../../lib/SendGrid.php';
require  __DIR__ . '/../../../lib/helpers/mail/Mail.php';


function helloEmail()
{
    $from = new Email(null, "dx@sendgrid.com");
    $subject = "Hello World from the SendGrid PHP Library";
    $to = new Email(null, "elmer.thomas@sendgrid.com");
    $content = new Content("text/plain", "some text here");
    $mail = new Mail($from, $subject, $to, $content);
    $to = new Email(null, "elmer.thomas+add_second_email@sendgrid.com");
    $mail->personalization[0]->addTo($to);

    //echo json_encode($mail, JSON_PRETTY_PRINT), "\n";
    return $mail;
}

function kitchenSink()
{
    $mail = new Mail();

    $email = new Email("DX", "dx@sendgrid.com");
    $mail->setFrom($email);

    $mail->setSubject("Hello World from the SendGrid PHP Library");

    $personalization = new Personalization();
    $email = new Email("Elmer Thomas", "elmer.thomas@sendgrid.com");
    $personalization->addTo($email);
    $email = new Email("Elmer Thomas Alias", "elmer.thomas@gmail.com");
    $personalization->addTo($email);
    $email = new Email("Matt Bernier", "matt.bernier@sendgrid.com");
    $personalization->addCc($email);
    $email = new Email("Eric Shallock", "eric.shallock@gmail.com");
    $personalization->addCc($email);
    $email = new Email("DX Matt Bernier", "matt.bernier+dx@sendgrid.com");
    $personalization->addBcc($email);
    $email = new Email("DX Eric Shallock", "eric.shallock+dx@gmail.com");
    $personalization->addBcc($email);
    $personalization->setSubject("Hello World from the SendGrid PHP Library");
    $personalization->addHeader("X-Test", "test");
    $personalization->addHeader("X-Mock", "true");
    $personalization->addSubstitution("%name%", "Tim");
    $personalization->addSubstitution("%city%", "Riverside");
    $personalization->addCustomArg("user_id", "343");
    $personalization->addCustomArg("type", "marketing");
    $personalization->setSendAt(1443636843);
    $mail->addPersonalization($personalization);

    $personalization2 = new Personalization();
    $email = new Email("Elmer Thomas", "elmer.thomas@sendgrid.com");
    $personalization2->addTo($email);
    $email = new Email("Elmer Thomas Alias", "elmer.thomas@gmail.com");
    $personalization2->addTo($email);
    $email = new Email("Matt Bernier", "matt.bernier@sendgrid.com");
    $personalization2->addCc($email);
    $email = new Email("Eric Shallock", "eric.shallock@gmail.com");
    $personalization2->addCc($email);
    $email = new Email("DX Matt Bernier", "matt.bernier+dx@sendgrid.com");
    $personalization2->addBcc($email);
    $email = new Email("DX Eric Shallock", "eric.shallock+dx@gmail.com");
    $personalization2->addBcc($email);
    $personalization2->setSubject("Hello World from the SendGrid PHP Library");
    $personalization2->addHeader("X-Test", "test");
    $personalization2->addHeader("X-Mock", "true");
    $personalization2->addSubstitution("%name%", "Tim");
    $personalization2->addSubstitution("%city%", "Riverside");
    $personalization2->addCustomArg("user_id", "343");
    $personalization2->addCustomArg("type", "marketing");
    $personalization2->setSendAt(1443636843);
    $mail->addPersonalization($personalization2);

    $content = new Content("text/plain", "some text here");
    $mail->addContent($content);
    $content = new Content("text/html", "<html><body>some text here</body></html>");
    $mail->addContent($content);

    $attachment = new Attachment();
    $attachment->setContent("TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gQ3JhcyBwdW12");
    $attachment->setType("application/pdf");
    $attachment->setFilename("balance_001.pdf");
    $attachment->setDisposition("attachment");
    $attachment->setContentId("Balance Sheet");
    $mail->addAttachment($attachment);

    $attachment2 = new Attachment();
    $attachment2->setContent("BwdW");
    $attachment2->setType("image/png");
    $attachment2->setFilename("banner.png");
    $attachment2->setDisposition("inline");
    $attachment2->setContentId("Banner");
    $mail->addAttachment($attachment2);

    $mail->setTemplateId("439b6d66-4408-4ead-83de-5c83c2ee313a");

    $mail->addSection("%section1%", "Substitution Text for Section 1");
    $mail->addSection("%section2%", "Substitution Text for Section 2");

    $mail->addHeader("X-Test1", "1");
    $mail->addHeader("X-Test2", "2");

    $mail->addCategory("May");
    $mail->addCategory("2016");

    $mail->addCustomArg("campaign", "welcome");
    $mail->addCustomArg("weekday", "morning");

    $mail->setSendAt(1443636842);

    $asm = new ASM();
    $asm->setGroupId(99);
    $asm->setGroupsToDisplay([4,5,6,7,8]);
    $mail->setASM($asm);

    $mail->setIpPoolName("23");

    $mail_settings = new MailSettings();
    $bcc_settings = new BccSettings();
    $bcc_settings->setEnable(true);
    $bcc_settings->setEmail("dx@sendgrid.com");
    $mail_settings->setBccSettings($bcc_settings);
    $sandbox_mode = new SandBoxMode();
    $sandbox_mode->setEnable(true);
    $mail_settings->setSandboxMode($sandbox_mode);
    $bypass_list_management = new BypassListManagement();
    $bypass_list_management->setEnable(true);
    $mail_settings->setBypassListManagement($bypass_list_management);
    $footer = new Footer();
    $footer->setEnable(true);
    $footer->setText("Footer Text");
    $footer->setHtml("<html><body>Footer Text</body></html>");
    $mail_settings->setFooter($footer);
    $spam_check = new SpamCheck();
    $spam_check->setEnable(true);
    $spam_check->setThreshold(1);
    $spam_check->setPostToUrl("https://spamcatcher.sendgrid.com");
    $mail_settings->setSpamCheck($spam_check);
    $mail->setMailSettings($mail_settings);

    $tracking_settings = new TrackingSettings();
    $click_tracking = new ClickTracking();
    $click_tracking->setEnable(true);
    $click_tracking->setEnableText(true);
    $tracking_settings->setClickTracking($click_tracking);
    $open_tracking = new OpenTracking();
    $open_tracking->setEnable(true);
    $open_tracking->setSubstitutionTag("Optional tag to replace with the open image in the body of the message");
    $tracking_settings->setOpenTracking($open_tracking);
    $subscription_tracking = new SubscriptionTracking();
    $subscription_tracking->setEnable(true);
    $subscription_tracking->setText("text to insert into the text/plain portion of the message");
    $subscription_tracking->setHtml("<html><body>html to insert into the text/html portion of the message</body></html>");
    $subscription_tracking->setSubstitutionTag("Optional tag to replace with the open image in the body of the message");
    $tracking_settings->setSubscriptionTracking($subscription_tracking);
    $ganalytics = new Ganalytics();
    $ganalytics->setEnable(true);
    $ganalytics->setCampaignSource("some source");
    $ganalytics->setCampaignTerm("some term");
    $ganalytics->setCampaignContent("some content");
    $ganalytics->setCampaignName("some name");
    $ganalytics->setCampaignMedium("some medium");
    $tracking_settings->setGanalytics($ganalytics);
    $mail->setTrackingSettings($tracking_settings);

    $reply_to = new ReplyTo("dx+reply@sendgrid.com");
    $mail->setReplyTo($reply_to);

    //echo json_encode($mail, JSON_PRETTY_PRINT), "\n";
    return $mail;
}

function sendHelloEmail()
{
    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $request_body = helloEmail();
    $response = $sg->client->mail()->send()->beta()->post($request_body);
    echo $response->statusCode();
    echo $response->responseBody();
    echo $response->responseHeaders();
}

function sendKitchenSink()
{
    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $request_body = kitchenSink();
    $response = $sg->client->mail()->send()->beta()->post($request_body);
    echo $response->statusCode();
    echo $response->responseBody();
    echo $response->responseHeaders();
}

sendHelloEmail();  // this will actually send an email
sendKitchenSink(); // this will only send an email if you set SandBox Mode to false
?>


