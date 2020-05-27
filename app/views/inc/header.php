<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="icon" href="<?php echo IMG; ?>/logo_icon-min.png">
  <link rel="stylesheet" href="<?php echo STYLE; ?>/home.css">
  <link rel="stylesheet" href="<?php echo STYLE; ?>/style.css">
  <title><?php echo SITENAME; ?></title>
</head>
<style>
  abbr[title] {
    border-bottom: none !important;
    cursor: inherit !important;
    text-decoration: none !important;
  }
</style>

<body>
  <div class="container">
    <header id='menu-header'>
      <div class="row">
        <div class="col-sm-4 text-left mx-auto">
          <a href="<?php echo URLROOT; ?>pages/">
            <img src='<?php echo IMG; ?>/logo_s.png' class="mt-2 ml-2"></a>
        </div>
        <div class="col-sm-8 text-center">
          <p class="mx-auto text-center">
            <dt class="col-sm-12 text-right"> (ISSN:<?php echo ($data['journalId']->J_ISSN_P); ?>)(Print)</dt>
            <dt class="col-sm-12 text-right">
              (ISSN:<?php echo $data['journalId']->J_ISSN_E; ?>)(Online)</dt>
            <dt class="col-sm-12 text-right">
              <?php echo $data['journalId']->JOURNAL_NAME; ?> </dt>
            <dt class="col-sm-12 text-right"> An Open Access, biannual, peer reviewed, indexed refereed journal</dt>
            <dt class="col-sm-12 text-right">
              <a href="http://ugc.ac.in/journallist/subjectwisejurnallist.aspx?tid=UmVzZWFyY2ggQ2VsbDogSW50ZXJuYXRpb25hbCBKb3VybmFsIG9mIEVkdWNhdGlvbg==&&did=Q3VycmVudCBUaXRsZXM=" style="color:#0056b3;">UGC Approved Journal(S.No. 63022)</a></dt>
          </p>

        </div>

      </div>
    </header>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>