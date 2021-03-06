@extends('layouts.main')
@section('content')
<! ========== HEADERWRAP ==================================================================================================== 
	=============================================================================================================================>
    <div id="headerwrap">
    	<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<h1 class="animation slideDown">
                        Faça a escolha segura e viage
                        com a gente.
                    </h1>
				</div>
				
			</div><!-- /row -->
    	</div><!-- /container -->
    </div> <!-- /headerwrap -->

	<! ========== BLOG POSTS ==================================================================================================== 
	=============================================================================================================================>    
	<div class="container">	
        <div class="row">
        <div class="col-md-12">
            <h3>Vamos viajar hoje?</h3>
            <hr>
        <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th class="text-center">Saída</th>
                <th class="text-center">Origem</th>
                <th class="text-center">Destino</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Valor</th>
                <th class="text-center"></th>
            </tr>
            @foreach($viagens as $viagem)
            <tr>
                <td class="text-center">{{$viagem->data}}</td>
                <td>{{$viagem->origem->nome}}</td>
                <td>{{$viagem->destino->nome}}</td>
                <td>{{$viagem->veiculo->tipo->nome}}</td>
                <td class="text-center">{{$viagem->valor}}</td>
                <td class="text-center">
                    <a href="/viagem/{{$viagem->id}}" class="btn btn-primary btn-xs">Vamos</a></td>
            </tr>
            @endforeach
        </table>
        <h4>
            <a href="/viagens" class="pull-right">Mais viagens...</a>
        </h4>
        </div>
        </div>
        <hr>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a href="#"><img width="350" src="/img/portfolio/port04.jpg" alt="" />
				</a>
				<p>Realizamos muitas viagens todos os dias</p>
				<p class="lead">
					Conheça a empresa que mais cresce no ramo de transporte de passageiros, aqui temos o melhor serviço para oferecer	.</p>
				<hr>
				<p class="time"><i class="fa fa-comment-o"></i> 3 | <i class="fa fa-calendar"></i> 14 Nov.</p>
			</div><!-- col-lg-4 -->
			
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a href="#"><img width="350" src="/img/portfolio/port05.jpg" alt="" />
								</a>
				<p>Conheça a nossa frota</p>
				<p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<hr>
				<p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.</p>
			</div><!-- col-lg-4 -->
			
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port06.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Post 3</h4>
					  	<p class="b-from-right b-animate b-delay03">Read More.</p>
					</div>
				</a>
				<p>This Is Awesome</p>
				<p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<hr>
				<p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.</p>
			</div><!-- col-lg-4 -->
			
		</div><!-- /row -->
	</div><!-- /container -->
	
	<! ========== CALL TO ACTION 1 ============================================================================================== 
	=============================================================================================================================>    
    <div id="cta01">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-8 col-lg-offset-2">
    				<h2>Conheça nossa empresa, aqui você chega lá.
                        <br/>Mil quilômetros de vantegens passa por aqui.
                    </h2>
    			</div>
    		</div><!-- /row -->
    	</div><!-- /container -->
    </div><! --/cta01 -->

	<! ========== PORTFOLIO SECTION ============================================================================================= 
	=============================================================================================================================>    
	<div class="container">
		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h3>Our Latest Work</h3>
				<hr>
			</div>
		</div><!-- /row -->
		<div class="row mt centered">	
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port01.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 1</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>APE - <i class="fa fa-heart-o"></i></p>
			</div>
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port02.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 2</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>RAIDERS - <i class="fa fa-heart-o"></i></p>
			</div>
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port03.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 3</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>VIKINGS - <i class="fa fa-heart-o"></i></p>
			</div>
		</div><!-- /row -->
		<div class="row mt centered">	
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port03.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 4</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>APE - <i class="fa fa-heart-o"></i></p>
			</div>
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port01.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 5</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>RAIDERS - <i class="fa fa-heart-o"></i></p>
			</div>
			<div class="col-lg-4 desc">
				<a class="b-link-fade b-animate-go" href="#"><img width="350" src="/img/portfolio/port02.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Project 6</h4>
					  	<p class="b-from-right b-animate b-delay03">View Details</p>
					</div>
				</a>
				<p>VIKINGS - <i class="fa fa-heart-o"></i></p>
			</div>
		</div><!-- /row -->

		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
    			<button type="button" class="btn btn-theme btn-lg">VIEW OUR PORTFOLIO</button>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->

	<! ========== BRANDS & CLIENTS =============================================================================================== 
	=============================================================================================================================>    
	<div id="grey">
		<div class="container">
			<div class="row mt centered ">
				<div class="col-lg-4 col-lg-offset-4">
					<h3>Brands & Clients</h3>
					<hr>
				</div><!-- /col-lg-4 -->
			</div><!-- /row -->
			
			<div class="row centered">
				<div class="col-lg-3 pt">
					<img class="img-responsive" src="/img/clients/client01.png" alt="">
				</div>
				<div class="col-lg-3 pt">
					<img class="img-responsive" src="/img/clients/client02.png" alt="">
				</div>
				<div class="col-lg-3 pt">
					<img class="img-responsive" src="/img/clients/client03.png" alt="">
				</div>
				<div class="col-lg-3 pt">
					<img class="img-responsive" src="/img/clients/client04.png" alt="">
				</div>

			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /grey -->

	
	<! ========== BLACK SECTION ================================================================================================= 
	=============================================================================================================================>    
	<div id="black">
		<div class="container">
			<div class="row mt centered">
				<div class="col-lg-4 col-lg-offset-4">
					<h3>Our Work Process</h3>
					<hr>
				</div><!-- /col-lg-4 -->
			</div><!-- /row -->
			
			<div class="row mt">
				<div class="col-lg-8 col-lg-offset-2">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div><! --/col-lg-8 -->
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /black -->


	<! ========== FEATURED ICONS ================================================================================================ 
	=============================================================================================================================>    
    <div id="white">
	    <div class="container">
	    	<div class="row mt">
	    		<div class="col-lg-4 col-lg-offset-4 centered">
	    			<h3>Different Stages</h3>
	    			<hr>
	    		</div>
	    	</div>
	    	<div class="row mt">
	    		<div class="col-lg-3">
	    			<p class="capitalize">1</p>
	    			<h4>Brief</h4>
	    			<p>Built for all levels of expertise, whether you need simple pages or complex ones, creating something incredible with Marco is an effortless and intuitive process.</p>
	    		</div>
	    		<div class="col-lg-3">
	    			<p class="capitalize">2</p>
	    			<h4>Analysis</h4>
	    			<p>We’ve taken great care to ensure that Marco is fully retina-ready. So it’ll look good on any retina display. We use retina.js to ensure the best view.</p>
	    		</div>
	    		<div class="col-lg-3">
	    			<p class="capitalize">3</p>
	    			<h4>Planning</h4>
	    			<p>Marco fits any device handsomely. We tested our theme in major devices and browsers. Check it out and test it before buy it on responsinator.com.</p>
	    		</div>    	
	
	    		<div class="col-lg-3">
	    			<p class="capitalize">4</p>
	    			<h4>Execution</h4>
	    			<p>Good looking animations are an essential part of the new theme design trend. We add animations.css, a cool script to help you enhance your site with style.</p>
	    		</div>
	    	</div><!-- /row -->
	    </div><!-- /container -->
    </div><!-- /white -->

	<! ========== CALL TO ACTION 2 ============================================================================================== 
	=============================================================================================================================>    
    <div id="cta02">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 col-lg-offset-2">
    				<h2>Our products & services are crafted with the utmost care to fulfill your needs.</h2>
    				<button type="button" class="btn btn-cta btn-lg">LEARN MORE</button>
    			</div>
    		</div><!-- /row -->
    	</div><!-- /container -->
    </div><! --/cta02 -->

	<! ========== FEATURED ICONS ================================================================================================ 
	=============================================================================================================================>    
    <div class="container">
    	<div class="row mt">
    		<div class="col-lg-4 centered si">
    			<i class="fa fa-flask"></i>
    			<h4>Built with Bootstrap 3</h4>
    			<p>Built for all levels of expertise, whether you need simple pages or complex ones, creating something incredible with Marco is an effortless and intuitive process.</p>
    		</div>
    		<div class="col-lg-4 centered si">
    			<i class="fa fa-eye"></i>
    			<h4>Retina Display Theme</h4>
    			<p>We’ve taken great care to ensure that Marco is fully retina-ready. So it’ll look good on any retina display. We use retina.js to ensure the best view.</p>
    		</div>
    		<div class="col-lg-4 centered si">
    			<i class="fa fa-mobile"></i>
    			<h4>Responsive Design Always</h4>
    			<p>Marco fits any device handsomely. We tested our theme in major devices and browsers. Check it out and test it before buy it on responsinator.com.</p>
    		</div>    	

    		<div class="col-lg-4 centered si">
    			<i class="fa fa-cog"></i>
    			<h4>Really Nice Animations</h4>
    			<p>Good looking animations are an essential part of the new theme design trend. We add animations.css, a cool script to help you enhance your site with style.</p>
    		</div>
    		<div class="col-lg-4 centered si">
    			<i class="fa fa-flag"></i>
    			<h4>Font Awesome Included</h4>
    			<p>Font Awesome is the most used icon font on Bootstrap. Gives you scalable vector icons that can instantly be customized with the power of CSS.</p>
    		</div>
    		<div class="col-lg-4 centered si">
    			<i class="fa fa-heart"></i>
    			<h4>Carefully Crafted</h4>
    			<p>We aim to design both, functional & beautiful themes. Details are an important part of our main concept. We work hard to keep our code and front-end flawless.</p>
    		</div>    	
    	</div><!-- /row -->
    </div><!-- /container -->
    
	<! ========== OUR TEAM ====================================================================================================== 
	=============================================================================================================================>    
	
	<div id="white">
		<div class="container">
	    	<div class="row mt">
	    		<div class="col-lg-4 col-lg-offset-4 centered">
	    			<h3>Our Team</h3>
	    			<hr>
	    		</div>
	    	</div><! --/row -->
			
			<div class="row">
				<div class="col-lg-4 centered">
					<div class="members">
					  <img src="/img/team/gianni.png" alt="">
					  <div class="team-info">
					    <div class="subhead">Developer</div>
					    <h2 class="team-name">Gianni</h2>
					    <p class="team-description"><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-dribbble"></i></p>
					  </div>
					</div>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4 centered">
					<div class="members">
					  <img src="/img/team/rebecca.png" alt="">
					  <div class="team-info">
					    <div class="subhead">Designer</div>
					    <h2 class="team-name">Rebecca</h2>
					    <p class="team-description"><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-dribbble"></i></p>
					  </div>
					</div>
				</div><!-- /col-lg-4 -->
				
				<div class="col-lg-4 centered">
					<div class="members">
					  <img src="/img/team/william.png" alt="">
					  <div class="team-info">
					    <div class="subhead">Designer</div>
					    <h2 class="team-name">William</h2>
					    <p class="team-description"><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i><i class="fa fa-dribbble"></i></p>
					  </div>
					</div>
				</div><!-- /col-lg-4 -->

			</div><! --/row -->	
		</div><! --/container -->
	</div><! --/white -->
	
	<! ========== BLACK SECTION ================================================================================================= 
	=============================================================================================================================>    
	<div id="black">
		<div class="container pt">
			<div class="row mt centered">
				<div class="col-lg-3">
					<p><i class="fa fa-instagram"></i></p>
					<h1>21.337</h1>
					<hr>
					<h4>Pictures Taken</h4>
				</div>

				<div class="col-lg-3">
					<p><i class="fa fa-music"></i></p>
					<h1>9.764</h1>
					<hr>
					<h4>Songs Listened</h4>
				</div>

				<div class="col-lg-3">
					<p><i class="fa fa-trophy"></i></p>
					<h1>107</h1>
					<hr>
					<h4>Awards Earned</h4>
				</div>

				<div class="col-lg-3">
					<p><i class="fa fa-ticket"></i></p>
					<h1>209</h1>
					<hr>
					<h4>Movies Watched</h4>
				</div>

			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /black -->

	<! ========== TESTIMONIAL CAROUSEL ========================================================================================== 
	=============================================================================================================================>    

	<div class="container">
    	<div class="row mt">
    		<div class="col-lg-4 col-lg-offset-4 centered">
    			<h3>Honest Testimonials</h3>
    			<hr>
    		</div>
    	</div><! --/row -->
	
		<div class="row mt">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">				
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
						  <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</h2>
						  <h5>Paul Morrison - BlackTie.co</h5>
						</div>
						
						<div class="item">
						  <h2>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h2>
						  <h5>Mike Wellington - BlackTie.co</h5>
						</div>
					</div><!-- /carousel-inner -->
				
				</div><! --/carousel-example -->		
			</div><!-- /col-lg-8 -->
		</div><! --/row -->
	</div><!-- /container -->


	<! ========== CONTACT SECTION =============================================================================================== 
	=============================================================================================================================>    

	<div id="white">
		<div class="container">
	    	<div class="row mt">
	    		<div class="col-lg-4 col-lg-offset-4 centered">
	    			<h3>Contact Us</h3>
	    			<hr>
	    		</div>
	    	</div><! --/row -->
		</div><!-- /container -->
	<div id="map"></div>	
	</div><!-- /white -->



	
	<! ========== CALL TO ACTION BAR =============================================================================================== 
	=============================================================================================================================>    
	<div id="cta-bar">
		<div class="container">
			<div class="row centered">
				<a href="#"><h4>Are You Ready For The Next Step?</h4></a>
			</div>
		</div><!-- /container -->
	</div><!-- /cta-bar -->
	
	<! ========== FOOTER ======================================================================================================== 
	=============================================================================================================================>    
	
	<div id="f">
		<div class="container">
			<div class="row">
				<!-- ADDRESS -->
				<div class="col-lg-3">
					<h4>Our Studio</h4>
					<p>
						Some Ave. 987,<br/>
						Postal 64733<br/>
						London, UK.<br/>
					</p>
					<p>
						<i class="fa fa-mobile"></i> +55 4893.8943<br/>
						<i class="fa fa-envelope-o"></i> hello@yourdomain.com
					</p>
				</div><! --/col-lg-3 -->
				
				<!-- TWEETS -->
				<div class="col-lg-3">
					<h4>Recent Tweets</h4>
					<div id="showtweets"></div>
						<script>
							twitterFetcher.fetch('258157205101088768', 'showtweets', 2, true, false, false, '', false, handleTweets, false);
							
							function handleTweets(tweets){
							    var x = tweets.length;
							    var n = 0;
							    var element = document.getElementById('showtweets');
							    var html = '<ul>';
							    while(n < x) {
							      html += '<li>' + tweets[n] + '</li>';
							      n++;
							    }
							    html += '</ul>';
							    element.innerHTML = html;
							}					
						</script>
					<p>Follow us <b>@Alvrz_is</b></p>
				</div><!-- /col-lg-3 -->
				
				<!-- LATEST POSTS -->
				<div class="col-lg-3">
					<h4>Latest Posts</h4>
					<p>
						<i class="fa fa-angle-right"></i> A post with an image<br/>
						<i class="fa fa-angle-right"></i> Other post with a video<br/>
						<i class="fa fa-angle-right"></i> A full width post<br/>
						<i class="fa fa-angle-right"></i> We talk about something nice<br/>
						<i class="fa fa-angle-right"></i> Yet another single post<br/>
					</p>
				</div><!-- /col-lg-3 -->
				
				<!-- NEW PROJECT -->
				<div class="col-lg-3">
					<h4>New Project</h4>
					<a href="#"><img class="img-responsive" src="/img/portfolio/port03.jpg" alt="" /></a>
				</div><!-- /col-lg-3 -->
				
				
			</div><! --/row -->
		</div><!-- /container -->
	</div><!-- /f -->
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/retina.js"></script>


  	<script>
		$(window).scroll(function() {
			$('.si').each(function(){
			var imagePos = $(this).offset().top;
	
			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});
		});
	</script>    

@stop