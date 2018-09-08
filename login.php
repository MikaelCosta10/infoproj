
<html lang="en">
<head>
    <meta charset="UTF-8">
    
      <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                             <div class="text-center mb-4">
                            <img width="300px" height="230px" src="imagens/logo.png"/>
                            <p style="font-size:200%; text-align:center;color: rgb(0, 0, 0);"><strong>LOGIN</strong></p>
							<div class="col-xs-6">
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form  method="post" action="php/loginphp.php" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="prontuario" tabindex="1" class="form-control"  placeholder="Prontuário">
									</div>
									<div class="form-group">
										<input type="password" name="senha"  tabindex="2" class="form-control" placeholder="Senha">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit"  tabindex="3" class="form-control btn btn-login" >
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="http://infoprojweb.tk/recuperar-senha.php" tabindex="5" class="forgot-password">Recuperar Senha</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>