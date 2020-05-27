<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">
  <div class="container">

    <div class="row mt-3 bg-yellow">
      <div class="col bg-yellow">
        <span class="h2 mx-auto">
          <u style="color :red;">Next Issue Due Date :</u>
          <?php
          echo " " . date('F ', strtotime($data['paper']->Next_issue_Date));
          echo "- ";
          echo date('F Y', strtotime($data['paper']->next_month));

          ?></span> </div>
    </div>
    <div class="row">
      <div class="col blog-main">
        <h2 class="mt-3 border-bottom"> Research Paper Submission:</h2>
        <div class="blog-post">
          <p class="lead font-weight-bold"> Authors interested in publishing
            their research work may send their research papers round the year to:</p>
          <dl class="ml-5">
            <dd class="text-monospace mt-2"> Dr. Vishal Goyal - vishal.pup@gmail.com,editor.ijoes@gmail.com</dd>
            <dd> Dr. Shubhnandan S. Jamwal - jamwalsnj@gmail.com</dd>
            <dd> Dr.Rajeev R R - rajeev@iiitmk.ac.in</dd>
            <dd>Dr. Arvind - arvind.cuj@gmail.com</dd>
            <dd> Nagenrdra - nagendrakumardj@yahoo.co.in</dd>
            <dl>
        </div>
        <p class="lead mb-1"><span class="font-weight-normal"> Articles will be reviewed blindly and accordingly the authors will be informed. </span>
          <u class="font-weight-bolder"><b>There is no publication fees for the publication of your accepted paper in this journal.</b></u></p>
      </div>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>