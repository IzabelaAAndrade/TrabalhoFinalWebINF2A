<!DOCTYPE html>
<html>
<head>
	<title>Interface de Emprestimos</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="ajustes.css"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>

	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  		Cadastrar
	</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Empréstimos</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
	      </div>
	      <div class="modal-body">
	        <div class="campos">
	        	<div class="row g-3 align-items-center">
					<div class="col-auto">
				    	<label class="col-form-label"></label>
				  	</div>
				  	<div class="col-auto">
				    	<input type="text" id="id_aluno" class="form-control" aria-describedby="passwordHelpInline" placeholder="ID do aluno">
				  	</div>
				  	<div class="col-auto">
				    	<span id="passwordHelpInline" class="form-text">
				      		
				    	</span>
				  	</div>
				</div>
			</div>

			<div class="campos">
	        	<div class="row g-3 align-items-center">
					<div class="col-auto">
				    	<label class="col-form-label"></label>
				  	</div>
				  	<div class="col-auto">
				    	<input type="text" id="id_acervo" class="form-control" aria-describedby="passwordHelpInline" placeholder="ID do acervo">
				  	</div>
				  	<div class="col-auto">
				    	<span id="passwordHelpInline" class="form-text">
				      		
				    	</span>
				  	</div>
				</div>
			</div>

			<div id="status"></div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline-success" id="confirmar" disabled>Confirmar</button>
			<button type="button" class="btn btn-outline-danger" id="cancelar" disabled>Cancelar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script src="ajax.js"></script>
	<script src="dom.js"></script>
</body>
</html>