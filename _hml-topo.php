<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-BR">
<!--[endif]-->
<head>

	<meta name="robots" content="noindex">

	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<? if (!$atual) { ?>
	<title>MundoLogística - portal e revista de logística e supply chain</title>
	<meta name='description' content='O portal MundoLogística publica notícias, entrevistas, artigos, blogs sobre logística, supply chain, transporte, armazenagem, tecnologia e muito mais' />
	<meta property="og:title" content="MundoLogística - portal e revista de logística e supply chain" />
	<? } else { ?>
	<title><?= $titulo ?></title>
	<meta property="og:title" content="<?= $titulo ?>" />
	<? if (isset($descricao)) { 
	    print "<meta name='description' content='$descricao' />";
	    print "<meta property='og:description' content='$titulo' />";

		} 
	?>
	<? } ?>
	
	<?if($ogTags){?>
	<meta property="og:image" content="<?=$ogTags?>" />
	<?}else{?>
	<meta property="og:image" content="https://mundologistica.com.br/admin/ckedito…finder/userfiles/files/divulgacao-mantiqueira.png" />
	<?}?>
	
	
	<meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="agenciamacan.com.br">
    <meta name="MobileOptimized" content="320">
	
	<base href="<?= $url_total ?>" />
	<!--<link href="</assets/css/style.css" rel="stylesheet" type="text/css" />-->


	<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
	<link rel="canonical" href="<?= $url_total . join("/",$url_array); ?>" />
	<link rel="alternate" type="application/rss+xml" title="Feed MundoLogística" href="<?= $url_total ?>rss.xml" />
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-83418258-1', 'auto');
		ga('send', 'pageview');
	</script>
	

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1ZLNP21G2B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1ZLNP21G2B');
</script>
	
	
<!-- Hotjar Tracking Code for https://revistamundologistica.com.br/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3107109,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

	
<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '323088639792438');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=323088639792438&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Global site tag (gtag.js) - Google Ads -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10899792638"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10899792638');
</script>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= $url_total ?>/assets/assinatura.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/checkout.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/header.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/article.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/entrevistas.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/general.css?t=<?=time()?>">
    <link rel="stylesheet" href="<?= $url_total ?>/assets/index.css?t=<?=time()?>">



</head>
<body class="mld-white-mode " itemscope itemtype="http://schema.org/WebPage">


<header>

	<nav class="navbar light">
		<span class="container-left">
			<a href="#" class="mdl-header-whatsapp--link">Entre em contato</a>
		</span>
		<span class="container-right">
			<span class="mdl-header-social-w">
				<ul class="mdl-header-social--itens">
					<li class="mdl-header-social-item"><a href="#" class="mdl-header-social-item--link instagram">Facebook</a></li>
					<li class="mdl-header-social-item"><a href="#" class="mdl-header-social-item--link facebook">Instagram</a></li>
					<li class="mdl-header-social-item"><a href="#" class="mdl-header-social-item--link linkedin">Linkedin</a></li>
					<li class="mdl-header-social-item"><a href="#" class="mdl-header-social-item--link youtube">Youtube</a></li>
					<li class="mdl-header-social-item"><a href="#" class="mdl-header-social-item--link whatsapp">Whatsapp</a></li>
				</ul>
			</span>
		</span>
	</nav>

	<nav class="navbar light mdl-navbar-header-w">
		<div class="container-fluid NavH">
			<button class="navbar-toggler mdl-navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
				aria-controls="offcanvasNavbar">
				<span class="navbar-toggler-icon mdl-navbar-toggler-icon"></span>
			</button>
			<a href="<?= $url_total ?>">
				<img class="logo" src="assets/images/revistamundologistica.png" alt="">
			</a>    
				<ul class="nav nav-pills">

				<?
				$btnPadrao = true;
				if ($_COOKIE["loginNome"]){
					$btnPadrao=false;
				}
				
				if ($btnPadrao){
				?>					
								<li class="nav-item mdl-nav-item mdl-nav-assinante mdl-header--nav-link"><a href="#" class="nav-link">Já sou assinante</a></li>			
                                
				<?
				} else {
				?>
								<li class="nav-item mdl-nav-item mdl-nav-assinante mdl-header--nav-link"><a href="<?= $url_total ?>/Assinante.jsp" class="nav-link">Já sou assinante</a></li>
				<?
				}
				?>


					<li class="nav-item mdl-nav-item mdl-nav-assine mdl-header--nav-link-rounded"><a href="<?= $url_total ?>/manter-se-atualizado" target="_blank" class="nav-link">Assine</a></li>
				</ul>

				


			<div class="offcanvas offcanvas-start" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
				<div class="offcanvas-header">
				<div class="row">
						<div class="col-md-12">
							<div class="mdl-offcanvas--heading">
								<div class="mdl-offcanvas--heading-title"><a href="<?= $url_total ?>/manter-se-atualizado" target="_blank">Assine hoje</a></div>
								<div class="mdl-offcanvas--heading-sub">ou <a href="<?= $url_total ?>/Assinante.jsp">entre na sua conta</a></div>
							</div>
						</div>
				</div>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">

					<div class="mdl-offcanvas-body--nav-w">
						<ul class="mdl-offcanvas-body--nav-w-list">
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Início</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Distribuição</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Eventos</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Gestão de Logística</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Infraestrutura</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Negócios</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Sustentabilidade</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Tecnologia</a></li>
							<li class="mdl-offcanvas-body--nav-w-list-item"><a href="#">Transporte</a></li>
						</ul>
					</div>

					<div class="mdl-offcanvas-body-more-q">
					
						<div class="mdl-off-canvas-body-more-q--item">
							<a href="#" class="mdl-off-canvas-body-more-q--item-link startups">
							Conheça as Startups do setor
							</a>
						</div>


						<div class="mdl-off-canvas-body-more-q--item">
							<a href="#" class="mdl-off-canvas-body-more-q--item-link anuncie">
							Anuncie com a gente!
							</a>
						</div>
					</div>


					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="display:none;">
					
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-expanded="false">
								Explorar
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				
				</div>
			</div>
		</div>
	</nav>

	<div class="mld-nav-menu d-flex py-3">
		<div class="container">
			<ul class="nav mdl-nav row">
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-noticias" class="nav-link mld-nav-menu-link">Notícias</a></li>
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-entrevistas" class="nav-link mld-nav-menu-link">Entrevistas</a></li>
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-artigos" class="nav-link mld-nav-menu-link">Artigos</a></li>
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-webinar" class="nav-link mld-nav-menu-link">Webinars</a></li>
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-colunas" class="nav-link mld-nav-menu-link">Colunas</a></li>
				<li class="nav-item mld-nav-menu-item col"><a href="<?= $url_total ?>hml-podcast" class="nav-link mld-nav-menu-link">Podcast</a></li>
			</ul>
	</div>

</header>

<div class="mdl-spacing"></div>

	<!-- LOGAR NA ÁREA DO ASSINANTE / mobile -->
	<div id="mobile-nav" data-prevent-default="true" data-mouse-events="true" style="display:none">
		<div class="mobail_nav_overlay"></div>
		<div class="mobile-nav-box">
			<div class="mobile-logo">
				<a href="<?= $url_total ?>" class="mobile-main-logo">
					<img src="assets/images/revistamundologistica.png" alt="MundoLogística" class="img-responsive">
				</a> 
				<a class="manu-close cursorPointer"><i class="fa fa-times"></i></a>
			</div>
			<div class="clearfix"></div>
			<form id="form" action="https://mundologistica.com.br/Login.jsp" method="POST" style="margin-top:30px">
				<p style="margin-bottom:1em">Informe os dados de acesso para entrar na área do assinante.</p>
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<input type="email" name="email" placeholder="E-mail" class="require" required>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<input type="password" name="senha" placeholder="Senha" class="require" required>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12 text-center">
						<div class="ne_map_form_input1">
							<button type="submit" class="submitForm">Entrar</button>
						</div>
					</div>
				</div>
			</form>
			
		</div>
	</div>
	<!-- LOGAR NA ÁREA DO ASSINANTE / mobile  -->

	

    <div class="prs_navigation_main_wrapper" style="display:none;">
        <div class="container">
            <div class="prs_navi_left_main_wrapper">
         
                <div class="prs_menu_main_wrapper">
                    <nav class="navbar navbar-default">
                        <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                            <button class="dl-trigger">
                                <img src="assets/images/header/bars.png" alt="bar_png">
                            </button>
                            <div class="clearfix"></div>
                            <ul class="dl-menu">
                                <li class="parent"><a href="<?= $url_total ?>" class="effect_nav">HOME</a></li>
                                <li class="parent">
									<a class="effect_nav cursorPointer">CONTEÚDO</a>
									<ul class="lg-submenu">
                                        <li><a href="<?= $url_total ?>noticias">Notícias</a></li>
                                        <li><a href="<?= $url_total ?>entrevistas">Entrevistas</a></li>
                                        <li><a href="<?= $url_total ?>artigos">Artigos</a></li>
                                        <li><a href="<?= $url_total ?>webinar">Webinars</a></li>
										<li><a href="https://logeduc.com.br" target="_blank">Cursos On-line</a></li>
                                        <li><a href="<?= $url_total ?>blog">Blog</a></li>
                                    </ul>
								</li>
                                <li class="parent">
									<a class="effect_nav cursorPointer">Revista</a>
									<ul class="lg-submenu">
                                        <!-- <li><a href="<?= $url_total ?>manter-se-atualizado">Assinatura</a></li> -->
                                        <li><a href="<?= $url_total ?>revista/comprar-edicoes">Comprar Edições</a></li>
                                        <li><a href="<?= $url_total ?>revista/onde-encontrar">Onde Encontrar</a></li>
                                        <li><a href="<?= $url_total ?>revista/edicoes-anteriores">Edições Anteriores</a></li>
                                    </ul>
								</li>
                                <!-- <li class="parent">
									<a class="effect_nav cursorPointer">Podcast</a>
									<ul class="lg-submenu">
                                        <li><a href="<?= $url_total ?>podcast">nstech cast</a></li>
                                    </ul>
								</li> -->
                                <li class="parent"><a href="<?= $url_total ?>podcast" class="effect_nav">Podcast</a></li>
                                <li class="parent"><a href="<?= $url_total ?>contato" class="effect_nav">Contato</a></li>
                                <li class="parent"><a href="<?= $url_total ?>startup" class="effect_nav">Startups</a></li>
                                <li class="parent"><a href="<?= $url_total ?>anuncie" class="effect_nav">ANUNCIE</a></li>
                                <li class="parent"><a href="<?= $url_total ?>newsletter" class="effect_nav">Newsletter</a></li>
                                <li class="parent destaque"><a href="<?= $url_total ?>manter-se-atualizado" class="effect_nav">A S S I N E</a></li>

					
								
                            </ul>
                        </div>
                        <!-- /dl-menuwrapper -->
                    </nav>
                </div>
            </div>
			
        </div>
    </div>
	
	<!-- BANNER 728X90 -->
	<div class="hidden-sm container" style="display:none">
		<?
		$dataHoje = date("Y-m-d");
		$sel = mysqli_query($con,"SELECT * FROM banners 
		WHERE status = '1' AND tipo = '1' AND '$dataHoje' BETWEEN data_ini AND data_fim
		ORDER BY RAND()
		LIMIT 0,1");
		while ($dados = mysqli_fetch_array($sel)) {
			if ($dados["codigo"]) {
				print $dados["codigo"];
			}
			else {
				if ($dados["link"]) {
					print "<a href='".$url_total."cliques?id_banner=$dados[id]' target='_blank'><img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' class='img-responsive' /></a>\n";
				}
				else {
					print "<img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' class='img-responsive' />\n";
				}
			}
		}
		?>
	</div>
	<!-- BANNER 728X90 -->