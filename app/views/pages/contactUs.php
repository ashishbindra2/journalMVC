<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- <h1><?php echo $data['title']; ?></h1> -->
<div id="main">
    <div class="container">
        <h1 class="display-4 mt-2">Contact Us</h1>
        <hr>
        <p class="lead ml-3">Details Of Editors</p>
        <section>
            <div class="container">
                <div class="row">
                    <!-- Section Titile -->
                    <!-- <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                        <h1 class="section-title">Love to Hear From You........</h1>
                    </div> -->
                </div>
                <div class="row">
                    <!-- Section Titile -->
                    <div class="col-md-6  contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                        <h4><?php echo $data['manager']->NAME; ?>:-</h4>
                        <h5> Managing Editor</h5>
                        <div class="find-widget mb-1">
                            Company: <a href="#"><span class="font-weight-normal">M/S Vidya Publications</span></a>
                        </div>
                        <div class="find-widget mb-1">
                            Address: <a href="#"><?php echo $data['manager']->DETAIL . "."; ?></a>
                        </div>
                        <div class="find-widget mb-1">
                            Phone: <a href="#">+91 <?php echo $data['manager']->MOBILE; ?></a>
                        </div>

                        <div class="find-widget mb-1">
                            Website: <a href="#"><?php echo $data['manager']->WEBLINK; ?></pre></a>
                        </div>
                        <div class="find-widget mb-1">
                            Email: <a href="#"><?php echo $data['manager']->EMAIL; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h4><?php echo $data['editor']->editorName; ?></h4>
                            <h5> Editor-in-Chief</h5>
                            <?php echo "<pre>" . $data['editor']->jName  . "</pre>"; ?>
                            <?php echo "<pre>" . $data['editor']->editorDetail . ",India</pre>"; ?>
                            <pre>Mobile : <?php echo $data['editor']->editorMobile; ?></pre>
                            <pre>Email : <?php echo  $data['editor']->editorEmail; ?></pre>
                            <pre>WEBLINK :<a href=""> <?php echo  $data['editor']->editorWeb; ?></a></pre>

                            </table>
                        </div>
                    </div>
                </div>
        </section>
    </div><!-- <p><?php echo $data['description']; ?></p> -->
    <p>Version: <strong><?php echo APPVERSION; ?></strong></p>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>