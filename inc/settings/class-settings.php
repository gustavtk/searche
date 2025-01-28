<?php
namespace Carbonate\Inc;

/**
 * Carbonate Settings
 *
 * Description: Adds admin setting page to configure theme in admin UI.
 */

class Settings {
	/**
	 * The unique instance of this plugin.
	 *
	 * @var Carbonate\Inc\Settings
	 */
	private static $instance;

	private $settings_api;

	const SETTINGS_NAME = 'carbonate-settings';

	/**
	 * Gets instance of plugin.
	 *
	 * @return Carbonate\Inc\Settings
	 */
	public static function get_instance() {
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Class constructor
	 */
	private function __construct() {
		$this->settings_api = new \WeDevs_Settings_API;
	}

	/**
	 * Registers settings plugin in WordPress
	 *
	 * @return void
	 */
	public static function register() {
		$plugin = new self();

		add_action( 'admin_init', [ $plugin, 'register_settings' ]);
		add_action( 'admin_menu', [ $plugin, 'register_page' ] );
	}

	/**
	 * Registers the admin page
	 *
	 * @return void
	 */
	public function register_page() {
		$icon_base64 = 'PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzODUuMzYxIiBoZWlnaHQ9IjQzMy4xNzgiIHZpZXdCb3g9IjAgMCAzODUuMzYxIDQzMy4xNzgiPjxnIHRyYW5zZm9ybT0ibWF0cml4KDAuNjE2LCAtMC43ODgsIDAuNzg4LCAwLjYxNiwgLTEyOC40MTIsIDIzMi43MDEpIj48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDApIj48cGF0aCBkPSJNODQuMzYxLDU3LjY4OGM3Ljc4MS0yMi44NDktNC4yODMtNDcuNy0yNi44OTItNTUuNFMxMC4xMzcsNi45MjQsMi4zNjEsMjkuNzg4czQuMjg4LDQ3LjcsMjYuODkyLDU1LjRTNzYuNiw4MC41NDIsODQuMzYxLDU3LjY4OFpNMzMuMDQ3LDc0LjAzOWEzMi4wMTksMzIuMDE5LDAsMSwxLDQwLjMtMjAuMUEzMS44ODIsMzEuODgyLDAsMCwxLDMzLjA0Nyw3NC4wMzlaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyMDguNTc2IDApIiBmaWxsPSIjMzkzZTQyIi8+PHJlY3Qgd2lkdGg9IjY0Ljk1MSIgaGVpZ2h0PSIxMC43NCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTkzLjAyMyAxNDkuOTI5KSByb3RhdGUoLTcxLjIpIiBmaWxsPSIjMzkzZTQyIi8+PHJlY3Qgd2lkdGg9IjIxLjY1NyIgaGVpZ2h0PSIxMC43MzkiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDIyMy43ODEgMTYwLjM3Mikgcm90YXRlKC03MS4yKSIgZmlsbD0iIzM5M2U0MiIvPjxyZWN0IHdpZHRoPSIyMS42NDIiIGhlaWdodD0iMTAuNzM5IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyMzcuNjg3IDExOS4zNCkgcm90YXRlKC03MS4yKSIgZmlsbD0iIzM5M2U0MiIvPjxwYXRoIGQ9Ik04NC4zMTgsNTcuMjg1QTQzLjMwOSw0My4zMDksMCwxLDAsMjkuMzYyLDg0LjMxOSw0My4zMDksNDMuMzA5LDAsMCwwLDg0LjMxOCw1Ny4yODVaTTMzLjExLDczLjMxQTMxLjY3NCwzMS42NzQsMCwxLDEsNzMuMyw1My41MzIsMzEuNjczLDMxLjY3MywwLDAsMSwzMy4xMSw3My4zMVoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE1NC4yNiAxNjAuNjE1KSIgZmlsbD0iIzM5M2U0MiIvPjxyZWN0IHdpZHRoPSI2NC45NTEiIGhlaWdodD0iMTAuNzM5IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjg5NywgLTAuNDQyLCAwLjQ0MiwgMC44OTcsIDk2Ljc2MywgMjY5LjM2MikiIGZpbGw9IiMzOTNlNDIiLz48cmVjdCB3aWR0aD0iMjEuNjU3IiBoZWlnaHQ9IjEwLjczOSIgdHJhbnNmb3JtPSJtYXRyaXgoMC44OTcsIC0wLjQ0MiwgMC40NDIsIDAuODk3LCAxMjEuMjQ3LCAyMjEuMTA4KSIgZmlsbD0iIzM5M2U0MiIvPjxyZWN0IHdpZHRoPSIyMS42NDIiIGhlaWdodD0iMTAuNzM5IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjg5NywgLTAuNDQyLCAwLjQ0MiwgMC44OTcsIDgyLjQxMiwgMjQwLjI4NSkiIGZpbGw9IiMzOTNlNDIiLz48cmVjdCB3aWR0aD0iMTAuNzM5IiBoZWlnaHQ9IjY0Ljk1MSIgdHJhbnNmb3JtPSJtYXRyaXgoMC44OTcsIC0wLjQ0MiwgMC40NDIsIDAuODk3LCAyMjkuMDM5LCAyNTAuMTY2KSIgZmlsbD0iIzM5M2U0MiIvPjxyZWN0IHdpZHRoPSIxMC43MzkiIGhlaWdodD0iMjEuNjU3IiB0cmFuc2Zvcm09Im1hdHJpeCgwLjg5NywgLTAuNDQyLCAwLjQ0MiwgMC44OTcsIDE5OS44OTcsIDI2NC41MzMpIiBmaWxsPSIjMzkzZTQyIi8+PHJlY3Qgd2lkdGg9IjEwLjczOSIgaGVpZ2h0PSIyMS42NDIiIHRyYW5zZm9ybT0ibWF0cml4KDAuODk3LCAtMC40NDIsIDAuNDQyLCAwLjg5NywgMjE5LjA4NiwgMzAzLjM4MSkiIGZpbGw9IiMzOTNlNDIiLz48cGF0aCBkPSJNODQuMzI5LDU3LjI4NkE0My4zMTQsNDMuMzE0LDAsMSwwLDI5LjM2OSw4NC4zMyw0My4zMTUsNDMuMzE1LDAsMCwwLDg0LjMyOSw1Ny4yODZaTTMzLjExMiw3My4zMTZBMzEuNjc0LDMxLjY3NCwwLDEsMSw3My4zNCw1My41MzgsMzEuNjc0LDMxLjY3NCwwLDAsMSwzMy4xMTIsNzMuMzE2WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAyMzguOTg4KSIgZmlsbD0iIzM5M2U0MiIvPjxwYXRoIGQ9Ik04NC4zMTksNTcuMjhBNDMuMzA5LDQzLjMwOSwwLDEsMCwyOS4zNjQsODQuMzIsNDMuMzEsNDMuMzEsMCwwLDAsODQuMzE5LDU3LjI4Wk0zMy4xMTIsNzMuMzA1QTMxLjY3NCwzMS42NzQsMCwxLDEsNzMuMyw1My41MjcsMzEuNjczLDMxLjY3MywwLDAsMSwzMy4xMTIsNzMuMzA1WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjI5LjQwNCAzMTguNDM3KSIgZmlsbD0iIzM5M2U0MiIvPjwvZz48L2c+PC9zdmc+';
		$icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;
		add_menu_page(
			'Carbonate',
			'Carbonate',
			'manage_options',
			'carbonate_settings',
			[$this, 'page_template'],
			//'dashicons-admin-appearance'
			$icon_data_uri
		);
	}

	/**
	 * Used to create the settings using the \WeDevs_Settings_API.
	 *
	 * @return void
	 */
	public function register_settings() {
		//set the settings
		$this->settings_api->set_sections( $this->get_settings_sections() );
		$this->settings_api->set_fields( $this->get_settings_fields() );

		//initialize settings
		$this->settings_api->admin_init();
	}

	/**
	 * Outputs the html template for the settings page.
	 *
	 * @return void
	 */
	public function page_template() {
		echo '<div class="wrap">';
		echo '<h1><strong>Carbonate Settings</strong></h1>';
		echo '<p>Customize this theme with your logo, brand colors, and fonts.</p>';
		$this->settings_api->show_navigation();
		$this->settings_api->show_forms();
		echo '</div>';
	}

	/**
	 * Defines the settings sections.
	 *
	 * @return array Array of pages defining each of the settings configurations.
	 */
	function get_settings_sections() {
		return [
			[
				'id'    => Settings::SETTINGS_NAME,
				'title' => __( 'Carbonate Theme Configuration', 'carbonate' ),
			],
		];
	}

	/**
	 * Defines the settings fields.
	 *
	 * @return array Array of fields grouped by settings key
	 */
	function get_settings_fields() {
		return [
			Settings::SETTINGS_NAME => [
				/**
				 * LOGO
				 */
				[
					'name'             => 'theme-intro-subsection',
					'label'            => __( 'Navigation', 'carbonate' ),
					'desc'             => __( 'Upload your logo as a PNG (with transparent background or SVG (plugin needed). Ideal size 200px wide.', 'carbonate' ),
					'type'             => 'subsection',
				],
				[
					'name'              => 'theme-logo',
					'label'             => __( 'Theme Logo', 'carbonate' ),
					'placeholder'       => __( 'Theme Logo placeholder', 'carbonate' ),
					'desc'				=> __('Upload your logo as a PNG (with transparent background or SVG (plugin needed). Ideal size 200px wide.', 'carbonate'),
					'type'              => 'file',
					'default'           => '',
					'options'           => [
						'button_label' => __( 'Choose image', 'carbonate' ),
					]
				],
				[
						'name'              => 'action-button-label',
						'label'             => __( 'Action Button Label', 'carbonate' ),
						'desc'              => __( 'Text inside navigation action button.', 'carbonate' ),
						'placeholder'       => __( 'Buy Now', 'carbonate' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field'
					],
					[
						'name'              => 'action-button-url',
						'label'             => __( 'Action Button URL', 'carbonate' ),
						'desc'              => __( 'URL for menu item. Can be relative (/home) or absolute (https://mysite.com/home)', 'carbonate' ),
						'placeholder'       => __( 'https://', 'carbonate' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'esc_url'
					],
				/**
				 * COLORS
				 */
				[
					'name'             => 'color-subsection',
					'label'            => __( 'Colors', 'carbonate' ),
					'desc'             => __( 'Choose your brand colors for different areas of the theme.', 'carbonate' ),
					'type'             => 'subsection',
				],
				[
					'name'              => 'color-background',
					'label'             => __( 'Background Color', 'carbonate' ),
					'desc'              => __( 'Your main background color. Usually white.', 'carbonate' ),
					'type'              => 'color',
					'default'           => '#ffffff',
				],
				[
					'name'              => 'color-text',
					'label'             => __( 'Text Color', 'carbonate' ),
					'desc'              => __( 'Used for body text. Usually a shade of black.', 'carbonate' ),
					'type'              => 'color',
					'default'           => '#222222',
				],
				[
					'name'              => 'color-primary',
					'label'             => __( 'Primary Color', 'carbonate' ),
					'desc'              => __( 'Your main brand color. Used in your main navigation bar and footer.', 'carbonate' ),
					'type'              => 'color',
					'default'           => '#ff3399',
				],
				[
					'name'              => 'color-secondary',
					'label'             => __( 'Secondary Color', 'carbonate' ),
					'desc'              => __( 'Your action color. Used in your buttons.', 'carbonate' ),
					'type'              => 'color',
					'default'           => '#222222',
				],
				
				[
						'name'              => 'color-button-text',
						'label'             => __( 'Button Text Color', 'carbonate' ),
						'desc'              => __( 'Used in your buttons to contrast secondary color.', 'carbonate' ),
						'type'              => 'color',
						'default'           => '#ffffff',
					],
					
				[
						'name'              => 'color-link',
						'label'             => __( 'Link Color', 'carbonate' ),
						'desc'              => __( 'Used for all your links.', 'carbonate' ),
						'type'              => 'color',
						'default'           => '#244be5',
					],
					
				[
						'name'              => 'color-nav',
						'label'             => __( 'Navigation Color', 'carbonate' ),
						'desc'              => __( 'Used for all your text and links in your header and footer.', 'carbonate' ),
						'type'              => 'color',
						'default'           => '#ffffff',
					],

				/**
				 * MENU
				 
				[
					'name'             => 'menu-subsection',
					'label'            => __( 'Site Menu', 'carbonate' ),
					'desc'             => __( 'Define the four links in the header menu', 'carbonate' ),
					'type'             => 'subsection',
				],
				[
					'name'              => 'menu-item-1-label',
					'label'             => __( 'Label 1', 'wedevs' ),
					'desc'              => __( 'Label for menu item', 'wedevs' ),
					'placeholder'       => __( 'Home', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field'
				],
				[
					'name'              => 'menu-item-1-value',
					'label'             => __( 'Link 1', 'wedevs' ),
					'desc'              => __( 'URL for menu item. Can be relative (/home) or absolute (https://mysite.com/home)', 'wedevs' ),
					'placeholder'       => __( 'http://', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'esc_url'
				],
				[
					'name'              => 'menu-item-2-label',
					'label'             => __( 'Label 2', 'wedevs' ),
					'desc'              => __( 'Label for menu item', 'wedevs' ),
					'placeholder'       => __( 'About', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field'
				],
				[
					'name'              => 'menu-item-2-value',
					'label'             => __( 'Link 2', 'wedevs' ),
					'desc'              => __( 'URL for menu item. Can be relative (/home) or absolute (https://mysite.com/home)', 'wedevs' ),
					'placeholder'       => __( 'http://', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'esc_url'
				],
				[
					'name'              => 'menu-item-3-label',
					'label'             => __( 'Label 3', 'wedevs' ),
					'desc'              => __( 'Label for menu item', 'wedevs' ),
					'placeholder'       => __( 'Category', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field'
				],
				[
					'name'              => 'menu-item-3-value',
					'label'             => __( 'Link 3', 'wedevs' ),
					'desc'              => __( 'URL for menu item. Can be relative (/home) or absolute (https://mysite.com/home)', 'wedevs' ),
					'placeholder'       => __( 'http://', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'esc_url'
				],
				[
					'name'              => 'menu-item-4-label',
					'label'             => __( 'Label 4', 'wedevs' ),
					'desc'              => __( 'Label for menu item', 'wedevs' ),
					'placeholder'       => __( 'Buy', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field'
				],
				[
					'name'              => 'menu-item-4-value',
					'label'             => __( 'Link 4', 'wedevs' ),
					'desc'              => __( 'URL for menu item. Can be relative (/home) or absolute (https://mysite.com/home)', 'wedevs' ),
					'placeholder'       => __( 'http://', 'carbonate' ),
					'type'              => 'text',
					'default'           => '',
					'sanitize_callback' => 'esc_url'
				],

				/**
				 * FONTS
				 */
				[
					'name'             => 'fonts-subsection',
					'label'            => __( 'Fonts', 'carbonate' ),
					'desc'             => __( 'Select two-font pairing. These are websafe fonts only.', 'carbonate' ),
					'type'             => 'subsection',
				],
				[
					'name'             => 'headline-font',
					'label'            => __( 'Headline Font', 'wedevs' ),
					'desc'             => __( 'Fonts used for H1 and H2 headlines.', 'wedevs' ),
					'type'             => 'select',
					'default'          => '',
					'options'          => [
						'arial'           => 'Arial',
						'verdana'         => 'Verdana',
						'helvetica'       => 'Helvetica',
						'tahoma'          => 'Tahoma',
						'trebuchet ms'    => 'Trebuchet MS',
						'times new roman' => 'Times New Roman',
						'georgia'         => 'Georgia',
						'garamond'        => 'Garamond',
						'courier new'     => 'Courier New',
						'brush script mt' => 'Brush Script MT',
					],
				],
				[
					'name'             => 'body-font',
					'label'            => __( 'Body Font', 'wedevs' ),
					'desc'             => __( 'Fonts used for body text.', 'wedevs' ),
					'type'             => 'select',
					'default'          => '',
					'options'          => [
						'arial'           => 'Arial',
						'verdana'         => 'Verdana',
						'helvetica'       => 'Helvetica',
						'tahoma'          => 'Tahoma',
						'trebuchet ms'    => 'Trebuchet MS',
						'times new roman' => 'Times New Roman',
						'georgia'         => 'Georgia',
						'garamond'        => 'Garamond',
						'courier new'     => 'Courier New',
						'brush script mt' => 'Brush Script MT',
					],
				],
			],
		];
	}

	/**
	 * Helper to retrieve a setting with an option to define a default value.
	 *
	 * @param string $option The key of the option to retrieve
	 * @param string $default The falllback value if no options is set
	 * @return string The value if found, or the default
	 */
	static public function get_setting(string $option, string $default = ""): string {
		$options = get_option( Settings::SETTINGS_NAME );
		if ( isset( $options[$option] ) ) {
			return $options[$option];
		}

		return $default;
	}
}

Settings::register();