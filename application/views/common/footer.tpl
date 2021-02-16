        
		<footer class="page-footer font-small wow fadeIn" style="visibility: visible; animation-name: fadeIn;"> 
			<div class="row">
				<div class="col-4 text-left text-muted py-3"> 
					Created by <i class="fas fa-user"></i> Sankara Subramanian. 
				</div>
				<div class="col-4 footer-copyright text-center py-3"> 
					<strong>&copy; <?php echo DATE('Y') ;?>.</strong>  
				</div>
				<div class="col-4 text-right text-muted py-3"> 
					<i class="fas fa-envelope"></i> sankaranec@gmail.com 
				</div>
			</div>
		</footer>
		
		<script type = "text/javascript">
			var base_url = '<?php echo base_url(); ?>';
		</script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/popper.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/mdb/js/mdb.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/fontawesome/js/all.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cutom.js"></script>
		
		<script> 
		    new WOW().init();
		</script>
		
		<script>
		$(document).ready(function () {
			$('#sidebarCollapse').on('click', function () {
				$('#sidebar').toggleClass('active');
				if($('#sidebar').hasClass('active'))
				{
					$(".logo-lg").hide();
					$(".logo-mini").show();
				}
				else
				{
					$(".logo-lg").show();
					$(".logo-mini").hide();	
				}
			});
			if($('#sidebar').length == 0)
			{
				$(".logo-lg").show();
				$(".logo-mini").hide();
				$('#sidebarCollapse').hide();
			}
		});
	</script>
 	</body>
</html>
