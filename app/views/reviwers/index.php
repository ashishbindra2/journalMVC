<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo "Welcome " . $data['name'];	?>
			</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<fieldset id="tableContainer">
				<legend>New Submissions</legend>
				<?php echo '<a href="' . URLROOT . 'reviwers/paperSubDetials">'; ?>Submit New Manuscript</a><br />
				<span><?php echo '<a href="' . URLROOT . 'reviwers/paperReport">'
						?>Submissions Sent Back to Author</a></span>&nbsp;(0)
				<br />
				<span><?php echo '<a href="' . URLROOT . 'reviwers/paperIssue">' ?>Incomplete Submissions</a></span>&nbsp;(0)<br />
				<span><?php // echo '<a href="' . URLROOT . 'reviwers/paperSubDetials">' 
						?>Submissions Waiting for Author&#39;s Approval</a></span>&nbsp;(0)<br />
			</fieldset><br />
		</div>

		<div class="col-lg-12">
			<fieldset id="tableContainer">
				<legend>Revisions</legend>
				<span><?php echo '<a href="' . URLROOT . 'reviwers/paperReport">' ?>Revisions Sent Back to Author</a></span>&nbsp;(0)<br />
				<span><?php echo '<a href="' . URLROOT . 'reviwers/adminNotic">' ?>Incomplete Submissions Being Revised</a></span>&nbsp;(0)<br />
				<span><?php echo '<a href="' . URLROOT . 'reviwers/paperSubDetials">' ?>Revisions Waiting for Author&#39;s Approval</a></span>&nbsp;(0)<br />
			</fieldset><br />
		</div>
		<div class="col-lg-12">
			<fieldset id="tableContainer">
				<legend>Completed</legend>
				<span><?php echo '<a href="' . URLROOT . 'reviwers/complete">' ?>Submissions with Production Completed</a></span>&nbsp;(0)<br />
			</fieldset>
		</div>

	</div>

	<?php require APPROOT . '/views/inc/panelFooter.php'; ?>