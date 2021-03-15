<?php defined('_JEXEC') or die('Restricted access'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language; ?>" lang="<?= $this->language; ?>">

<head>
	<jdoc:include type="head" />
	<?php $template_dir = "{$this->baseurl}/templates/{$this->template}"; ?>
	<?php
	//	var_dump($this->params);
	if ($this->params->get('bs_using') == 'cdn') : ?>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<?php endif; ?>

	<?php if ($this->params->get('bs_using') == 'local') : ?>
		<link rel="stylesheet" href="<?= $template_dir ?>/assets/css/bootstrap.min.css" type="text/css" />
		<script src="<?= $template_dir ?>/assets/js/popper.min.js"></script>
		<script src="<?= $template_dir ?>/assets/js/bootstrap.min.js"></script>
	<?php endif; ?>

	<?php if ($this->params->get('bs_using') == 'custom') : ?>
		<link rel="stylesheet" href="<?= $template_dir ?>/assets/css/template.css" type="text/css" />
		<script src="<?= $template_dir ?>/assets/js/popper.min.js"></script>
		<script src="<?= $template_dir ?>/assets/js/bootstrap.min.js"></script>
	<?php endif; ?>
	<!--	

	<script src="<?= $template_dir ?>/assets/js/popper.min.js"></script>
	<script src="<?= $template_dir ?>/assets/js/bootstrap.min.js"></script> -->
</head>

<body>
	<div class="container-fluid">
		<div class='row'>
			<div class='col col-sm'>
				<jdoc:include type="modules" name="top" />
				<jdoc:include type="modules" name="breadcrumb" />
			</div>
		</div>

		<div class='row'>
			<?php if ($this->countModules('left')) : ?>
				<div class='col col-sm-2'>
					<jdoc:include type="modules" name="left" />
				</div>
			<?php endif; ?>

			<div class='col col-sm-<?= 12 - (int)!!$this->countModules('left') * 2 - (int)!!$this->countModules('right') * 2; ?>'>
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>

			<?php if ($this->countModules('right')) : ?>
				<div class='col col-sm-2'>
					<jdoc:include type="modules" name="right" />
				</div>
			<?php endif; ?>
		</div>

		<div class='row'>
			<div class='col-sm'>
				<jdoc:include type="modules" name="bottom" />
			</div>
		</div>


	</div>
</body>

</html>