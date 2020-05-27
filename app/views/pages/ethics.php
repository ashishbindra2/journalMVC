<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">
    <div>
        <object data="<?php echo UPLOAD . '/ethicstatements.pdf'; ?>" type="application/pdf" width="100%" height="800px">
            <p>It appears you don't have a PDF plugin for this browser.
                No biggie... you can <a href="<?php echo UPLOAD . '=ethicstatements.pdf'; ?>">click here to
                    download the PDF file.</a></p>
        </object>
    </div>
</div> <?php require APPROOT . '/views/inc/footer.php'; ?>