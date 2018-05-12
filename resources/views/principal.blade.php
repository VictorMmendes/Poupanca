<!DOCTYPE html>
<html>
<head>
	<title>Poupança Coletiva</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ url('/css/photon/css/photon.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/css/photon/css/index.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    @yield('script')
</head>
<body>
	<div class="window">
      <header class="toolbar toolbar-header">
        <h1 class="title">Poupança Coletiva</h1>

        <div class="toolbar-actions">

          <div class="btn-group">
            <button class="btn btn-default btn-principal" onclick="location.href='/'">
              <span class="icon icon-home"></span>
            </button>
          </div>

        </div>
      </header>

      <div class="window-content">
        <div class="pane-group">
          <div class="pane pane-sm sidebar">
            <nav class="nav-group">
              <h5 class="nav-group-title">Ações</h5>
			  <span class="btn-formulario">
              	<span class="nav-group-item">
					<a href="{{ action('PessoaController@adicionar') }}">
	                	<span class="icon icon-plus-circled"></span>
	                	Adicionar Pessoa
					</a>
                </span>
                <span class="nav-group-item">
                    <span class="icon icon-minus-circled"></span>
                    Remover Inativos
				</span>
              </span>
            </nav>
          </div>
          <div class="pane pane-conteudo">
              @yield('conteudo')
          </div>
        </div>
      </div>
    </div>
</body>
</html>
