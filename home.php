<?php
include("conectar.php");
include("var.php");
    $resultado = mysqli_query($conexao, 'SELECT * FROM empresa WHERE nome = "'.$username.'"' );
	if (!$resultado) {
        $erro = mysqli_error($conexao);
        echo("FAIL $erro");
    }
	else {   
		$row = mysqli_fetch_assoc($resultado);
		//echo("<tr><td>".$row["nome"]."</td><td>de</td><td>".$row["cnpj"]."</td></tr>");
		$id_empresa = $row["id_empresa"];
		$cnpj = $row["cnpj"];
		$telefone = $row["telefone"];
		$email = $row["email"];
		$cidade = $row["cidade"];
		$estado = $row["estado"];
		
		// util para lista de setores
		$resultadoSetores = mysqli_query($conexao, "SELECT * FROM setor WHERE fk_empresa = '".$id_empresa."'");
		if (!$resultado) {
			$erro = mysqli_error($conexao);
			echo("FAIL $erro");
		} else {
			$countSector = 0;
			while ($rowSetor = mysqli_fetch_array($resultadoSetores))
			{
				foreach ($rowSetor as $column => $description)
				{
					//echo "column: $description <br>"; // teste de tabela
					$setor[$countSector] = $rowSetor["nome"];
					$countSector++;
				}
			}
		}
    }
    function format_phone_number($number) {
    $tel = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{4})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $number);
    return $tel;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><? echo($username.$cnpj) ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- CSS | STYLE -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/linecons.css" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/colors/brown.css"  id="csscolors"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- CSS | Google Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,500,600' rel='stylesheet' type='text/css'>

    <noscript>
        <style>
        @media screen and (max-width: 755px) {
            .hs-content-scroller {
                overflow: visible;
            }
        }
        </style>
    </noscript>
</head>

<body>
    <!-- Page preloader -->
    <div id="page-loader">
        <canvas id="demo-canvas"></canvas>
    </div>
    <!-- container -->
    <div id="hs-container" class="hs-container">
            <div class="switcher" style="left:-40px;">
            <a id="switch-panel" class="hide-panel"><i class="li_params"></i></a>
            <ul class="colors-list">
                <li>
                    <a title="blue" class="blue"></a>
                </li>
                <li>
                    <a title="brown" class="brown"></a>
                </li>
                <li>
                    <a title="cyan" class="cyan"></a>
                </li>
                <li>
                    <a title="gray" class="gray"></a>
                </li>
                <li>
                    <a title="green" class="green"></a>
                </li>
                <li>
                    <a title="light-brown" class="light-brown"></a>
                </li>
                <li>
                    <a title="light-green" class="light-green"></a>
                </li>
                <li>
                    <a title="orange" class="orange"></a>
                </li>
            </ul>
        </div>
        <div class="switcher-responsive" style="right:-40px;">
            <a id="switch-panel-responsive" class="hide-panel"><i class="li_params"></i></a>
            <ul class="colors-list">
                <li>
                    <a title="blue" class="blue"></a>
                </li>
                <li>
                    <a title="brown" class="brown"></a>
                </li>
                <li>
                    <a title="cyan" class="cyan"></a>
                </li>
                <li>
                    <a title="gray" class="gray"></a>
                </li>
                <li>
                    <a title="green" class="green"></a>
                </li>
                <li>
                    <a title="light-brown" class="light-brown"></a>
                </li>
                <li>
                    <a title="light-green" class="light-green"></a>
                </li>
                <li>
                    <a title="orange" class="orange"></a>
                </li>
            </ul>
        </div>

        <!-- Sidebar-->
        <div class="aside1">
            <a class="contact-button"><i class="fa fa-paper-plane"></i></a>
            <a class="download-button"><i class="fa fa-cloud-download"></i></a>
            <div class="aside-content"><span class="part1"><? echo($username) ?></span><span class="part2"><? echo($email) ?></span>
            </div>
        </div>
        <aside class="hs-menu" id="hs-menu">
            <!-- <canvas id="demo-canvas"></canvas> -->

            <!-- Profil Image-->
            <div class="hs-headline">
                <a id="my-link" href="#my-panel"><i class="fa fa-bars"></i></a>
                <a href="#" class="download"><i class="fa fa-cloud-download"></i></a>
                <div class="img-wrap">
                    <img src="http://icons.iconarchive.com/icons/designbolts/free-multimedia/1024/iMac-icon.png" alt="" width="150" height="150" />
                </div>
                <div class="profile_info">
                    <h1><? echo($username) ?></h1>
                    <h4><? echo(format_phone_number($telefone)) ?></h4>
                    <h6><span class="fa fa-location-arrow"></span>&nbsp;&nbsp;&nbsp;<? echo($cidade) ?>, <? echo($estado) ?></h6>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="separator-aside"></div>
            <!-- End Profil Image-->

            <!-- menu -->
            <nav>
                <a href="#section1"><span class="menu_name">SOBRE</span><span class="fa fa-home"></span> </a>
                <a href="#section2"><span class="menu_name">RESUMO</span><span class="fa fa-newspaper-o"></span> </a>
                <a href="#section3"><span class="menu_name">SERVIÇOS</span><span class="fa fa-laptop"></span> </a>
                <a href="#section4"><span class="menu_name">PROCESSOS &amp; TIME</span><span class="fa fa-users"></span> </a>
                <!--
                <a href="#section5"><span class="menu_name">PRICING</span><span class="fa fa-money"></span> </a>
                <a href="#section6"><span class="menu_name">SKILLS</span><span class="fa fa-diamond"></span> </a>
                -->
                <a href="#section7"><span class="menu_name">TRABALHOS</span><span class="fa fa-archive"></span> </a>
                <a href="#section8"><span class="menu_name">CONTATO</span><span class="fa fa-paper-plane"></span> </a>
            </nav>
            <!-- end menu-->
            <!-- social icons -->
            <div class="aside-footer">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa fa-github"></i></a>
            </div>
            <!-- end social icons -->
        </aside>
        <!-- End sidebar -->

        <!-- Go To Top Button -->
        <a href="#hs-menu" class="hs-totop-link"><i class="fa fa-chevron-up"></i></a>
        <!-- End Go To Top Button -->

        <!-- hs-content-scroller -->
        <div class="hs-content-scroller">
            <!-- Header -->
            <div id="header_container">
                <div id="header">
                    <div><a class="home"><i class="fa fa-home"></i></a>
                    </div>
                    <div><a href="" class="previous-page arrow"><i class="fa fa-angle-left"></i></a>
                    </div>
                    <div><a href="" class="next-page arrow"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- News scroll -->
                    <div class="news-scroll">
                        <span><i class="fa fa-line-chart"></i>ATIVIDADE RECENTE : </span>
                        <ul id="marquee" class="marquee">
                            <li>
                            	Foi visto um pikachu perto do instituto federal catarinense.
                            </li>
                            <li>
                                É preciso de 100 Magikarps para fazer um Gyarados.
                            </li>
                            <li>
                                Digimon é melhor que pokémon.
                            </li>
                            <li>
                                Essa empresa odeia God of War.
                            </li>
                            <li>
                                Legend of Zelda é o melhor jogo do mundo.
                            </li>
                            <li>
                                O melhor jogo competitivo online é Pac-Man Championchip Edition DX.
                            </li>
                        </ul>
                    </div>
                    <!-- End News scroll -->
                </div>
            </div>
            <!-- End Header -->

            <!-- hs-content-wrapper -->
            <div class="hs-content-wrapper">
                <!-- About section -->
                <article class="hs-content about-section" id="section1">
                    <span class="sec-icon fa fa-home"></span>
                    <div class="hs-inner">
                        <span class="before-title">.01</span>
                        <h2>SOBRE</h2>
                        <span class="content-title">DETALHES</span>
                        <div class="aboutInfo-contanier">
                            <div class="about-card">
                                <div class="face2 card-face">
                                    <div id="cd-google-map">
                                        <div id="google-container"></div>
                                        <div id="cd-zoom-in"></div>
                                        <div id="cd-zoom-out"></div>
                                        <address><? echo($cidade." ".$estado) ?></address>
                                        <div class="back-cover" data-card-back="data-card-back"><i class="fa fa-long-arrow-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="face1 card-face">
                                    <div class="about-cover card-face">
                                        <a class="map-location" data-card-front="data-card-front"><img src="images/map-icon.png" alt="">
                                        </a>
                                        <div class="about-details">
                                            <div><span class="fa fa-inbox"></span><span class="detail"><? echo($email) ?></span>
                                            </div>
                                            <div><span class="fa fa-phone"></span><span class="detail"><? echo(format_phone_number($telefone)) ?></span>
                                            </div>
                                        </div>

                                        <div class="cover-content-wrapper">
                                            <span class="about-description">Setores:<span class="rw-words">
                                                <span><strong>Designer</strong></span>
                                            <span><strong>Researcher</strong></span>
                                            <span><strong>Programmer</strong></span>
                                            <span><strong>Dreamer</strong></span>
                                            <span><strong>Leader</strong></span>
                                            </span>
                                            <br>Onde os serviços são otimizados
                                            <br>Essa é a pagina perfil da empresa</span>
                                            <span class="status">
                                            <span class="fa fa-circle"></span>
                                            <span class="text">Available as <strong><? echo($username) ?></strong></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-details">
                                <div class="tabbable tabs-vertical tabs-left">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#desc" data-toggle="tab">Descrição</a>
                                        </li>
                                        <li>
                                            <a href="#areas" data-toggle="tab">Areas</a>
                                        </li>
                                        <li>
                                            <a href="#facts" data-toggle="tab">Fatos</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">

                                        <div class="tab-pane fade in active" id="desc">
                                            <h3>DESCRIÇÃO</h3>
                                            <h4>SOBRE A EMPRESA</h4>
                                            <p>Aqui a descrição da empresa, deverá ser preenchido no registro(Opcional) ou na edição do perfil.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo.Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non .</p>
                                        </div>
                                        <div class="tab-pane fade" id="areas">
                                            <h3>AREAS</h3>
                                            <h4>SETORES DA EMPRESA</h4>
                                            <div class="hobbie-wrapper row">
                                                <? 
                                                $count = 1;
												echo($countSector);
                                                while ($count < $countSector)
                                                {
                                                	echo($setor[$count]);
                                                	$count++;
                                                }
                                                ?>
                                                <div class="hobbie-icon col-md-3"><i class="li_lab"></i>
                                                </div>
                                                <div class="hobbie-description col-md-9">

                                                    <p>Cientistas.</p>
                                                </div>
                                                <div style="clear:both;"></div>
                                            </div>
                                            <div class="hobbie-wrapper row">
                                                <div class="hobbie-icon col-md-3"><i class="li_pen"></i>
                                                </div>
                                                <div class="hobbie-description col-md-9">

                                                    <p>Designers.</p>
                                                </div>
                                            </div>
                                            <div class="hobbie-wrapper row">
                                                <div class="hobbie-icon col-md-3"><i class="li_tv"></i>
                                                </div>
                                                <div class="hobbie-description col-md-9">

                                                    <p>Programadores oldschool.</p>
                                                </div>
                                            </div>
                                            <div class="hobbie-wrapper row">
                                                <div class="hobbie-icon col-md-3"><i class="li_shop"></i>
                                                </div>
                                                <div class="hobbie-description col-md-9">

                                                    <p>Marketing.</p>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div class="tab-pane fade" id="facts">
                                            <h3>FATOS</h3>
                                            <h4>NUMEROS</h4>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class=" li_cup"></i>
                                                </div>
                                                <div class="facts-number">920</div>
                                                <div class="facts-description">COPOS DE CAFÉ</div>
                                            </div>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class="li_bulb"></i>
                                                </div>
                                                <div class="facts-number">65</div>
                                                <div class="facts-description">PROJETOS COMPLETADOS</div>
                                            </div>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class="li_clock"></i>
                                                </div>
                                                <div class="facts-number">2965</div>
                                                <div class="facts-description">HORAS DE CÓDIGOS</div>
                                            </div>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class="li_t-shirt"></i>
                                                </div>
                                                <div class="facts-number">35</div>
                                                <div class="facts-description">WORKSHOPS</div>
                                            </div>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class="li_display"></i>
                                                </div>
                                                <div class="facts-number">2M</div>
                                                <div class="facts-description">LINHAS DE CÓDIGO</div>
                                            </div>
                                            <div class="facts-wrapper col-md-6">
                                                <div class="facts-icon"><i class=" li_like"></i>
                                                </div>
                                                <div class="facts-number">100</div>
                                                <div class="facts-description">CLIENTES SATISFEITOS</div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </article>
                <!-- End About Section -->

                <!-- Resume Section -->
                <article class="hs-content resume-section" id="section2">
                    <span class="sec-icon fa fa-newspaper-o"></span>
                    <div class="hs-inner">
                        <span class="before-title">.02</span>
                        <h2>RESUMO</h2>
                        <!-- Resume Wrapper -->
                        <div class="resume-wrapper">
                            <ul class="resume">
                                <!-- Resume timeline -->
                                <li class="time-label">
                                    <span class="content-title">SERVIÇOS ANTERIORES</span>
                                </li>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-graduation-cap"></span>
                                        <div class="resume-date">
                                            <span>2008</span>
                                            <div class="separator"></div>
                                            <span>2010</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i>'Merica</span>
                                        <h3 class="timeline-header">COMPUTER ENGINEERING</h3>
                                        <div class="timeline-body">
                                            <h4>UNIVERSIDADE DA NINTENDO</h4>
                                            <span>Implementar a engenharia da computação na nova universidade da nintendo da américa.</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-briefcase"></span>
                                        <div class="resume-date">
                                            <span>2004</span>
                                            <div class="separator"></div>
                                            <span>2008</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i>'Mérica</span>
                                        <h3 class="timeline-header">ELECTRONICS ENGINEERING</h3>
                                        <div class="timeline-body">
                                            <h4>UNIVERSIDADE DA NINTENDO</h4>
                                            <span>Implementar novo curso na universidade.</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="time-label">
                                    <span class="content-title">TRABALHOS</span>
                                </li>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-briefcase"></span>
                                        <div class="resume-date">
                                            <span>2009</span>
                                            <div class="separator"></div>
                                            <span>2010</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i>Local</span>
                                        <h3 class="timeline-header">WEB DEVELOPER</h3>
                                        <div class="timeline-body">
                                            <h4>NOME DA COMPANIA</h4>
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem.</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-briefcase"></span>
                                        <div class="resume-date">
                                            <span>2009</span>
                                            <div class="separator"></div>
                                            <span>2010</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i>'Merica</span>
                                        <h3 class="timeline-header">FRONT-END DEVELOPER</h3>
                                        <div class="timeline-body">
                                            <h4>NOME DA COMPANIA</h4>
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem.</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="resume-tag">
                                        <span class="fa fa-briefcase"></span>
                                        <div class="resume-date">
                                            <span>2008</span>
                                            <div class="separator"></div>
                                            <span>2009</span>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-location"><i class="fa fa-map-marker"></i>'Merica</span>
                                        <h3 class="timeline-header">UI/UX DESIGNER</h3>
                                        <div class="timeline-body">
                                            <h4>NOME DA UNIVERSIDADE</h4>
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem.</span>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Resume timeline -->
                            </ul>
                        </div>
                        <!-- End Resume Wrapper -->
                    </div>
                </article>
                <!-- End Resume Section-->

                <!-- service Section -->
                <article class="hs-content service-section" id="section3">
                    <span class="sec-icon serv-icon fa fa-laptop"></span>
                    <div class="hs-inner">
                        <span class="before-title">.03</span>
                        <h2>SERVIÇOS</h2>
                        <span class="content-title">ATUAIS SERVIÇOS</span>
                        <div class="services-wrap">
                            <div class="serv-wrap animated slideInDown">
                                <span class="fa serv-icons fa-crop"></span>
                                <h3>Design Services</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem </p>
                                <div class="slide">
                                    <h4>Services</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i> Project Strategy</li>
                                        <li><i class="fa fa-check"></i> Content Management</li>
                                        <li><i class="fa fa-check"></i> Email Marketing</li>
                                        <li><i class="fa fa-check"></i> Mobile App Development</li>
                                        <li><i class="fa fa-check"></i> Usability Testing</li>
                                        <li><i class="fa fa-check"></i> Responsive Development</li>
                                        <li><i class="fa fa-check"></i> Scheduled Maintenance</li>
                                        <li><i class="fa fa-check"></i> eCommerce Solutions</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="serv-wrap animated slideInDown">
                                <span class="fa serv-icons fa-code"></span>
                                <h3>Dev. Services</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem</p>
                                <div class="slide">
                                    <h4>Serviços</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i> Project Strategy</li>
                                        <li><i class="fa fa-check"></i> Content Management</li>
                                        <li><i class="fa fa-check"></i> Email Marketing</li>
                                        <li><i class="fa fa-check"></i> Mobile App Development</li>
                                        <li><i class="fa fa-check"></i> Usability Testing</li>
                                        <li><i class="fa fa-check"></i> Responsive Development</li>
                                        <li><i class="fa fa-check"></i> Scheduled Maintenance</li>
                                        <li><i class="fa fa-check"></i> eCommerce Solutions</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="serv-wrap animated slideInDown">
                                <span class="fa serv-icons fa-area-chart"></span>
                                <h3>SEO Services</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem</p>
                                <div class="slide">
                                    <h4>Serviços</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i> Analytics </li>
                                        <li><i class="fa fa-check"></i> Active Search</li>
                                        <li><i class="fa fa-check"></i> Code Optimization</li>
                                        <li><i class="fa fa-check"></i> Link Building</li>
                                        <li><i class="fa fa-check"></i> Mobile Marketing</li>
                                        <li><i class="fa fa-check"></i> Landing Pages</li>
                                        <li><i class="fa fa-check"></i> Local SEO</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="serv-wrap animated slideInDown">
                                <span class="fa serv-icons fa fa-mobile"></span>
                                <h3>ASO Services</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem</p>
                                <div class="slide">
                                    <h4>Services</h4>
                                    <ul>
                                        <li><i class="fa fa-check"></i> Analytics </li>
                                        <li><i class="fa fa-check"></i> Active Search</li>
                                        <li><i class="fa fa-check"></i> Code Optimization</li>
                                        <li><i class="fa fa-check"></i> Link Building</li>
                                        <li><i class="fa fa-check"></i> Mobile Marketing</li>
                                        <li><i class="fa fa-check"></i> Landing Pages</li>
                                        <li><i class="fa fa-check"></i> Local SEO</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <span class="content-title">O QUE NOSSOS CLIENTES DIZEM</span>
                        <div class="testimonials-container">
                            <div class="testimonial">
                                <figure class="testimonial__mug">
                                    <img src="https://www.anonymousglobal.org/images/cells/AnonymousAndorra.jpg" height="100px" width="100px">
                                </figure>
                                <p>&ldquo;Sem perguntas, serviço feito.&rdquo;
                                    <br><strong>Alguém, Chamado Bob</strong>
                                </p>
                            </div>
                            <div class="testimonial">
                                <figure class="testimonial__mug">
                                    <img src="https://www.anonymousglobal.org/images/cells/AnonymousAndorra.jpg" height="100px" width="100px">
                                </figure>
                                <p>&ldquo;It was so easy and they gave me a fair price&rdquo;
                                    <br><strong>Alguém, da FBI</strong>
                                </p>
                            </div>
                            <div class="testimonial">
                                <figure class="testimonial__mug">
                                    <img src="https://www.anonymousglobal.org/images/cells/AnonymousAndorra.jpg" height="100px" width="100px">
                                </figure>
                                <p>&ldquo;Sem perguntas, serviço feito e organizado&rdquo;
                                    <br> <strong>Alguém, Fã de Sonic</strong>
                                </p>
                            </div>
                            <button class="prev-testimonial">Prev</button>
                            <button class="next-testimonial">Next</button>
                        </div>
                </article>
                <!-- End service Section -->


                <!-- Team/ process Section -->
                <article class="hs-content team-section" id="section4">
                    <span class="sec-icon fa fa-users"></span>
                    <div class="hs-inner">
                        <span class="before-title">.04</span>
                        <h2>PROCESSO &amp; TIME</h2>
                        <span class="content-title">NOSSO PROCESSO</span>
                        <div class="proceess_wrap">
                            <div id="ourprocess">
                                <ul id="progressbar">
                                    <li class="active">IDEIA</li>
                                    <li>IMPLEMENTAR</li>
                                    <li>REVISAR</li>
                                    <li>ENTREGAR</li>
                                </ul>
                                <div class="process-container">
                                    <div class="proceess">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam</p>

                                        <input type="button" name="next" class="next action-button" value="NEXT STEP" />
                                    </div>
                                    <div class="proceess">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam</p>

                                        <input type="button" name="previous" class="previous action-button" value="PREVIOUS STEP" />
                                        <input type="button" name="next" class="next action-button" value="NEXT STEP" />
                                    </div>
                                    <div class="proceess">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam</p>

                                        <input type="button" name="previous" class="previous action-button" value="PREVIOUS STEP" />
                                        <input type="button" name="next" class="next action-button" value="NEXT STEP" />
                                    </div>
                                    <div class="proceess">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam</p>

                                        <input type="button" name="previous" class="previous action-button" value="PREVIOUS STEP" />
                                    </div>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                        </div>
                        <span class="content-title">DIRETORES</span>
                        <div class="team_wrapper">
                            <div class="team-card-container">
                                <div class="card">
                                    <div class="front team1"><img src="https://dakrolak.files.wordpress.com/2015/06/jon-snow-4.jpg">
                                        <div class="front-detail">
                                            <h4>JOHN SNOW</h4>
                                            <h3>WEB DESIGNER</h3>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</p>
                                        <div class="social-icons">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-card-container">
                                <div class="card">
                                    <div class="front team1" ><img src="https://dakrolak.files.wordpress.com/2015/06/jon-snow-4.jpg">
                                        <div class="front-detail">
                                            <h4>JENNIFER DOE</h4>
                                            <h3>WEB DEVELOPER</h3>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</p>
                                        <div class="social-icons">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-card-container">
                                <div class="card">
                                    <div class="front team1"><img src="https://dakrolak.files.wordpress.com/2015/06/jon-snow-4.jpg">
                                        <div class="front-detail">
                                            <h4>JOHNATAN DOE</h4>
                                            <h3>WEB DESIGNER</h3>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</p>
                                        <div class="social-icons">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-card-container">
                                <div class="card">
                                    <div class="front team1"><img src="https://dakrolak.files.wordpress.com/2015/06/jon-snow-4.jpg">
                                        <div class="front-detail">
                                            <h4>CATHERINE DOE</h4>
                                            <h3>WEB DEVELOPER</h3>
                                        </div>
                                    </div>
                                    <!--end front panel-->
                                    <div class="back">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</p>
                                        <div class="social-icons">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa fa-dribbble"></i></a>
                                            <a href="#"><i class="fa fa fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Team/ process Section -->

                <!-- pricing Section -->
                <!--
                <article class="hs-content pricing-section" id="section5">
                    <span class="sec-icon fa fa-money"></span>
                    <div class="hs-inner">
                        <span class="before-title">.05</span>
                        <h2>PRICING</h2>
                        <span class="content-title">OUR PRICE</span>
                        <div class="pricing-table-wrapper">

                            <div class="pricing-table pricing-monthly">
                                <div class="pricing-table-header">
                                    <h1>Unlimited <strong>Monthly</strong></h1>
                                    <h3><strong>Only $34.00</strong> / month</h3>
                                </div>
                                <div class="pricing-table-content">
                                    <ul class="pricing-details">
                                        <li class="pricing-list">Get Unlimited Downloads!</li>
                                        <li class="pricing-list">No Download Caps</li>
                                        <li class="pricing-list">All 100% Royalty Free</li>
                                        <li class="pricing-list">No Contract / Cancel Anytime</li>
                                        <li class="pricing-list">Unbeatable Customer Support</li>
                                        <li class="pricing-list">20 - 30 New Uploads Monthly</li>
                                    </ul>
                                    <button class="signup" href="#">Choose This Plan</button>
                                </div>
                            </div>
                            <div class="pricing-table pricing-half-yearly">
                                <div class="pricing-table-header">
                                    <h1>Unlimited <strong>Half Yearly</strong></h1>
                                    <h3><strong>Only $79.00</strong> / 6 months</h3>
                                </div>
                                <div class="pricing-table-content">
                                    <ul class="pricing-details">
                                        <li class="pricing-list">Get Unlimited Downloads!</li>
                                        <li class="pricing-list">No Download Caps</li>
                                        <li class="pricing-list">All 100% Royalty Free</li>
                                        <li class="pricing-list">No Contract / Cancel Anytime</li>
                                        <li class="pricing-list">Unbeatable Customer Support</li>
                                        <li class="pricing-list">20 - 30 New Uploads Monthly</li>
                                    </ul>
                                    <button class="signup" href="#">Choose This PlaN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                -->

                <!-- End pricing Section -->

                <!-- Skills Section -->
                <!--
                <article class="hs-content skills-section" id="section6">
                    <span class="sec-icon fa fa-diamond"></span>
                    <div class="hs-inner">
                        <span class="before-title">.06</span>
                        <h2>SKILLS</h2>
                        <span class="content-title">PROGRAMMING SKIILLS</span>
                        <div class="skolls">
                            <span class="skill-description">Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</span>
                            <div class="bar-main-container">
                                <div class="wrap">
                                    <div class="bar-percentage" data-percentage="60"></div>
                                    <span class="skill-detail"><i class="fa fa-bar-chart"></i>LEVEL : INTERMEDIATE</span><span class="skill-detail"><i class="fa fa-binoculars"></i>EXPERIENCE : 3 YEARS</span>
                                    <div class="bar-container">
                                        <div class="bar"></div>
                                    </div>
                                    <span class="label">Php</span><span class="label">Asp</span><span class="label">Wordpress</span>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                        </div>
                        <span class="content-title">DESIGN SKILLS</span>
                        <div class="skolls">

                            <span class="skill-description">Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</span>
                            <div class="bar-main-container">
                                <div class="wrap">
                                    <div class="bar-percentage" data-percentage="80"></div>
                                    <span class="skill-detail"><i class="fa fa-bar-chart"></i>LEVEL : INTERMEDIATE</span><span class="skill-detail"><i class="fa fa-binoculars"></i>EXPERIENCE : 4 YEARS</span>
                                    <div class="bar-container">
                                        <div class="bar"></div>
                                    </div>
                                    <span class="label">Photoshop</span><span class="label">Illustrator</span>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                        </div>
                        <span class="content-title">OFFICE SKILLS</span>
                        <div class="skolls">
                            <span class="skill-description">Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</span>
                            <div class="bar-main-container">
                                <div class="wrap">
                                    <div class="bar-percentage" data-percentage="40"></div>
                                    <span class="skill-detail"><i class="fa fa-bar-chart"></i>LEVEL : ADVANCED</span><span class="skill-detail"><i class="fa fa-binoculars"></i>EXPERIENCE : 5 YEARS</span>
                                    <div class="bar-container">
                                        <div class="bar"></div>
                                    </div>
                                    <span class="label">Ms excel</span><span class="label">Ms word</span><span class="label">Ms powerpoint</span>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                        </div>
                        <span class="content-title">SOCIAL SKILLS</span>
                        <div class="skolls">
                            <span class="skill-description">Lorem ipsum dolor sit amet, consectetur adipiscingVivam sit amet ligula non lectus cursus egestas. Cras erat lorem, fringilla quis sagittis in, sagittis inNam leo tortor Nam leo tortor Vivam.</span>
                            <div class="bar-main-container">
                                <div class="wrap">
                                    <div class="bar-percentage" data-percentage="90"></div>
                                    <span class="skill-detail"><i class="fa fa-bar-chart"></i>LEVEL : EXPERT</span><span class="skill-detail"><i class="fa fa-binoculars"></i>EXPERIENCE : 6 YEARS</span>
                                    <div class="bar-container">
                                        <div class="bar"></div>
                                    </div>
                                    <span class="label">Event production</span><span class="label">Media relation</span>
                                    <div style="clear:both;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                -->
                <!-- End Skills Section -->

                <!-- Works Section -->
                <article class="hs-content works-section" id="section7">
                    <span class="sec-icon fa fa-archive"></span>
                    <div class="hs-inner">
                        <span class="before-title">.07</span>
                        <h2>TRABALHOS</h2>
                        <div class="portfolio">
                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/1-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">Logo Design</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work1" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work1">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>
                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->

                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/2-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">web design</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work2" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work2">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>
                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->

                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/3-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">Mobile app</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work3" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work3">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>

                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->

                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/4-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">web design</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work4" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work4">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>
                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->

                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/5-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">Mobile app</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work5" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work5">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>
                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->

                            <!-- Portfolio Item -->
                            <figure class="effect-milo">
                                <img src="images/portfolio/6-thumb.jpg" alt="img11" width="282" height="222" />
                                <figcaption>
                                    <span class="label">Logo Design</span>
                                    <div class="portfolio_button">
                                        <h3>Project Title</h3>
                                        <a href=".work6" class="open_popup" data-effect="mfp-zoom-out">
                                            <i class="hovicon effect-9 sub-b"><i class="fa fa-search"></i></i>
                                        </a>
                                    </div>
                                    <div class="mfp-hide mfp-with-anim work_desc work6">
                                        <div class="col-md-6">
                                            <div class="image_work">
                                                <img src="http://placehold.it/560x420" alt="img" width="560" height="420">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="project_content">
                                                <h2 class="project_title">Project title</h2>
                                                <p class="project_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a auctor sem. Suspendisse egestas nulla eget nunc commodo, et blandit ante tristique. Aliquam dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.
                                                    <br>
                                                    <br>dignissim nulla tellus, sed pellentesque libero pellentesque et. Donec nec sem mattis, suscipit ligula id, porttitor tortor. Maecenas sed egestas odio, vitae euismod nulla. Duis viverra blandit mi quis rhoncus. Aenean vitae turpis et tortor elementum blandit.</p>
                                            </div>
                                        </div>
                                        <a class="ext_link" href="#"><i class="fa fa-external-link"></i></a>
                                        <div style="clear:both"></div>
                                    </div>
                                </figcaption>
                            </figure>
                            <!-- End Portfolio Item -->
                        </div>
                        <!-- End Portfolio Wrapper -->
                    </div>
                </article>
                <!-- End Works Section -->

                <!-- Contact Section -->
                <article class="hs-content contact-section" id="section8">
                    <span class="sec-icon fa fa-paper-plane"></span>
                    <div class="hs-inner">
                        <span class="before-title">.08</span>
                        <h2>CONTATO</h2>
                        <div class="contact_info">
                            <h3>Entre em contato</h3>
                            <hr>
                            <h5>Esperamos pelos seus negócios</h5>
                            <h6>Apenas preencha o formulario a baixo para enviar o e-mail</h6>

                            <hr>
                        </div>
                        <!-- Contact Form -->
                        <fieldset id="contact_form">
                            <div id="result"></div>
                            <input type="text" name="name" id="name" placeholder="NOME" />
                            <input type="email" name="email" id="email" placeholder="EMAIL" />
                            <textarea name="message" id="message" placeholder="Mensagem"></textarea>
                            <span class="submit_btn" id="submit_btn">Enviar Mensagem</span>
                        </fieldset>
                        <!-- End Contact Form -->
                    </div>
                </article>
                <!-- End Contact Section -->
                </div>
                <!-- End hs-content-wrapper -->
            </div>
            <!-- End hs-content-scroller -->
        </div>
        <!-- End container -->
        <div id="my-panel">
        </div>

        <!-- PLUGIN SCRIPTS -->

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/default.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/watch.js"></script>
        <script type="text/javascript" src="js/layout.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <!-- END PLUGIN SCRIPTS -->
</body>

</html>
