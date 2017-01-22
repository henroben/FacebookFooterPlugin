<?php
	//	Create menu link
	function ffl_options_menu_link() {
		add_options_page(
			'Facebook Footer Link Options', // Section title
			'Facebook Footer Link', // Menu link title
			'manage_options', // Compatibility
			'ffl-options', // Menu slug
			'ffl_options_content' // function to display content
		);
	}

	//	Create Options Page Content
	function ffl_options_content() {
		// Init Options Global
		global $ffl_options;

		ob_start(); ?>
			<div class="wrap">
				<h2><?php _e('Facebook Footer Link Settings', 'ffl_domain'); ?></h2>
				<p>
					<?php _e('Settings for the Facebook Footer Link plugin', 'ffl_domain'); ?>
				</p>
				<form method="post" action="options.php">
					<?php settings_fields('ffl_settings_group'); ?>
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row">
									<label for="ffl_settings[enable]">
										<?php _e('Enable', 'ffl_domain'); ?>
									</label>
								</th>
								<td>
									<input name="ffl_settings[enable]" id="ffl_settings[enable]" type="checkbox" value="1" <?php checked('1', $ffl_options['enable']); ?>>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="ffl_settings[facebook_url]">
										<?php _e('Facebook Profile URL', 'ffl_domain'); ?>
									</label>
								</th>
								<td>
									<input name="ffl_settings[facebook_url]" id="ffl_settings[facebook_url]" type="text" value="<?php echo $ffl_options['facebook_url']; ?>" class="regular-text">
									<p class="description">
										<?php _e('Enter your Facebook profile URL', 'ffl_domain'); ?>
									</p>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="ffl_settings[link_colour]">
										<?php _e('Link Colour', 'ffl_domain'); ?>
									</label>
								</th>
								<td>
									<input name="ffl_settings[link_colour]" id="ffl_settings[link_colour]" type="text" value="<?php echo $ffl_options['link_colour']; ?>" class="regular-text">
									<p class="description">
										<?php _e('Enter a colour or HEX value e.g. #000000', 'ffl_domain'); ?>
									</p>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label for="ffl_settings[show_in_feed]">
										<?php _e('Show In Posts Feed', 'ffl_domain'); ?>
									</label>
								</th>
								<td>
									<input name="ffl_settings[show_in_feed]" id="ffl_settings[show_in_feed]" type="checkbox" value="1" <?php checked('1', $ffl_options['show_in_feed']); ?>>
								</td>
							</tr>
						</tbody>
					</table>
					<p class="submit">
						<input type="submit" name="submit" id="submit" class="buton button-primary" value="<?php _e('Save Changes', 'ffl_domain');?>">
					</p>
				</form>
			</div>
		<?php
		echo ob_get_clean();
	}

	add_action('admin_menu', 'ffl_options_menu_link');

	// Register Settings
	function ffl_register_settings() {
		register_setting('ffl_settings_group', 'ffl_settings');
	}

	add_action('admin_init', 'ffl_register_settings');