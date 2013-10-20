<?php
$page = $red->page;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $red->widget("head"); ?>
	</head>
	<body>
		<div id="mainContent">
			<?php $red->widget("top_nav"); ?>
			<?php $page->displayContent(); ?>
		</div>
		<input type="hidden" id="url" value="http://<?php echo SERVER.ROOT_NODE;?>" />
	</body>

</html>