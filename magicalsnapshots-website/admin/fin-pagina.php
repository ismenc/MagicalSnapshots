                        <br/><br/>
						
					</div>				
				</div>
			</section>
			
            <!-------------------- NAVEGACIÓN INFERIOR -------------------->
            
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navegación</h4>
						<ul class="nav">
							<?php 
							echo '<li><a href="'.$rutaCss.'/index.php">Página principal</a></li>  
							<li><a href="#">Sobre nosotros</a></li>
							<li><a href="#">Contacta</a></li>
							<li><a href="'.$rutaCss.'/ver-carrito.php">Carrito</a></li>
							<li><a href="'.$rutaCss.'/register.php">Login</a></li>	
						</ul>					
					</div>
					<div class="span4">
						<h4>Mi cuenta</h4>
						<ul class="nav">
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="'.$rutaCss.'/historial.php">Historial de pedidos</a></li>
							<li><a href="'.$rutaCss.'/ver-carrito.php">Lista de deseos</a></li>
							<li><a href="#">Newsletter</a></li> '; ?>
						</ul>
					</div>
					<div class="span5">
						<?php echo '<p class="logo"><img src="'.$rutaCss.'/themes/images/logo.png" class="site_logo" alt=""></p>'; ?>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2017 MagicalSnapshots. All right reserved.</span>
			</section>
		</div>
		<?php echo '<script src="'.$rutaCss.'/themes/js/common.js"></script>
		<script src="'.$rutaCss.'/themes/js/jquery.flexslider-min.js"></script>'; ?>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>