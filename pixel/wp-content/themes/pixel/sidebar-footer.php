<?php defined('ABSPATH') or die("No script kiddies please!");?>
<?php if (is_active_sidebar('footer-sidebar-id')):?>
<div class="footerTop  ofsInTop ofsInBottom">
	<!--Container-->
	<div class="container clearfix">
		<div class="ftInner clearfix">
			<div class="top">
				<a class="scroll" href="#wrapper"><i class=" icon-angle-double-up"></i></a>
			</div>
			<div class="footerWidget tLeft"><?php dynamic_sidebar('footer-sidebar-id'); ?></div>
		</div>
	</div>
</div>
<?php endif;?>
