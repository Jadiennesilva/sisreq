<?php
            
define("DB_INI", "../sis_req_db.ini");
define("API_INI", "../sis_req_api_rest.ini");
             
function autoload($classe) {

    $prefix = 'SisReq';
    $base_dir = 'SisReq';
    $len = strlen($prefix);
    if (strncmp($prefix, $classe, $len) !== 0) {
        return;
    }
    $relative_class = substr($classe, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }

}
spl_autoload_register('autoload');

use SisReq\custom\controller\RequerenteCustomController;
use SisReq\custom\controller\CursoCustomController;
use SisReq\custom\controller\SolicitacoesCustomController;
use SisReq\custom\controller\ServicoCustomController;
use SisReq\custom\controller\UsuarioCustomController;
use SisReq\custom\controller\AssinaturasCustomController;
use SisReq\custom\controller\SetorCustomController;
use SisReq\custom\controller\TipoUsuarioCustomController;


if(isset($_GET['ajax'])){
    switch ($_GET['ajax']){
		case 'requerente':
            $controller = new RequerenteCustomController();
		    $controller->mainAjax();
			break;
		case 'curso':
            $controller = new CursoCustomController();
		    $controller->mainAjax();
			break;
		case 'solicitacoes':
            $controller = new SolicitacoesCustomController();
		    $controller->mainAjax();
			break;
		case 'servico':
            $controller = new ServicoCustomController();
		    $controller->mainAjax();
			break;
		case 'usuario':
            $controller = new UsuarioCustomController();
		    $controller->mainAjax();
			break;
		case 'assinaturas':
            $controller = new AssinaturasCustomController();
		    $controller->mainAjax();
			break;
		case 'setor':
            $controller = new SetorCustomController();
		    $controller->mainAjax();
			break;
		case 'tipo_usuario':
            $controller = new TipoUsuarioCustomController();
		    $controller->mainAjax();
			break;
        default:
            echo '<p>Página solicitada não encontrada.</p>';
            break;
    }

    exit(0);
}
                     
       
?>
            
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>SisReq</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/tema.css" />
<link rel="stylesheet" type="text/css" href="tema.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SisReq</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav"><a class="nav-item nav-link" href="?page=requerente">Requerente</a><a class="nav-item nav-link" href="?page=curso">Curso</a><a class="nav-item nav-link" href="?page=solicitacoes">Solicitacoes</a><a class="nav-item nav-link" href="?page=servico">Servico</a><a class="nav-item nav-link" href="?page=usuario">Usuario</a><a class="nav-item nav-link" href="?page=assinaturas">Assinaturas</a><a class="nav-item nav-link" href="?page=setor">Setor</a><a class="nav-item nav-link" href="?page=tipo_usuario">Tipo Usuario</a>
            
    </div>
  </div>
</nav>
	<main role="main">
            
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Bem vindo ao Sistema de Requerimento!</h1>
              
        </div>
      </section>
              
        <div class="album py-5 bg-light">
            <div class="container">
            
            
            
<?php
if(isset($_GET['page'])){
	switch ($_GET['page']){
    	case 'requerente':
            $controller = new RequerenteCustomController();
    	    $controller->main();
    		break;
    	case 'curso':
            $controller = new CursoCustomController();
    	    $controller->main();
    		break;
    	case 'solicitacoes':
            $controller = new SolicitacoesCustomController();
    	    $controller->main();
    		break;
    	case 'servico':
            $controller = new ServicoCustomController();
    	    $controller->main();
    		break;
    	case 'usuario':
            $controller = new UsuarioCustomController();
    	    $controller->main();
    		break;
    	case 'assinaturas':
            $controller = new AssinaturasCustomController();
    	    $controller->main();
    		break;
    	case 'setor':
            $controller = new SetorCustomController();
    	    $controller->main();
    		break;
    	case 'tipo_usuario':
            $controller = new TipoUsuarioCustomController();
    	    $controller->main();
    		break;
		default:
			echo '<p>Página solicitada não encontrada.</p>';
			break;
	}
}else{
    $controller = new TipoUsuarioCustomController();
	$controller->main();
}
					    
?>
            
            
              </div>
            
            </div>
            
     </main>
            
            
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" href="#">Voltar ao topo</a>
        </p> 
             <div class="hello">
        <img style="margin: auto; display: block;" src="https://ru.cedro.ifce.edu.br/images/ifce.png" alt="">
        
</div>
      </div>
    </footer>
            


<!-- Modal -->
<div class="modal fade" id="modalResposta" tabindex="-1" role="dialog" aria-labelledby="labelModalResposta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalResposta">Resposta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="textoModalResposta"></span>
      </div>
      <div class="modal-footer">
        <button type="button" id="botao-modal-resposta" class="btn btn-primary" data-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
</div>



        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        


        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $('#dataTable').dataTable();
        </script>


        <script src="js/requerente.js" ></script>
        <script src="js/curso.js" ></script>
        <script src="js/solicitacoes.js" ></script>
        <script src="js/servico.js" ></script>
        <script src="js/usuario.js" ></script>
        <script src="js/assinaturas.js" ></script>
        <script src="js/setor.js" ></script>
        <script src="js/tipo_usuario.js" ></script>
	</body>
</html>