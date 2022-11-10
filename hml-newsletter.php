<?
$pg = "Newsletter";
$titulo = "$pg | $nmsite";
$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
include("_topo.php");
?>

<!-- rdstation -->
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script type="text/javascript">
    var meus_campos = {
        'EMAIL': 'email',
        'FNAME': 'nome',
        'LNAME': 'Sobrenome1',
        'TELEFONE': 'telefone',
        'EMPRESA': 'empresa',
        'CARGO': 'CargoMundoLogistica'
     };
    options = { fieldMapping: meus_campos };
    RdIntegration.integrate('f44ad08e5fd20312485f516a3a99393c', 'Newsletter', options);  
</script>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="ne_busness_main_slider_wrapper ne_busness_main_slider_wrapper_lifestyle">
										<div class="ne_recent_heading_main_wrapper">
											<h1><?=$pg?></h1>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
<div role="main" id="newsletter-11e33d6da850f141c61c"></div>
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js"></script>
<script type="text/javascript">
  new RDStationForms('newsletter-11e33d6da850f141c61c-html', 'UA-83418258-1').createForm();
</script>	


</div>
</div>
</div>
</div>
</div>
<?
include("_rodape.php");
?>