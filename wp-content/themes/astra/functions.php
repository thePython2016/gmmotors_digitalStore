<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.11.18' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.11.6' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-memory-limit-notice.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-elementor-editor-settings.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-buddypress.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Hide "Home" text from header (site title area) without affecting menu
 */
add_action( 'wp_head', 'astra_hide_header_home_text' );
function astra_hide_header_home_text() {
	?>
	<style type="text/css">
		/* Hide site title "Home" text in header, but keep menu intact */
		#masthead .site-title,
		#masthead .site-title a,
		.main-header-bar .site-title,
		.main-header-bar .site-title a {
			display: none !important;
		}
	</style>
	<?php
}

/**
 * Fix checkout redirect using woocommerce_proceed_to_checkout hook
 * Ensures "Proceed to Checkout" button redirects to correct checkout page
 */
add_action( 'woocommerce_proceed_to_checkout', 'astra_fix_proceed_to_checkout_redirect', 5 );
function astra_fix_proceed_to_checkout_redirect() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	
	$checkout_page_id = wc_get_page_id( 'checkout' );
	if ( $checkout_page_id > 0 ) {
		$checkout_url = get_permalink( $checkout_page_id );
		
		// Ensure checkout URL is correct and doesn't contain /dashboard/
		if ( strpos( $checkout_url, '/dashboard/' ) === false ) {
			// Update the checkout URL if it's misconfigured
			update_option( 'woocommerce_checkout_page_id', $checkout_page_id );
		}
	}
}

// Also fix the checkout URL filter to ensure correct URL is always returned.
add_filter( 'woocommerce_get_checkout_url', 'astra_ensure_correct_checkout_url', 10, 1 );
function astra_ensure_correct_checkout_url( $url ) {
	if ( strpos( $url, '/dashboard/' ) !== false ) {
		$checkout_page_id = wc_get_page_id( 'checkout' );
		if ( $checkout_page_id > 0 ) {
			$url = get_permalink( $checkout_page_id );
		}
	}
	return $url;
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

/**
 * ======================================================
 * ENABLE SHORTCODES INSIDE WORDPRESS MENUS (ASTRA SAFE)
 * ======================================================
 * Allows menu labels like:
 * [menu_cart]
 * [menu_login_signup]
 * [menu_logout]
 * [user_gravatar]
 */
add_filter('walker_nav_menu_start_el', function ($item_output) {
    if (strpos($item_output, '[') !== false) {
        $item_output = do_shortcode($item_output);
    }
    return $item_output;
}, 10, 1);

/**
 * ======================================================
 * USER GRAVATAR SHORTCODE
 * ======================================================
 * Shows logged-in user's avatar (menu-safe)
 *
 * Usage in menu:
 * [user_gravatar]
 * [user_gravatar size="28" show_name="no"]
 */
if (!function_exists('user_gravatar_shortcode')) {
    function user_gravatar_shortcode($atts) {

        if (!is_user_logged_in()) {
            return '';
        }

        $user = wp_get_current_user();

        $atts = shortcode_atts(array(
            'size'      => 28,
            'show_name' => 'no',
        ), $atts);

        $avatar = get_avatar(
            $user->ID,
            (int) $atts['size'],
            '',
            $user->display_name,
            array('class' => 'menu-user-avatar')
        );

        $html  = '<span class="menu-user-gravatar">';
        $html .= '<a href="' . esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) . '">';
        $html .= $avatar;

        if ($atts['show_name'] === 'yes') {
            $html .= '<span class="menu-user-name">' . esc_html($user->display_name) . '</span>';
        }

        $html .= '</a>';
        $html .= '</span>';

        return $html;
    }
}
if (!shortcode_exists('user_gravatar')) {
    add_shortcode('user_gravatar', 'user_gravatar_shortcode');
}

/**
 * ======================================================
 * LOGIN / SIGNUP MENU SHORTCODE
 * ======================================================
 * Shows ONLY when user is NOT logged in
 */
if (!function_exists('menu_login_signup_shortcode')) {
    function menu_login_signup_shortcode() {

        if (is_user_logged_in()) {
            return '';
        }

        return '<a class="menu-login-signup" href="' . esc_url(wp_login_url()) . '">
                    Signup / Login
                </a>';
    }
}
if (!shortcode_exists('menu_login_signup')) {
    add_shortcode('menu_login_signup', 'menu_login_signup_shortcode');
}

/**
 * ======================================================
 * LOGOUT MENU SHORTCODE
 * ======================================================
 * Shows ONLY when user IS logged in
 */
if (!function_exists('menu_logout_shortcode')) {
    function menu_logout_shortcode() {

        if (!is_user_logged_in()) {
            return '';
        }

        return '<a class="menu-logout" href="' . esc_url(wp_logout_url(home_url())) . '">
                    Logout
                </a>';
    }
}
if (!shortcode_exists('menu_logout')) {
    add_shortcode('menu_logout', 'menu_logout_shortcode');
}

/**
 * ======================================================
 * WOOCOMMERCE CART MENU SHORTCODE
 * ======================================================
 * - Basket icon
 * - ITEM COUNT AT TOP OF BASKET
 * - Total amount
 * - Opens Astra default slide-in cart
 */
if (!function_exists('menu_cart_shortcode')) {
    function menu_cart_shortcode() {

        if (!function_exists('WC')) {
            return '';
        }

        $count = WC()->cart->get_cart_contents_count();
        $total = WC()->cart->get_cart_total();

        ob_start(); ?>

        <a href="#" class="ast-cart-menu-trigger">

            <!-- Basket icon + count -->
            <span class="cart-icon-wrap">

                <span class="cart-icon">🛒</span>

                <?php if ($count > 0) : ?>
                    <span class="cart-count"><?php echo esc_html($count); ?></span>
                <?php endif; ?>

            </span>

            <span class="cart-total"><?php echo wp_kses_post($total); ?></span>

        </a>

        <?php
        return ob_get_clean();
    }
}
if (!shortcode_exists('menu_cart')) {
    add_shortcode('menu_cart', 'menu_cart_shortcode');
}

/**
 * ======================================================
 * OPEN ASTRA DEFAULT SLIDE-IN CART (RIGHT)
 * ======================================================
 */
add_action('wp_footer', function () {

    if (!function_exists('WC')) return;
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.body.addEventListener('click', function (e) {

                const trigger = e.target.closest('.ast-cart-menu-trigger');
                if (!trigger) return;

                e.preventDefault();

                const astraCart = document.querySelector('.ast-site-header-cart a');
                if (astraCart) {
                    astraCart.click();
                }
            });

        });
    </script>
    <?php
});

/**
 * ======================================================
 * MENU + CART + GRAVATAR STYLES
 * ======================================================
 */
add_action('wp_enqueue_scripts', function () {

    $css = "
    /* Cart trigger */
    .ast-cart-menu-trigger {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap !important;
        flex-wrap: nowrap !important;
    }

    /* Basket wrapper */
    .cart-icon-wrap {
        position: relative;
        display: inline-block;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }

    /* Basket icon */
    .cart-icon {
        font-size: 20px;
    }

    /* ITEM COUNT AT TOP OF BASKET */
    .cart-icon-wrap .cart-count {
        position: absolute;
        top: -8px;
        right: -10px;
        background: #ff0000;
        color: #ffffff;
        font-size: 11px;
        min-width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        border-radius: 50%;
        font-weight: bold;
        z-index: 9;
    }

    /* Cart total */
    .ast-cart-menu-trigger .cart-total {
        font-size: 14px;
        white-space: nowrap !important;
        display: inline-block !important;
        flex-shrink: 0 !important;
    }

    /* User gravatar */
    .menu-user-gravatar {
        display: inline-flex;
        align-items: center;
        margin-right: 0 !important;
        margin-left: 0 !important;
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .menu-user-gravatar img {
        border-radius: 50%;
        margin: 0 !important;
        padding: 0 !important;
    }

    .menu-user-name {
        margin-left: 4px;
        font-size: 14px;
    }

    /* Remove all distance between icon and signup/login */
    .menu-login-signup {
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    /* Remove all spacing between user icon and signup/login */
    .menu-user-gravatar + .menu-login-signup,
    .menu-login-signup + .menu-user-gravatar {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    /* Target menu items containing these elements - remove all spacing */
    .ast-header-menu .menu-item:has(.menu-user-gravatar) {
        margin-right: 0 !important;
        padding-right: 0 !important;
    }

    .ast-header-menu .menu-item:has(.menu-login-signup) {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }

    /* When user icon and signup/login are adjacent menu items - zero spacing */
    .ast-header-menu .menu-item:has(.menu-user-gravatar) + .menu-item:has(.menu-login-signup),
    .ast-header-menu .menu-item:has(.menu-login-signup) + .menu-item:has(.menu-user-gravatar) {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }

    /* Remove any gap from parent containers */
    .ast-header-menu li:has(.menu-user-gravatar),
    .ast-header-menu li:has(.menu-login-signup) {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Ensure no gap between adjacent list items */
    .ast-header-menu li:has(.menu-user-gravatar) + li:has(.menu-login-signup),
    .ast-header-menu li:has(.menu-login-signup) + li:has(.menu-user-gravatar) {
        margin-left: 0 !important;
    }

    /* Move primary menu a little to the left */
    .ast-builder-layout-element[data-section='section-hb-menu-1'],
    .ast-builder-layout-element[data-section*='menu-1'],
    [data-section*='menu-1'],
    .ast-builder-menu-1,
    .ast-header-primary-menu,
    .ast-primary-menu,
    .ast-builder-menu-primary,
    .main-header-menu,
    .ast-main-header-bar-alignment {
        margin-left: -20px !important;
    }

    /* Move secondary menu block to the right */
    .ast-builder-layout-element[data-section='section-hb-menu-2'],
    .ast-builder-layout-element[data-section*='menu-2'],
    [data-section*='menu-2'],
    .ast-builder-menu-2,
    .ast-header-secondary-menu,
    .ast-secondary-menu,
    .ast-builder-menu-secondary {
        margin-left: auto !important;
        margin-right: 0 !important;
        order: 999 !important;
    }

    /* Push secondary menu items to right */
    .ast-header-secondary-menu .menu,
    .ast-secondary-menu .menu,
    .ast-builder-menu-secondary .menu,
    [data-section*='menu-2'] .menu,
    .ast-builder-menu-2 .menu,
    .site-header .ast-builder-menu-2 .menu {
        justify-content: flex-end !important;
        margin-left: auto !important;
        text-align: right;
    }

    /* Ensure header row pushes secondary menu to right */
    .ast-builder-header-row .ast-builder-layout-element[data-section*='menu-2'] {
        margin-left: auto !important;
    }

    /* For header builder grid layout */
    .ast-builder-header-row {
        display: flex !important;
    }

    .ast-builder-header-row .ast-builder-layout-element[data-section*='menu-2'] {
        margin-left: auto !important;
    }

    /* Ensure View Cart button is visible in cart drawer */
    .astra-cart-drawer .astra-cart-drawer-footer {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 10;
    }

    .astra-cart-drawer .astra-cart-drawer-view-cart-button {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    /* Align My Orders menu item text to the right in account menu */
    .ast-account-nav-menu .menu-item.woocommerce-MyAccount-navigation-link--orders .menu-link,
    .ast-account-nav-menu .menu-item[class*=\"orders\"] .menu-link,
    .ast-account-nav-menu .menu-item .menu-link[href*=\"orders\"] {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
    }

    .ast-account-nav-menu .menu-item.woocommerce-MyAccount-navigation-link--orders .menu-link .ast-account-menu-text,
    .ast-account-nav-menu .menu-item[class*=\"orders\"] .menu-link .ast-account-menu-text,
    .ast-account-nav-menu .menu-item .menu-link[href*=\"orders\"] .ast-account-menu-text {
        margin-left: auto !important;
        text-align: right !important;
    }

    /* Align Shopping Cart menu item text to the right in account menu and main menu */
    .ast-account-nav-menu .menu-item[class*=\"cart\"] .menu-link,
    .ast-account-nav-menu .menu-item .menu-link[href*=\"cart\"],
    .ast-account-nav-menu .menu-item .menu-link[href*=\"basket\"],
    .ast-header-menu .menu-item[class*=\"cart\"] > a,
    .ast-header-menu .menu-item > a[href*=\"cart\"],
    .ast-header-menu .menu-item > a[href*=\"basket\"],
    .main-header-menu .menu-item[class*=\"cart\"] > a,
    .main-header-menu .menu-item > a[href*=\"cart\"],
    .ast-header-menu .menu-item:has(.ast-cart-menu-trigger) > a,
    .main-header-menu .menu-item:has(.ast-cart-menu-trigger) > a {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
    }

    /* Keep cart trigger inline with icon and text on same line */
    .ast-cart-menu-trigger {
        display: inline-flex !important;
        align-items: center !important;
        white-space: nowrap !important;
        flex-wrap: nowrap !important;
    }

    .ast-account-nav-menu .menu-item[class*=\"cart\"] .menu-link .ast-account-menu-text,
    .ast-account-nav-menu .menu-item .menu-link[href*=\"cart\"] .ast-account-menu-text,
    .ast-account-nav-menu .menu-item .menu-link[href*=\"basket\"] .ast-account-menu-text,
    .ast-header-menu .menu-item[class*=\"cart\"] > a .ast-account-menu-text,
    .ast-header-menu .menu-item > a[href*=\"cart\"] .ast-account-menu-text,
    .ast-header-menu .menu-item > a[href*=\"basket\"] .ast-account-menu-text,
    .main-header-menu .menu-item[class*=\"cart\"] > a .ast-account-menu-text,
    .main-header-menu .menu-item > a[href*=\"cart\"] .ast-account-menu-text,
    .ast-account-nav-menu .menu-item[class*=\"cart\"] .menu-link span:not(.ast-account-menu-icon),
    .ast-account-nav-menu .menu-item .menu-link[href*=\"cart\"] span:not(.ast-account-menu-icon),
    .ast-header-menu .menu-item[class*=\"cart\"] > a span:not(.ast-account-menu-icon),
    .ast-header-menu .menu-item > a[href*=\"cart\"] span:not(.ast-account-menu-icon),
    .ast-cart-menu-trigger .cart-total {
        margin-left: auto !important;
        text-align: right !important;
        white-space: nowrap !important;
        display: inline-block !important;
    }

    /* Ensure cart icon and text stay on same line */
    .ast-cart-menu-trigger .cart-icon-wrap,
    .ast-cart-menu-trigger .cart-total {
        display: inline-flex !important;
        align-items: center !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }
    
    /* Prevent any wrapping of cart elements */
    .ast-cart-menu-trigger * {
        white-space: nowrap !important;
    }
    
    /* Ensure parent menu item doesn't cause wrapping */
    .ast-header-menu .menu-item:has(.ast-cart-menu-trigger),
    .main-header-menu .menu-item:has(.ast-cart-menu-trigger) {
        white-space: nowrap !important;
    }
    ";

    wp_register_style('menu-ui-style', false);
    wp_enqueue_style('menu-ui-style');
    wp_add_inline_style('menu-ui-style', $css);
});

/**
 * Product Search Banner Shortcode
 * Usage: [product_search_banner]
 */
if (!function_exists('product_search_banner_shortcode')) {
    function product_search_banner_shortcode($atts) {
        ob_start();
        get_template_part('template-parts/product-search-banner');
        return ob_get_clean();
    }
}
if (!shortcode_exists('product_search_banner')) {
    add_shortcode('product_search_banner', 'product_search_banner_shortcode');
}

/**
 * Product Search Overlay on Slider Revolution
 * Add product search form as overlay on top of slider, positioned on the left
 */
if (!function_exists('product_search_slider_overlay')) {
    function product_search_slider_overlay() {
        ?>
        <div class="slider-search-overlay-wrapper">
            <div class="product-search-overlay-container">
                <div class="product-search-form-container">
                    <h2 class="product-search-title">Product</h2>
                    
                    <form class="product-search-form" method="get" action="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
                        
                        <!-- Main Search Input -->
                        <div class="search-field-wrapper">
                            <input 
                                type="text" 
                                name="s" 
                                class="product-search-input" 
                                placeholder="Search any product"
                                value="<?php echo isset( $_GET['s'] ) ? esc_attr( $_GET['s'] ) : ''; ?>"
                            >
                            <input type="hidden" name="post_type" value="product">
                        </div>
                        
                        <!-- Filter Dropdowns -->
                        <div class="search-filters">
                            <!-- First Row -->
                            <div class="filter-row">
                                <select name="product_cat" class="filter-dropdown">
                                    <option value="">Category</option>
                                    <?php
                                    if ( taxonomy_exists( 'product_cat' ) ) {
                                        $categories = get_terms( array(
                                            'taxonomy' => 'product_cat',
                                            'hide_empty' => false,
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                        ) );
                                        if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
                                            foreach ( $categories as $category ) {
                                                $selected = isset( $_GET['product_cat'] ) && $_GET['product_cat'] == $category->slug ? 'selected' : '';
                                                $count = $category->count > 0 ? ' (' . $category->count . ')' : '';
                                                echo '<option value="' . esc_attr( $category->slug ) . '" ' . $selected . '>' . esc_html( $category->name ) . $count . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                
                                <select name="product_tag" class="filter-dropdown">
                                    <option value="">Tag</option>
                                    <?php
                                    if ( taxonomy_exists( 'product_tag' ) ) {
                                        $tags = get_terms( array(
                                            'taxonomy' => 'product_tag',
                                            'hide_empty' => false,
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                        ) );
                                        if ( ! is_wp_error( $tags ) && ! empty( $tags ) ) {
                                            foreach ( $tags as $tag ) {
                                                $selected = isset( $_GET['product_tag'] ) && $_GET['product_tag'] == $tag->slug ? 'selected' : '';
                                                $count = $tag->count > 0 ? ' (' . $tag->count . ')' : '';
                                                echo '<option value="' . esc_attr( $tag->slug ) . '" ' . $selected . '>' . esc_html( $tag->name ) . $count . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <!-- Second Row -->
                            <div class="filter-row">
                                <select name="orderby" class="filter-dropdown">
                                    <option value="">Sort By</option>
                                    <option value="popularity" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'popularity' ); ?>>Popularity</option>
                                    <option value="rating" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'rating' ); ?>>Rating</option>
                                    <option value="date" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'date' ); ?>>Latest</option>
                                    <option value="price" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'price' ); ?>>Price: Low to High</option>
                                    <option value="price-desc" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'price-desc' ); ?>>Price: High to Low</option>
                                </select>
                                
                                <select name="price_range" class="filter-dropdown">
                                    <option value="">Price range</option>
                                    <option value="0-50" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '0-50' ); ?>>$0 - $50</option>
                                    <option value="50-100" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '50-100' ); ?>>$50 - $100</option>
                                    <option value="100-250" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '100-250' ); ?>>$100 - $250</option>
                                    <option value="250-500" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '250-500' ); ?>>$250 - $500</option>
                                    <option value="500+" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '500+' ); ?>>$500+</option>
                                </select>
                            </div>
                            
                            <!-- Third Row: Product Attributes -->
                            <?php
                            // Get WooCommerce product attributes
                            $product_attributes = array();
                            if ( function_exists( 'wc_get_attribute_taxonomies' ) ) {
                                $attribute_taxonomies = wc_get_attribute_taxonomies();
                                if ( ! empty( $attribute_taxonomies ) ) {
                                    foreach ( $attribute_taxonomies as $attribute ) {
                                        $taxonomy = wc_attribute_taxonomy_name( $attribute->attribute_name );
                                        if ( taxonomy_exists( $taxonomy ) ) {
                                            $product_attributes[ $taxonomy ] = array(
                                                'label' => $attribute->attribute_label,
                                                'name' => $attribute->attribute_name
                                            );
                                        }
                                    }
                                }
                            }
                            
                            // Display product attributes in rows of 2
                            if ( ! empty( $product_attributes ) ) {
                                $attribute_index = 0;
                                $attributes_array = array_values( $product_attributes );
                                
                                for ( $i = 0; $i < count( $attributes_array ); $i += 2 ) {
                                    echo '<div class="filter-row">';
                                    
                                    // First attribute in row
                                    if ( isset( $attributes_array[ $i ] ) ) {
                                        $taxonomy = wc_attribute_taxonomy_name( $attributes_array[ $i ]['name'] );
                                        $attribute_label = $attributes_array[ $i ]['label'];
                                        $attribute_terms = get_terms( array(
                                            'taxonomy' => $taxonomy,
                                            'hide_empty' => false,
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                        ) );
                                        
                                        if ( ! is_wp_error( $attribute_terms ) && ! empty( $attribute_terms ) ) {
                                            echo '<select name="filter_' . esc_attr( $attributes_array[ $i ]['name'] ) . '" class="filter-dropdown">';
                                            echo '<option value="">' . esc_html( $attribute_label ) . '</option>';
                                            foreach ( $attribute_terms as $term ) {
                                                $selected = isset( $_GET[ 'filter_' . $attributes_array[ $i ]['name'] ] ) && $_GET[ 'filter_' . $attributes_array[ $i ]['name'] ] == $term->slug ? 'selected' : '';
                                                $count = $term->count > 0 ? ' (' . $term->count . ')' : '';
                                                echo '<option value="' . esc_attr( $term->slug ) . '" ' . $selected . '>' . esc_html( $term->name ) . $count . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                    }
                                    
                                    // Second attribute in row
                                    if ( isset( $attributes_array[ $i + 1 ] ) ) {
                                        $taxonomy = wc_attribute_taxonomy_name( $attributes_array[ $i + 1 ]['name'] );
                                        $attribute_label = $attributes_array[ $i + 1 ]['label'];
                                        $attribute_terms = get_terms( array(
                                            'taxonomy' => $taxonomy,
                                            'hide_empty' => false,
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                        ) );
                                        
                                        if ( ! is_wp_error( $attribute_terms ) && ! empty( $attribute_terms ) ) {
                                            echo '<select name="filter_' . esc_attr( $attributes_array[ $i + 1 ]['name'] ) . '" class="filter-dropdown">';
                                            echo '<option value="">' . esc_html( $attribute_label ) . '</option>';
                                            foreach ( $attribute_terms as $term ) {
                                                $selected = isset( $_GET[ 'filter_' . $attributes_array[ $i + 1 ]['name'] ] ) && $_GET[ 'filter_' . $attributes_array[ $i + 1 ]['name'] ] == $term->slug ? 'selected' : '';
                                                $count = $term->count > 0 ? ' (' . $term->count . ')' : '';
                                                echo '<option value="' . esc_attr( $term->slug ) . '" ' . $selected . '>' . esc_html( $term->name ) . $count . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                    }
                                    
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                        
                        <!-- Search Button -->
                        <button type="submit" class="product-search-button">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
        
        <style>
        /* Product Search Overlay on Slider Revolution */
        .rev_slider_wrapper,
        .tp-banner,
        .rev_slider,
        .tp-revslider-mainwrapper,
        .revolution-slider-wrapper,
        .wpb_rev_slider_element,
        .rev_slider_wrapper .tp-banner,
        .rev_slider_wrapper .tp-banner-container {
            position: relative !important;
        }
        
        /* Make slider wrapper contain the overlay */
        .rev_slider_wrapper:first-of-type {
            position: relative !important;
        }
        
        .slider-search-overlay-wrapper {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            z-index: 99999 !important;
            pointer-events: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }
        
        .slider-search-overlay-wrapper.positioned {
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        /* Ensure overlay is positioned relative to slider */
        .rev_slider_wrapper .slider-search-overlay-wrapper {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            z-index: 99999 !important;
        }
        
        /* Ensure slider elements don't overlap the form */
        .rev_slider_wrapper .tp-banner,
        .rev_slider_wrapper .tp-banner-container,
        .rev_slider_wrapper .rev_slider,
        .tp-revslider-mainwrapper .tp-banner,
        .rev_slider_wrapper .tp-layer,
        .rev_slider_wrapper .tp-parallax-wrap,
        .rev_slider_wrapper .tp-mask-wrap {
            z-index: 1 !important;
        }
        
        /* Ensure form is always on top */
        .slider-search-overlay-wrapper,
        .slider-search-overlay-wrapper * {
            z-index: 99999 !important;
        }
        
        .product-search-form-container {
            z-index: 99999 !important;
            position: relative !important;
        }
        
        .product-search-overlay-container {
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
            height: 100% !important;
            pointer-events: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            padding: 40px !important;
            padding-left: 60px !important;
            box-sizing: border-box !important;
            z-index: 99999 !important;
        }
        
        .product-search-form-container {
            background: #ffffff !important;
            padding: 40px !important;
            border-radius: 15px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
            pointer-events: auto !important;
            max-width: 450px !important;
            width: 100% !important;
            z-index: 99999 !important;
            position: relative !important;
        }
        
        .product-search-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
            margin-top: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        .product-search-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .search-field-wrapper {
            margin-bottom: 5px;
        }
        
        .product-search-input {
            width: 100%;
            padding: 15px 20px;
            font-size: 1rem;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            background: #ffffff;
            color: #333;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        
        .product-search-input:focus {
            outline: none;
            border-color: #4a90e2;
        }
        
        .product-search-input::placeholder {
            color: #999;
        }
        
        .search-filters {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .filter-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .filter-dropdown {
            width: 100%;
            padding: 15px 20px;
            font-size: 1rem;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            background: #ffffff;
            color: #333;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
            padding-right: 40px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        
        .filter-dropdown:hover {
            border-color: #4a90e2;
        }
        
        .filter-dropdown:focus {
            outline: none;
            border-color: #4a90e2;
        }
        
        .product-search-button {
            width: 100%;
            padding: 18px 30px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #ffffff;
            background: #4a90e2;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .product-search-button:hover {
            background: #357abd;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
        }
        
        .product-search-button:active {
            transform: translateY(0);
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .product-search-overlay-container {
                padding: 30px 20px;
            }
            
            .product-search-form-container {
                max-width: 100%;
                padding: 30px 20px;
            }
        }
        
        @media (max-width: 768px) {
            .product-search-overlay-container {
                padding: 20px;
                justify-content: center;
            }
            
            .product-search-form-container {
                padding: 25px 15px;
            }
            
            .product-search-title {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }
            
            .filter-row {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .product-search-form-container {
                padding: 20px 15px;
            }
            
            .product-search-input,
            .filter-dropdown,
            .product-search-button {
                padding: 15px;
                font-size: 0.95rem;
            }
        }
        
        /* Hide product search banner section on home page (but keep slider overlay) */
        body.home .product-search-banner-section,
        body.home-page .product-search-banner-section {
            display: none !important;
        }
        
        /* Keep slider search overlay visible on home page */
        body.home .slider-search-overlay-wrapper,
        body.home-page .slider-search-overlay-wrapper {
            display: block !important;
        }
        
        /* Hide form blocks that appear before featured products sections */
        /* This will be handled by JavaScript for more precise targeting */
        </style>
        <script>
        jQuery(document).ready(function($) {
            // Remove product search banner section on home page (but keep slider overlay)
            function removeBannerSectionOnHomePage() {
                if ($('body').hasClass('home') || $('body').hasClass('home-page')) {
                    // Only remove the banner section, not the slider overlay
                    $('.product-search-banner-section').remove();
                }
            }
            
            // Remove banner section on home page
            removeBannerSectionOnHomePage();
            setTimeout(removeBannerSectionOnHomePage, 100);
            setTimeout(removeBannerSectionOnHomePage, 500);
            
            // Remove form blocks that appear before featured products
            function removeFormsBeforeFeaturedProducts() {
                // Find featured products sections
                var $featuredProducts = $('[class*="featured_products"], [class*="featured-products"], [id*="featured-products"], .woocommerce section.products');
                
                $featuredProducts.each(function() {
                    var $featuredSection = $(this);
                    var $prevSibling = $featuredSection.prev();
                    
                    // Remove product search forms that are previous siblings
                    if ($prevSibling.hasClass('product-search-banner-section') || 
                        $prevSibling.hasClass('slider-search-overlay-wrapper') ||
                        $prevSibling.find('.product-search-form-container').length > 0) {
                        $prevSibling.remove();
                    }
                    
                    // Also check parent's previous siblings
                    var $parent = $featuredSection.parent();
                    var $parentPrev = $parent.prev();
                    if ($parentPrev.hasClass('product-search-banner-section') || 
                        $parentPrev.hasClass('slider-search-overlay-wrapper')) {
                        $parentPrev.remove();
                    }
                });
            }
            
            // Remove forms before featured products
            removeFormsBeforeFeaturedProducts();
            
            // Also run after content loads
            setTimeout(removeFormsBeforeFeaturedProducts, 500);
            setTimeout(removeFormsBeforeFeaturedProducts, 1000);
            
            // Move overlay inside Slider Revolution container if it exists
            function positionSearchOverlay() {
                var $overlay = $('.slider-search-overlay-wrapper');
                var $slider = $('.rev_slider_wrapper:first, .tp-banner:first, .rev_slider:first, .tp-revslider-mainwrapper:first, .revolution-slider-wrapper:first, .wpb_rev_slider_element:first, .rev_slider_wrapper .tp-banner-container:first');
                
                if ($slider.length > 0 && $overlay.length > 0) {
                    // Make slider container relative if not already
                    $slider.css({
                        'position': 'relative',
                        'z-index': '1'
                    });
                    
                    // Ensure slider inner elements have lower z-index
                    $slider.find('.tp-banner, .tp-banner-container, .rev_slider').css('z-index', '1');
                    
                    // Move overlay inside slider container
                    $overlay.appendTo($slider.first());
                    
                    // Ensure overlay is positioned correctly with maximum z-index
                    $overlay.css({
                        'position': 'absolute',
                        'top': '0',
                        'left': '0',
                        'width': '100%',
                        'height': '100%',
                        'z-index': '99999',
                        'pointer-events': 'none'
                    });
                    
                    // Ensure form container has high z-index
                    $overlay.find('.product-search-form-container').css({
                        'z-index': '99999',
                        'position': 'relative',
                        'pointer-events': 'auto'
                    });
                    
                    // Ensure overlay container has high z-index
                    $overlay.find('.product-search-overlay-container').css({
                        'z-index': '99999',
                        'position': 'absolute'
                    });
                    
                    // Show overlay only after it's properly positioned
                    $overlay.addClass('positioned');
                }
            }
            
            // Try immediately
            positionSearchOverlay();
            
            // Try after a short delay (for lazy-loaded sliders)
            setTimeout(positionSearchOverlay, 500);
            setTimeout(positionSearchOverlay, 1000);
            setTimeout(positionSearchOverlay, 2000);
            setTimeout(positionSearchOverlay, 3000);
            
            // Also try when Revolution Slider is ready
            if (typeof jQuery.fn.revolution !== 'undefined') {
                $(document).on('revolution.slide.onloaded', positionSearchOverlay);
                $(document).on('revolution.slide.onchange', positionSearchOverlay);
            }
            
            // Watch for slider container changes
            var observer = new MutationObserver(function(mutations) {
                positionSearchOverlay();
            });
            
            // Observe body for changes
            if (document.body) {
                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            }
        });
        </script>
        <?php
    }
}
add_action('astra_header_after', 'product_search_slider_overlay', 10);

/**
 * ======================================================
 * AVATAR GRAVITY ADMIN MENU WITH ICONS
 * ======================================================
 * Creates admin menu with submenu items and appropriate icons
 */
if (!function_exists('avatar_gravity_admin_menu')) {
    function avatar_gravity_admin_menu() {
        // Main menu page
        add_menu_page(
            __('Avatar Gravity', 'astra'),
            __('Avatar Gravity', 'astra'),
            'manage_options',
            'avatar-gravity',
            'avatar_gravity_main_page',
            'dashicons-admin-users', // User/avatar icon
            30
        );

        // Submenu: Settings
        add_submenu_page(
            'avatar-gravity',
            __('Settings', 'astra'),
            __('Settings', 'astra'),
            'manage_options',
            'avatar-gravity-settings',
            'avatar_gravity_settings_page'
        );

        // Submenu: Profiles
        add_submenu_page(
            'avatar-gravity',
            __('Profiles', 'astra'),
            __('Profiles', 'astra'),
            'manage_options',
            'avatar-gravity-profiles',
            'avatar_gravity_profiles_page'
        );

        // Submenu: Forms
        add_submenu_page(
            'avatar-gravity',
            __('Forms', 'astra'),
            __('Forms', 'astra'),
            'manage_options',
            'avatar-gravity-forms',
            'avatar_gravity_forms_page'
        );

        // Submenu: Entries
        add_submenu_page(
            'avatar-gravity',
            __('Entries', 'astra'),
            __('Entries', 'astra'),
            'manage_options',
            'avatar-gravity-entries',
            'avatar_gravity_entries_page'
        );

        // Submenu: Reports
        add_submenu_page(
            'avatar-gravity',
            __('Reports', 'astra'),
            __('Reports', 'astra'),
            'manage_options',
            'avatar-gravity-reports',
            'avatar_gravity_reports_page'
        );
    }
    add_action('admin_menu', 'avatar_gravity_admin_menu');
}

/**
 * Add icons to Avatar Gravity submenu items
 */
if (!function_exists('avatar_gravity_submenu_icons')) {
    function avatar_gravity_submenu_icons() {
        global $submenu;
        
        if (!isset($submenu['avatar-gravity'])) {
            return;
        }
        
        // Define icons for each submenu item
        $icons = array(
            'avatar-gravity-settings' => 'dashicons-admin-settings',  // Settings icon
            'avatar-gravity-profiles'  => 'dashicons-admin-users',     // Users/Profiles icon
            'avatar-gravity-forms'     => 'dashicons-edit',            // Forms/Edit icon
            'avatar-gravity-entries'   => 'dashicons-list-view',       // Entries/List icon
            'avatar-gravity-reports'   => 'dashicons-chart-bar',        // Reports/Chart icon
        );
        
        foreach ($submenu['avatar-gravity'] as $key => $item) {
            $menu_slug = isset($item[2]) ? $item[2] : '';
            if (isset($icons[$menu_slug])) {
                $icon_class = $icons[$menu_slug];
                $submenu['avatar-gravity'][$key][0] = '<span class="dashicons ' . esc_attr($icon_class) . '" style="font-size: 16px; width: 16px; height: 16px; margin-right: 5px; vertical-align: middle;"></span> ' . esc_html($item[0]);
            }
        }
    }
    add_action('admin_menu', 'avatar_gravity_submenu_icons', 99);
}

/**
 * Add CSS for better icon styling
 */
if (!function_exists('avatar_gravity_submenu_icon_styles')) {
    function avatar_gravity_submenu_icon_styles() {
        ?>
        <style type="text/css">
            #toplevel_page_avatar-gravity .wp-submenu li a .dashicons {
                display: inline-block;
                margin-right: 5px;
                vertical-align: middle;
                line-height: 1;
            }
        </style>
        <?php
    }
    add_action('admin_head', 'avatar_gravity_submenu_icon_styles');
}

/**
 * Main page callback
 */
if (!function_exists('avatar_gravity_main_page')) {
    function avatar_gravity_main_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('Welcome to Avatar Gravity Dashboard', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * Settings page callback
 */
if (!function_exists('avatar_gravity_settings_page')) {
    function avatar_gravity_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('Avatar Gravity Settings', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * Profiles page callback
 */
if (!function_exists('avatar_gravity_profiles_page')) {
    function avatar_gravity_profiles_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('User Profiles Management', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * Forms page callback
 */
if (!function_exists('avatar_gravity_forms_page')) {
    function avatar_gravity_forms_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('Forms Management', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * Entries page callback
 */
if (!function_exists('avatar_gravity_entries_page')) {
    function avatar_gravity_entries_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('Form Entries', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * Reports page callback
 */
if (!function_exists('avatar_gravity_reports_page')) {
    function avatar_gravity_reports_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <p><?php esc_html_e('Reports & Analytics', 'astra'); ?></p>
        </div>
        <?php
    }
}

/**
 * ======================================================
 * VEHICLE FINDER FORM SHORTCODE
 * ======================================================
 * Usage: [vehicle_finder_form]
 * Displays a vehicle search form with populated fields from URL parameters
 */
add_shortcode('vehicle_finder_form', function () {
    ob_start();

    if (!function_exists('get_product_terms')) {
        function get_product_terms($taxonomy, $hide_empty = false) {
            if (!taxonomy_exists($taxonomy)) {
                return [];
            }
            $terms = get_terms([
                'taxonomy'   => $taxonomy,
                'hide_empty' => $hide_empty,
            ]);
            return (is_wp_error($terms) || empty($terms)) ? [] : $terms;
        }
    }

    $conditions = get_product_terms('pa_condition');
    $makes      = get_product_terms('pa_make');
    $models     = get_product_terms('pa_model');
    if (empty($models)) {
        $models = get_product_terms('pa-model');
    }
    $years = get_product_terms('pa_year');
    if (empty($years)) {
        $years = get_product_terms('pa-year');
    }
    if (empty($years)) {
        $years = get_product_terms('pa_model_year');
    }
    if (empty($years)) {
        $years = get_product_terms('pa-model-year');
    }
    $bodies   = get_product_terms('pa_body-type');
    $mileages = get_product_terms('pa_mileage_range');
    if (empty($mileages)) {
        $mileages = get_product_terms('pa_mileage-range');
    }

    // Get current values from URL parameters
    $current_product_name = isset($_GET['product_name']) ? sanitize_text_field($_GET['product_name']) : '';
    $current_condition    = isset($_GET['condition']) ? sanitize_text_field($_GET['condition']) : '';
    $current_year         = isset($_GET['year']) ? sanitize_text_field($_GET['year']) : '';
    $current_make         = isset($_GET['make']) ? sanitize_text_field($_GET['make']) : '';
    $current_model        = isset($_GET['model']) ? sanitize_text_field($_GET['model']) : '';
    $current_body         = isset($_GET['body']) ? sanitize_text_field($_GET['body']) : '';
    $current_mileage      = isset($_GET['mileage']) ? sanitize_text_field($_GET['mileage']) : '';
    $current_location     = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
    ?>

    <div class="vehicle-finder-wrapper">
        <div class="vehicle-finder-title">I AM LOOKING FOR</div>

        <form class="vehicle-finder-form" method="get" action="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">
            <div class="vehicle-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">

                <label class="vf-label" style="grid-column: span 2;">SELECT YOUR VEHICLE OPTIONS</label>

                <!-- PRODUCT NAME (spans two columns) -->
                <input type="text" name="product_name" placeholder="Product Name" value="<?php echo esc_attr($current_product_name); ?>" style="grid-column: span 2;">

                <!-- CONDITION -->
                <select name="condition">
                    <option value="">Condition</option>
                    <?php foreach ($conditions as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_condition, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- YEAR -->
                <select name="year">
                    <option value="">Year</option>
                    <?php foreach ($years as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_year, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- MAKE -->
                <select name="make">
                    <option value="">Make</option>
                    <?php foreach ($makes as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_make, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- MODEL -->
                <select name="model">
                    <option value="">Model</option>
                    <?php foreach ($models as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_model, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- BODY TYPE -->
                <select name="body">
                    <option value="">Body Type</option>
                    <?php foreach ($bodies as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_body, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- MILEAGE -->
                <select name="mileage">
                    <option value="">Max Mileage</option>
                    <?php foreach ($mileages as $term): ?>
                        <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_mileage, $term->slug); ?>>
                            <?php echo esc_html($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="text" name="location" placeholder="State, Zip, Town" value="<?php echo esc_attr($current_location); ?>">

                <button type="submit" class="vf-submit" style="grid-column: span 2;">
                    FIND MY CAR
                </button>

            </div>

            <input type="hidden" name="post_type" value="product">
        </form>
    </div>

    <?php
    return ob_get_clean();
});

/**
 * Apply sidebar-style attribute filters (?filter_make=toyota, etc.) to main product queries.
 *
 * Ensures URLs like /?filter_make=toyota or /shop/?filter_year=2023
 * actually filter WooCommerce product archives while preserving
 * the default product card layout/template.
 */
add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // Target core WooCommerce product listings.
    if (
        !$query->is_post_type_archive('product') &&
        !$query->is_tax(array('product_cat', 'product_tag')) &&
        'product' !== $query->get('post_type')
    ) {
        return;
    }

    $tax_query = (array) $query->get('tax_query');

    // Support both "make=toyota" and "filter_make=toyota".
    if (isset($_GET['make']) && '' !== (string) $_GET['make'] && !isset($_GET['filter_make'])) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        $_GET['filter_make'] = $_GET['make']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    }

    foreach ($_GET as $key => $raw_value) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if (!is_string($key) || 0 !== strpos($key, 'filter_')) {
            continue;
        }

        $attribute = substr($key, 7);
        $attribute = sanitize_key($attribute);
        if ('' === $attribute) {
            continue;
        }

        $value = is_array($raw_value) ? implode(',', $raw_value) : (string) $raw_value;
        $value = sanitize_text_field(wp_unslash($value));
        if ('' === $value) {
            continue;
        }

        // Map attribute key to taxonomy, using Woo helper when available.
        $taxonomy = function_exists('wc_attribute_taxonomy_name')
            ? wc_attribute_taxonomy_name($attribute)
            : ('pa_' . $attribute);

        if (!taxonomy_exists($taxonomy)) {
            $fallback_taxonomies = array(
                'pa_' . $attribute,
                'pa-' . $attribute,
            );
            $found_taxonomy      = '';
            foreach ($fallback_taxonomies as $maybe_taxonomy) {
                if (taxonomy_exists($maybe_taxonomy)) {
                    $found_taxonomy = $maybe_taxonomy;
                    break;
                }
            }
            if ('' === $found_taxonomy) {
                continue;
            }
            $taxonomy = $found_taxonomy;
        }

        $terms = array_filter(array_map('sanitize_title', array_map('trim', explode(',', $value))));
        if (empty($terms)) {
            continue;
        }

        $tax_query[] = array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $terms,
            'operator' => 'IN',
        );
    }

    if (!empty($tax_query)) {
        $query->set('tax_query', $tax_query);
    }
});

/**
 * Disable WordPress update checks to prevent warnings in local development
 */
add_filter('pre_site_transient_update_core', '__return_null');
add_filter('pre_site_transient_update_plugins', '__return_null');
add_filter('pre_site_transient_update_themes', '__return_null');
add_action('init', function() {
    remove_action('admin_init', '_maybe_update_core');
    remove_action('admin_init', '_maybe_update_plugins');
    remove_action('admin_init', '_maybe_update_themes');
    remove_action('wp_version_check', 'wp_version_check');
    remove_action('admin_init', '_maybe_update_core');
    remove_action('wp_update_plugins', 'wp_update_plugins');
    remove_action('wp_update_themes', 'wp_update_themes');
}, 1);
