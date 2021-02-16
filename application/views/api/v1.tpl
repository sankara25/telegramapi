<title>Chatbot Agency Inbox Page</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>

</head>
<body>
	<header class="fixed-navbar">
		<?php $this->load->view('common/menu_view.tpl'); ?> 
	</header>
	<?php $this->load->view('common/menu_sidebar_view.tpl'); ?>  
	<div id="content">		
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="row">
					<div class="col-12 col-lg-6">
						<div id="add_bot" class="card shadow my-2">
							<div class="card-body">
								<h5 class="card-title">Add Bot</h5>
								<div class="card-body">
									<div class="input-group mb-3 col-12 ">
									  <span class="input-group-text" id="basic-addon1"><i class="fas fa-link"></i></span>
									  <input type="text" class="form-control" id="txt_bot_token" placeholder="Enter the Bot Auth Token From Your Bot Father" aria-label="database" aria-describedby="basic-addon1" />
									</div>
									<div class="input-group mb-3 col-12 ">
									  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
									  <input type="text" class="form-control" id="txt_bot_name" placeholder="Enter the Bot Name From Your Bot Father" aria-label="database" aria-describedby="basic-addon1" />
									</div>
									<div class="input-group mb-3 col-12 ">
									  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
									  <input type="text" class="form-control" id="txt_bot_username" placeholder="Enter the Bot Username From Your Bot Father" aria-label="database" aria-describedby="basic-addon1" />
									</div>
									<div class="input-group mb-3 col-12 col-lg-4">
										<button class="btn btn-primary" id="but_add_bot" data-loading-text="submitting..." data-complete-text="Submit">Submit</button>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div id="add_bot" class="card shadow my-2" style="height:250px">
							<div class="card-body">
								<div class="card-body">
									<div id="add_bot_message" class="text-muted">eg.{status:200, response:bot successfully added.}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12 col-lg-6">
						<div id="add_bot" class="card shadow my-2">
							<div class="card-body">
								<h5 class="card-title">About Bot</h5>
								<div class="card-body">
									<div class="input-group mb-3 col-12">
									    <select id="sel_telegram_bot" class="form-control col-12 col-lg-12">
									        <option value="0">SELECT BOT</option>
									        <?php if($get_telegram_bot->num_rows() > 0): ?>
									            <?php foreach($get_telegram_bot->result() AS $row): ?>
									                <option value="<?php echo $row->username; ?>"><?php echo $row->username; ?></option>
									            <?php endforeach; ?>
									        <?php endif; ?>
									    </select>
									</div>
									<div class="input-group mb-3 col-12 col-lg-4">
										<button class="btn btn-primary" id="but_get_bot" data-loading-text="submitting..." data-complete-text="Submit" onclick="get_api_data('getme');">Submit</button>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div id="add_bot" class="card shadow my-2" style="height:250px">
							<div class="card-body">
								<div class="card-body">
									<div id="get_bot_message" class="text-muted">eg.{status:200, response:bot successfully added.}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
