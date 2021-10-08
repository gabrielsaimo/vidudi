<?
if(!empty($idusuario_cookie)){?>
<link rel="stylesheet" type="text/css" href="../css/navibar.css">
<section class="navigation">
    <div class="nav-container">
      <div class="brand">
        <a href="index.php"> <img src="../img/logovid.jpg" class="imagem"  style="width: 55px !important; border-radius: 50%;"/></a> 
      </div>
      <nav>
        <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
          <a  href="?_modulo=pessoa&_colunas[]=nome&_colunas[]=sexo&_colunas[]=emcargo&_colunas[]=rede&_colunas[]=criadoem&_colunas[]=alteradoem&_pk=idpessoa">Pesquisar Pessoa</a>
          </li>
          <li>
            <a href="#!">Services</a>
            <ul class="navbar-dropdown">
              <li>
                <a href="#!">Sass</a>
              </li>
              <li>
                <a href="#!">Less</a>
              </li>
              <li>
                <a href="#!">Stylus</a>
              </li>
            </ul>
          </li>
          <li>
          <a  href="?_modulo=celula&_colunas[]=id&_colunas[]=celula&_colunas[]=endereco&_colunas[]=dia&_colunas[]=hora&_colunas[]=lider&_colunas[]=multiplicou">celulas</a>
          </li>
          <li>
            <a href="#!">Category</a>
            <ul class="navbar-dropdown">
              <li>
                <a href="#!">Sass</a>
              </li>
              <li>
                <a href="#!">Less</a>
              </li>
              <li>
                <a href="#!">Stylus</a>
              </li>
            </ul>
          </li>
          <li>
          <a href="?_modulo=celula&_acao=r">Inserir celula</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
  <script>
      // Open close dropdown on click
$("li.dropdown").click(function(){
	if($(this).hasClass("open")) {
		$(this).find(".dropdown-menu").slideUp("fast");
		$(this).removeClass("open");
	}
	else { 
		$(this).find(".dropdown-menu").slideDown("fast");
		$(this).toggleClass("open");
	}
});

// Close dropdown on mouseleave
$("li.dropdown").mouseleave(function(){
	$(this).find(".dropdown-menu").slideUp("fast");
	$(this).removeClass("open");
});

// Navbar toggle
$(".navbar-toggle").click(function(){
	$(".navbar-collapse").toggleClass("collapse").slideToggle("fast");
});


  </script>
<?}?>
<?/*
$login_cookie = $_COOKIE['login'];
$banco = abrirBanco();
$q1 = $banco->query("SELECT u.*,p.id,p.idemcargo,p.idrede from usuario u join pessoa p on (u.idusuario = p.idusuario)where u.idusuario =".$idusuario_cookie);
$row = mysqli_fetch_array($q1);*/
?>
