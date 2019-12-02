<?php require_once('./include/mysqli_connect.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Controle do braço robótico</title>
    
    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
	.li-post-group {
		background: #f5f5f5;
		padding: 5px 10px;
		border-bottom: solid 1px #CFCFCF;
		margin-top: 5px;
	}
	.li-post-title {
	    border-left: solid 4px #000000;
	    background: #f57a7a;
	    padding: 5px;
	    color: #304d49;
	    margin: 0px;
	}
	.show-more {
	    background: #00a611;
	    width: 100%;
	    text-align: center;
	    padding: 10px;
	    border-radius: 5px;
	    margin: 5px;
	    color: #fff;
	    cursor: pointer;
	    font-size: 20px;
	    display: none;
	    margin: 0px;
    	margin-top: 25px;
	}
	.li-post-desc {
	    line-height: 15px !important;
	    font-size: 12px;
	    box-shadow: inset 0px 0px 5px #7d9c9b;
	    padding: 10px;
	    margin: 0px;
	}
	.panel-default {
	    margin-bottom: 100px;
	}
	.post-data-list {
	    max-height: 374px;
	    overflow-y: auto;
	}
	.radio-inline {
	    font-size: 20px;
	    color: #c36928;
	}
	.progress, .progress-bar{ height: 40px; line-height: 40px; display: none; }

	#post_list li
   {
    border: 1px solid #000000;
    cursor: move;
    margin-top:10px;
   }
   #post_list li.ui-state-highlight {
    padding: 20px;
    background-color: #eaecec;
    border: 1px dotted #ccc;
    cursor: move;
    margin-top: 12px;
    }
	.slider{
	-webkit-appearance: none;
	width:100%;
	height:25px;
	background: #d3d3d3;
	outline: none;
	opacity: 0.7;
	-webkit-transition: .2s;
	transition: opacity .2s;
	cursor:move;
	}

	.slider:hover{
	opacity: 1;
	}

	.slider::-webkit-slider-thumb {
	-webkit-appearance: none;
	appearance: none;
	width: 25px;
	height: 25px;
	background: #f57a7a;
	cursor: pointer;
	}

	.slider::-moz-range-thumb {
	width: 25px;
	height: 25px;
	background: #f57a7a;
	cursor: pointer;
	}
	</style>
</head>
<body>
    <div class="all-content-wrapper">
	
		<section class="container">
			<div class="form-group custom-input-space has-feedback">
				<div class="page-heading">
					<h3 class="post-title">Controle do braço robótico</h3>
				</div>
				<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div class="panel panel-default">
							<div>
								<form action="quant.php" method="POST">

									<label>Body:</label>      
									<button name="quant1" class="btn btn-danger" value="1">ADD</button>

									<label>Claw:</label>      
									<button name="quant2" class="btn btn-danger" value="1">ADD</button>

									<label>Attack:</label>      
									<button name="quant3" class="btn btn-danger" value="1">ADD</button>
	
									<label>Elevator:</label>      
									<button name="quant4" class="btn btn-danger" value="1">ADD</button>
	
								</form>
							</div>
								<div class="panel-heading">Ordem:</div>
								<div class="panel-body">
									<div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
										<i class="fa fa-fw fa-check-circle"></i>
										<strong> Sucesso! </strong> <span class="success-message">Ordem atualizada </span>
									</div>
									<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
										<i class="fa fa-fw fa-times-circle"></i>
										<strong> Nota!</strong> <span class="warning-message"> Lista vazia </span>
									</div>

									<ul class="list-unstyled" id="post_list">
									<?php
									//get rows query
									$query = mysqli_query($con, "SELECT * FROM li_ajax_control_load ORDER BY ordem_no ASC");
									
									//number of rows
									$rowCount = mysqli_num_rows($query);
									
									if($rowCount > 0){ 
										while($row = mysqli_fetch_assoc($query)){ 
											$tutorial_id = 	$row['id'];
									?>
										<li data-post-id="<?php echo $row["id"]; ?>">
										
											<div class="li-post-group">
											<form action="enviar.php" method="POST">
											<h5 class="li-post-title"><?php echo $row["id"].' -  '.ucfirst($row["titulo"]); $array_id = $row['id'];?></h5>
											<p class="li-post-desc"> <?php $angulo = $row["angulo"]; if ($angulo == "open"){$angulo = "120";}elseif($angulo == "close"){$angulo = "65";} ?>
											<input type="text" id="display<?php echo $row['ordem_no'];?>" name="garra" value="<?php echo $angulo;?>"><br>
											<?php if(($angulo == "120") || ($angulo == "65")){
												?>
																								
												<select name="post_range<?php echo $row['id'];?>" style="text-align-last: center;display: flex;margin: 0 auto;">
												<option value="">Selecione</option>
													<?php if ($angulo == "65"){
														 ?> <option value="120">Fechado</option>
														<?php }
														elseif($angulo == "120"){
															?> <option value="65">Aberto</option>
														<?php };
														?>
													
													
												</select>
												
												<?php

											}else{
												?>
												
													<input type="range" min="1" max="180" value="<?php echo $angulo;?>" data-post-angulo="<?php echo $angulo; $array_angulo[] = $angulo; $ordem[] = $row['ordem_no'];?>" name="post_range<?php echo $row['id'];?>" class="slider" id="myRange" name="body" oninput="display<?php echo $row['ordem_no'];?>.value=value" onchange="display<?php echo $row['ordem_no'];?>.value=value"></p>
													
												<?php	
																			
											};
											?>

										</div>
										</li>
									<?php }
									} ?>
									</ul>
									
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	<input type="submit" value="Executar movimento" style="position: absolute;top: 57px;left: 1165px;" class="btn btn-danger">
		</form>
	
	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script>

	$(document).ready(function(){
		$( "#post_list" ).sortable({
			placeholder : "ui-state-highlight",
			update  : function(event, ui)
			{
				var post_order_ids = new Array();
				$('#post_list li').each(function(){
					post_order_ids.push($(this).data("post-id"));
				});
				$.ajax({
					url:"ajax_upload.php",
					method:"POST",
					data:{post_order_ids:post_order_ids},
					success:function(data)
					{
					 if(data){
					 	$(".alert-danger").hide();
					 	$(".alert-success ").show();
						location.reload();
					 }else{
					 	$(".alert-success").hide();
					 	$(".alert-danger").show();
					 }
					}
				});
			}
		});
	});
	</script>
</body>
</html>