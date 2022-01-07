<?php
//about theme info
add_action( 'admin_menu', 'vw_newspaper_gettingstarted' );
function vw_newspaper_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Newspaper', 'vw-newspaper'), esc_html__('About VW Newspaper', 'vw-newspaper'), 'edit_theme_options', 'vw_newspaper_guide', 'vw_newspaper_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_newspaper_admin_theme_style() {
   wp_enqueue_style('vw-newspaper-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-newspaper-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_newspaper_admin_theme_style');

//guidline for about theme
function vw_newspaper_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-newspaper' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Newspaper Theme', 'vw-newspaper' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-newspaper'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Newspaper at 20% Discount','vw-newspaper'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-newspaper'); ?> ( <span><?php esc_html_e('vwpro20','vw-newspaper'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_NEWSPAPER_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-newspaper' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_newspaper_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-newspaper' ); ?></button>
			<button class="tablinks" onclick="vw_newspaper_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-newspaper' ); ?></button>
		  	<button class="tablinks" onclick="vw_newspaper_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-newspaper' ); ?></button>
		  	<button class="tablinks" onclick="vw_newspaper_open_tab(event, 'newspaper_pro')"><?php esc_html_e( 'Get Premium', 'vw-newspaper' ); ?></button>
		  	<button class="tablinks" onclick="vw_newspaper_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-newspaper' ); ?></button>
		</div>

		<?php
			$vw_newspaper_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_newspaper_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Newspaper_Plugin_Activation_Settings::get_instance();
				$vw_newspaper_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-newspaper-recommended-plugins">
				    <div class="vw-newspaper-action-list">
				        <?php if ($vw_newspaper_actions): foreach ($vw_newspaper_actions as $key => $vw_newspaper_actionValue): ?>
				                <div class="vw-newspaper-action" id="<?php echo esc_attr($vw_newspaper_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_newspaper_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_newspaper_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_newspaper_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-newspaper'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_newspaper_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-newspaper' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Newspaper is a creative and smooth WordPress theme ideal for content-filled sites. It is a theme for newspapers, magazines, editorials, print media, news sites, publishing or review site, blogs, informative sites, news portals and for many other purposes. It can be turned into a personal portfolio or a regular blog for purposes like lifestyle, tech, food, travel, fitness etc. It is a fully responsive theme with cross-browser compatibility looking beautiful on all devices and browsers. This multipurpose theme has all the essential things to make it load faster. This newspaper and magazine theme is made SEO-friendly for better site ranking. Its user-friendly interface and smooth navigation will make finding content an easy task. The theme design is made more attractive and beautiful using banners and sliders where you can post your breaking news, trending news, latest news and other articles and images. It has a gallery which is flexible enough to be used for showing images of latest news with captions, your editorial staff, events happening around etc. VW Newspaper can be customized for making your site personalized with live customizer available to see changes. This theme is translation ready. With social media icons integrated, your site content can be shared on various networking sites.','vw-newspaper'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-newspaper' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-newspaper' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_NEWSPAPER_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-newspaper' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-newspaper'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-newspaper'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-newspaper'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-newspaper'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-newspaper'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_NEWSPAPER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-newspaper'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-newspaper'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-newspaper'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_NEWSPAPER_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-newspaper'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-newspaper' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-newspaper'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_headline_section') ); ?>" target="_blank"><?php esc_html_e('Todays Headlines','vw-newspaper'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_category_section') ); ?>" target="_blank"><?php esc_html_e('Category Section','vw-newspaper'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-newspaper'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-newspaper'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_newspaper_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-newspaper'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-newspaper'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-newspaper'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-newspaper'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-newspaper'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-newspaper'); ?></span><?php esc_html_e(' Go to ','vw-newspaper'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-newspaper'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-newspaper'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-newspaper'); ?></span><?php esc_html_e(' Go to ','vw-newspaper'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-newspaper'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-newspaper'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-newspaper'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-newspaper/" target="_blank"><?php esc_html_e('Documentation','vw-newspaper'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>	

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Newspaper_Plugin_Activation_Settings::get_instance();
			$vw_newspaper_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-newspaper-recommended-plugins">
				    <div class="vw-newspaper-action-list">
				        <?php if ($vw_newspaper_actions): foreach ($vw_newspaper_actions as $key => $vw_newspaper_actionValue): ?>
				                <div class="vw-newspaper-action" id="<?php echo esc_attr($vw_newspaper_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_newspaper_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_newspaper_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_newspaper_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-newspaper'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_newspaper_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-newspaper' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-newspaper'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-newspaper'); ?></span></b></p>
	              	<div class="vw-newspaper-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-newspaper'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-newspaper' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-newspaper'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-newspaper'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-newspaper'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-newspaper'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-newspaper'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-newspaper'); ?></a>
								</div> 
							</div>
						</div>
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Newspaper_Plugin_Activation_Settings::get_instance();
			$vw_newspaper_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-newspaper-recommended-plugins">
				    <div class="vw-newspaper-action-list">
				        <?php if ($vw_newspaper_actions): foreach ($vw_newspaper_actions as $key => $vw_newspaper_actionValue): ?>
				                <div class="vw-newspaper-action" id="<?php echo esc_attr($vw_newspaper_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_newspaper_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_newspaper_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_newspaper_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-newspaper' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-newspaper-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-newspaper'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-newspaper' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-newspaper'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-newspaper'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-newspaper'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-newspaper'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-newspaper'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_newspaper_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-newspaper'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-newspaper'); ?></a>
								</div> 
							</div>
						</div>
				</div>
			<?php } ?>
		</div>

		<div id="newspaper_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-newspaper' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This premium newspaper WordPress theme is eye-catching and deeply functional specially built for content-rich sites. It is useful for news sites, editorials, magazines, online newspapers, publishing and review sites, informative sites and other news related sites. Its flexibility helps in serving itself perfectly for personal blogs and professional portfolios. Its smooth navigation and user-friendly interface will give good experience to your visitors making them explore more on your site. It has vast space for accommodating your content with images into a clean and creative way. This premium newspaper theme is written in bug-free and secure codes complying with the standards of WordPress. It is an easy to setup theme which gets your site up and running within minutes of its installation. With this theme, scale up the standards of your site to entertain maximum visitors delivering what they need.','vw-newspaper'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_NEWSPAPER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-newspaper'); ?></a>
					<a href="<?php echo esc_url( VW_NEWSPAPER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-newspaper'); ?></a>
					<a href="<?php echo esc_url( VW_NEWSPAPER_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-newspaper'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-newspaper' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-newspaper'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-newspaper'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-newspaper'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-newspaper'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-newspaper'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-newspaper'); ?></td>
								<td class="table-img"><?php esc_html_e('8', 'vw-newspaper'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-newspaper'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-newspaper'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-newspaper'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-newspaper'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-newspaper'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-newspaper'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-newspaper'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_NEWSPAPER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-newspaper'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-newspaper'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-newspaper'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_NEWSPAPER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-newspaper'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-newspaper'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-newspaper'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_NEWSPAPER_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-newspaper'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-newspaper'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-newspaper'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_NEWSPAPER_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-newspaper'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-newspaper'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-newspaper'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_NEWSPAPER_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-newspaper'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-newspaper'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-newspaper'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_NEWSPAPER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-newspaper'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>