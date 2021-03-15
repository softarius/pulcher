<?php defined('_JEXEC') or die('Restricted access'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language; ?>" lang="<?= $this->language; ?>">

<head>
	<jdoc:include type="head" />
	<?php $template_dir = "{$this->baseurl}/templates/{$this->template}"; ?>

	<link rel="stylesheet" href="<?= $template_dir ?>/assets/css/template.css" type="text/css" />
	<link rel="stylesheet" href="<?= $template_dir ?>/assets/font/bootstrap-icons.css" type="text/css" />

	<script src="<?= $template_dir ?>/assets/js/popper.min.js"></script>
	<script src="<?= $template_dir ?>/assets/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container-fluid">
		<div class='row'>
			<div class='col-sm'>
				<jdoc:include type="modules" name="top" />
				<jdoc:include type="modules" name="breadcrumb" />
			</div>
		</div>

		<div class='row'>
			<?php if ($this->countModules('left')) : ?>
				<div class='col-sm-2'>
					<jdoc:include type="modules" name="left" />
				</div>
			<?php endif; ?>

			<div class='col-sm-<?= 12 - (int)!!$this->countModules('left') * 2 - (int)!!$this->countModules('right') * 2; ?>'>
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>

			<?php if ($this->countModules('right')) : ?>
				<div class='col-sm-2'>
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
