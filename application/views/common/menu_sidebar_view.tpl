<main class="wrapper" style="margin-top:50px">
	<nav id="sidebar" >
		<ul class="list-unstyled components">
			<li class="direct_menu" style="position: relative;">
				<a href="<?php echo base_url(); ?>api/v1/add_bot/">
					<i class="fas fa-robot"></i> <span>Add Bot</span>
				</a>
			</li>     
			<li class="direct_menu" style="position: relative;">
				<a href="<?php echo base_url(); ?>api/v1/#about_bot">
					<i class="fas fa-robot"></i> <span>About Bot</span>
				</a>
			</li>
			<li style="position: relative;">
				<a href="#linksSubmenu" data-toggle="collapse" aria-expanded="false">
					<i class="fas fa-robot"></i> <span>WebHooks</span>
				</a>
				<ul class="collapse list-unstyled" id="linksSubmenu">
				    <li>
						<a href="<?php echo base_url(); ?>api/v1/#setWebhook"><i class="fab fa-dashcube"></i> Set Webhook</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>api/v1/#getWebhookInfo"><i class="fab fa-dashcube"></i> Get Webhook</a>
					</li>
					<li>
						<a href="<?php echo base_url(); ?>api/v1/#deleteWebhook"><i class="fab fa-dashcube"></i> Delete Webhook</a>
					</li>
				</ul>
		    </li>
			
		</ul>
	</nav>

