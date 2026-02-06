<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    
    
    <!-- Professional Security: CSRF Token -->
    <!-- Essential for Livewire forms and AJAX requests in 2026 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic SEO: Managed per page via Livewire -->
    <title>{{ $title ?? 'SwissPixel | Professional Agency' }}</title>
    <meta name="description" content="{{ $description ?? 'SwissPixel provides high-end digital solutions.' }}">
    <style id='wp-img-auto-sizes-contain-inline-css' type='text/css'>
img:is([sizes=auto i],[sizes^="auto," i]){contain-intrinsic-size:3000px 1500px}
/*# sourceURL=wp-img-auto-sizes-contain-inline-css */
</style>
    <link rel='stylesheet' id='bdt-uikit-css' href={{asset('wp-content/plugins/bdthemes-element-pack/assets/css/bdt-uikit.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='ep-helper-css' href={{asset('wp-content/plugins/bdthemes-element-pack/assets/css/ep-helper.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='trp-language-switcher-style-css' href={{asset('wp-content/plugins/translatepress-multilingual/assets/css/trp-language-switcher.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='trp-popup-style-css' href={{asset('wp-content/plugins/translatepress-business/add-ons-pro/automatic-language-detection/assets/css/trp-popup.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href={{asset('wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href={{asset('wp-content/uploads/elementor/css/custom-frontend.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-8-css' href={{asset('wp-content/uploads/elementor/css/post-8.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='widget-spacer-css' href={{asset('wp-content/plugins/elementor/assets/css/widget-spacer.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='widget-heading-css' href={{asset('wp-content/plugins/elementor/assets/css/widget-heading.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css' href={{asset('wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='e-swiper-css' href={{asset('wp-content/plugins/elementor/assets/css/conditionals/e-swiper.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='widget-loop-common-css' href={{asset('wp-content/plugins/elementor-pro/assets/css/widget-loop-common.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='widget-loop-carousel-css' href={{asset('wp-content/plugins/elementor-pro/assets/css/widget-loop-carousel.min.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='e-motion-fx-css' href={{asset('wp-content/plugins/elementor-pro/assets/css/modules/motion-fx.min.css')}} type='text/css' media='all' />
<link rel="stylesheet" id="widget-loop-grid-css" href="{{ asset('wp-content/uploads/elementor/css/custom-pro-widget-loop-grid.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="ep-logo-grid-css" href="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/css/ep-logo-grid.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="tippy-css" href="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/css/tippy.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="widget-image-css" href="{{ asset('wp-content/plugins/elementor/assets/css/widget-image.min.css') }}" type="text/css" media="all" />
<link rel='stylesheet' id='widget-icon-list-css' href='{{ asset('wp-content/uploads/elementor/css/custom-widget-icon-list.min.css') }}' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-2496-css' href={{asset('wp-content/uploads/elementor/css/post-2496.css')}} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css' href={{ asset('wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css') }} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css' href={{ asset('wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css') }} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-brands-css' href={{ asset('wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css') }} type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-regular-css' href={{ asset('wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.min.css') }} type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css' href={{asset('wp-content/themes/swisspixel/css/bootstrap-light.min.css')}} type={{asset('text/css')}} media={{asset('all')}} />
<link rel='stylesheet' id='wd-revolution-slider-css' href={{asset('wp-content/themes/swisspixel/css/parts/int-rev-slider.min.css')}} type={{asset('text/css')}} media={{asset('all')}} />
<link rel="stylesheet" id="wd-elementor-base-css" href="{{ asset('wp-content/themes/swisspixel/css/parts/int-elem-base.min.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="wd-elementor-pro-base-css" href="{{ asset('wp-content/themes/swisspixel/css/parts/int-elementor-pro.min.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="child-style-css" href="{{ asset('wp-content/themes/woodmart-child/style.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="wd-header-base-css" href="{{ asset('wp-content/themes/swisspixel/css/parts/header-base.min.css') }}" type="text/css" media="all" />
<link rel='stylesheet' id='wd-mod-tools-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/mod-tools.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-header-elements-base-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/header-el-base.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-social-icons-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/el-social-icons.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-header-fullscreen-menu-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/header-el-fullscreen-menu.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-widget-collapse-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/opt-widget-collapse.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-footer-base-css' href="{{ asset('wp-content/themes/swisspixel/css/parts/footer-base.min.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wd-scroll-top-css' href={{asset('wp-content/themes/swisspixel/css/parts/opt-scrolltotop.min.css')}} type={{asset('text/css')}} media={{asset('all')}} />
<link rel="stylesheet" id="xts-style-default_header-css" href="{{ asset('wp-content/uploads/2025/08/xts-default_header-1754940193.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="xts-style-theme_settings_default-css" href="{{ asset('wp-content/uploads/2024/03/xts-theme_settings_default-1710185328.css') }}" type="text/css" media="all" />
<link rel="stylesheet" id="xts-google-fonts-css" href="https://fonts.googleapis.com/css?family=Roboto%3A400%2C700%7CPoppins%3A400%2C600%2C500%7CLato%3A400%2C700&amp;display=swap&amp;ver=7.3.1" type="text/css" media="all" />
<link rel='stylesheet' id='elementor-gf-local-robotoslab-css' href={{ asset('wp-content/uploads/elementor/google-fonts/css/robotoslab.css') }} type='text/css' media='all' />
<script type="text/javascript" src="{{ asset('wp-includes/js/jquery/jquery.min.js') }}" id="jquery-core-js"></script>
<script type="text/javascript" src="{{ asset('wp-includes/js/jquery/jquery-migrate.min.js') }}" id="jquery-migrate-js"></script>
<script type="text/javascript" id="trp-language-cookie-js-extra">
  /* <![CDATA[ */
var trp_language_cookie_data = {"abs_home":"https://optimization-app.com","url_slugs":{"en_GB":"en","de_CH":"de"},"cookie_name":"trp_language","cookie_age":"30","cookie_path":"/","default_language":"en_GB","publish_languages":["en_GB","de_CH"],"trp_ald_ajax_url":"https://optimization-app.com/wp-content/plugins/translatepress-business/add-ons-pro/automatic-language-detection/includes/trp-ald-ajax.php","detection_method":"browser-ip","popup_option":"popup","popup_type":"normal_popup","popup_textarea":"We've detected you might be speaking a different language. Do you want to change to:","popup_textarea_change_button":"Change Language","popup_textarea_close_button":"Close and do not switch language","iso_codes":{"en_GB":"en","de_CH":"de","en_US":"en"},"language_urls":{"en_GB":"https://optimization-app.com/","de_CH":"https://optimization-app.com/de/"},"english_name":{"en_GB":"English","de_CH":"German"},"is_iphone_user_check":""};
//# sourceURL=trp-language-cookie-js-extra
/* ]]> */
</script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    // Removed the "layout" restriction to make the combo box easier for JS to find
    autoDisplay: false
  }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="preload" as="font" href="{{ asset('wp-content/themes/swisspixel/fonts/woodmart-font-1-400efb4.woff2') }}" type="font/woff2" crossorigin>
<style>
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
					background-image: none !important;
				}
				@media screen and (max-height: 1024px) {
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
				@media screen and (max-height: 640px) {
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
			</style>
<meta name="generator" content="Powered by Slider Revolution 6.7.36 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
<link rel="icon" href="wp-content/uploads/2023/10/cropped-swisspixel_ico-32x32.png" sizes="32x32" />
<link rel="icon" href="{{ asset('wp-content/uploads/2023/10/cropped-swisspixel_ico-192x192.png') }}" sizes="192x192" />
<link rel="apple-touch-icon" href="{{ asset('wp-content/uploads/2023/10/cropped-swisspixel_ico-180x180.png') }}" />
<meta name="msapplication-TileImage" content="{{ asset('wp-content/uploads/2023/10/cropped-swisspixel_ico-270x270.png') }}" />
<script>function setREVStartSize(e){
			//window.requestAnimationFrame(function() {
				window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
				window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
				try {
					var pw = document.getElementById(e.c).parentNode.offsetWidth,
						newh;
					pw = pw===0 || isNaN(pw) || (e.l=="fullwidth" || e.layout=="fullwidth") ? window.RSIW : pw;
					e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
					e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
					e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
					e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
					e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
					e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
					e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
					if(e.layout==="fullscreen" || e.l==="fullscreen")
						newh = Math.max(e.mh,window.RSIH);
					else{
						e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
						for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
						e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
						e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
						for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
											
						var nl = new Array(e.rl.length),
							ix = 0,
							sl;
						e.tabw = e.tabhide>=pw ? 0 : e.tabw;
						e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
						e.tabh = e.tabhide>=pw ? 0 : e.tabh;
						e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
						for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
						sl = nl[0];
						for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
						var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
						newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
					}
					var el = document.getElementById(e.c);
					if (el!==null && el) el.style.height = newh+"px";
					el = document.getElementById(e.c+"_wrapper");
					if (el!==null && el) {
						el.style.height = newh+"px";
						el.style.display = "block";
					}
				} catch(e){
					console.log("Failure at Presize of Slider:" + e)
				}
			//});
		  };</script>

		</style><style id='global-styles-inline-css' type='text/css'>
:root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgb(6,147,227) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgb(252,185,0) 0%,rgb(255,105,0) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgb(255,105,0) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);--wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);}:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
/*# sourceURL=global-styles-inline-css */
</style>
<link rel='stylesheet' id='ep-image-hover-effects-css' href="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/css/ep-image-hover-effects2922.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('wp-content/plugins/revslider/sr6/assets/css/rs64cc4.css') }} type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
      #rs-demo-id {}
      /*# sourceURL=rs-plugin-settings-inline-css */
</style>

@livewireStyles
</head>
<body class="home wp-singular page-template-default page page-id-2496 wp-theme-swisspixel wp-child-theme-woodmart-child translatepress-en_GB wrapper-wide  categories-accordion-on woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet wd-header-overlap elementor-default elementor-kit-8 elementor-page elementor-page-2496">
			<script type="text/javascript" id="wd-flicker-fix">// Flicker fix.</script>	
				<style class="wd-preloader-style">
				html {
					/* overflow: hidden; */
					overflow-y: scroll;
				}

				html body {
					overflow: hidden;
					max-height: calc(100vh - var(--wd-admin-bar-h));
				}
			</style>
			<div class="wd-preloader color-scheme-dark">
				<style>
											.wd-preloader {
							background-color: rgb(0,0,0)						}
					
					
					@keyframes wd-preloader-fadeOut {
						from {
							visibility: visible;
						}
						to {
							visibility: hidden;
						}
					}

					.wd-preloader {
						position: fixed;
						top: 0;
						left: 0;
						right: 0;
						bottom: 0;
						opacity: 1;
						visibility: visible;
						z-index: 2500;
						display: flex;
						justify-content: center;
						align-items: center;
						animation: wd-preloader-fadeOut 20s ease both;
						transition: opacity .4s ease;
					}

					.wd-preloader.preloader-hide {
						pointer-events: none;
						opacity: 0 !important;
					}

					.wd-preloader-img {
						max-width: 300px;
						max-height: 300px;
					}
				</style>

				<div class="wd-preloader-img">
											<img src="{{ asset('wp-content/uploads/2023/07/L-001-Black_White.svg') }}" alt="preloader">
									</div>
			</div>
		
	<div class="website-wrapper">
					<header class="whb-header whb-default_header whb-overcontent whb-full-width whb-scroll-stick whb-sticky-real">
					   <div class="whb-main-header">
	
               <div class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-dark whb-hidden-desktop whb-hidden-mobile whb-flex-flex-middle">
	                    <div class="container">
		                      <div class="whb-flex-row whb-top-bar-inner">
			                          <div class="whb-column whb-col-left whb-visible-lg">
	
                                     <div class="wd-header-text set-cont-mb-s reset-last-child "><strong style="color: #ffffff;">ADD ANYTHING HERE OR JUST REMOVE IT…</strong></div>
                                </div>
                                <div class="whb-column whb-col-center whb-visible-lg whb-empty-column">
	                              </div>
                                <div class="whb-column whb-col-right whb-visible-lg">
	
			                              <div class=" wd-social-icons icons-design-default icons-size-small color-scheme-light social-share social-form-circle text-center">

				
									                        <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-facebook" aria-label="Facebook social link">
						                                 <span class="wd-icon"></span>
											                    </a>
				
									                        <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-twitter" aria-label="Twitter social link">
						                                  <span class="wd-icon"></span>
											                    </a>
				
				
				
				
									                         <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-pinterest" aria-label="Pinterest social link">
						                               <span class="wd-icon"></span>
											                     </a>
				
				
									                        <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-linkedin" aria-label="Linkedin social link">
						                                  <span class="wd-icon"></span>
											                    </a>
				
				                                  <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-tg" aria-label="Telegram social link">
						                                     <span class="wd-icon"></span>
											                    </a>	
			                              </div>

		                            </div>
                                <div class="whb-column whb-col-mobile whb-hidden-lg">
	
			                                <div class=" wd-social-icons icons-design-default icons-size-small color-scheme-light social-share social-form-circle text-center">

				
									                             <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-facebook" aria-label="Facebook social link">
						                                             <span class="wd-icon"></span>
											                          </a>
				
									                             <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-twitter" aria-label="Twitter social link">
						                                        <span class="wd-icon"></span>
											                         </a>
				                                        <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-pinterest" aria-label="Pinterest social link">
						                                         <span class="wd-icon"></span>
											                        </a>
				                                       <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-linkedin" aria-label="Linkedin social link">
						                                          <span class="wd-icon"></span>
											                          </a>
				
				                                      <a rel="noopener noreferrer nofollow" href="#" target="_blank" class=" wd-social-icon social-tg" aria-label="Telegram social link">
						                                       <span class="wd-icon"></span>
											                         </a>	
			                                </div>

		                             </div>
		                      </div>
	                      </div>
                   </div>

                   <div class="whb-row whb-general-header whb-not-sticky-row whb-without-bg whb-without-border whb-color-light whb-flex-flex-middle">
	                      <div class="container">
		                          <div class="whb-flex-row whb-general-header-inner">
			                             <div class="whb-column whb-col-left whb-visible-lg">
	                                       <div class="site-logo">
	                                           <a href="{{ route('home') }}" class="wd-logo wd-main-logo" rel="home">
		                                         <img width="141" height="81" src="{{ asset('wp-content/uploads/2023/07/L-001-Black_White.svg') }}" class="attachment-full size-full" alt="Swiss Pixel - Digital Marketing Agency." style="max-width:250px;" decoding="async" />	</a>
	                                        </div>
                                    </div>
                                    <div class="whb-column whb-col-center whb-visible-lg whb-empty-column">
	                                  </div>
                                    <div class="whb-column whb-col-right whb-visible-lg">
	
                                             <div class="wd-header-nav wd-header-secondary-nav text-right" role="navigation" aria-label="Secondary navigation">
	                                                 <ul id="menu-language_menu" class="menu wd-nav wd-nav-secondary wd-style-default wd-gap-s"><li id="menu-item-4633" class="trp-language-switcher-container menu-item menu-item-type-post_type menu-item-object-language_switcher menu-item-4633 item-level-0 menu-simple-dropdown wd-event-hover" ><a href="#" class="woodmart-nav-link"><span class="nav-link-text"><span data-no-translation><img class="trp-flag-image" src="{{ asset('wp-content/plugins/translatepress-multilingual/assets/images/flags/de_CH.png') }}" width="18" height="12" alt="de_CH" title="German"><span class="trp-ls-language-name">DE</span></span></span></a></li>
                                                   </ul>
                                              </div>
                                      <!--END MAIN-NAV-->
		                                          <div class="wd-tools-element wd-header-fs-nav wd-design-6 wd-style-icon whb-tiueim5f5uazw1f1dm8r">
			                                               <a href="#" rel="nofollow noopener">
				                                                   <span class="wd-tools-icon">
											                                      </span>

					                                                <span class="wd-tools-text">Menu</span>

							                                        </a>
					
		                                          </div>
	                                   </div>
                                     <div class="whb-column whb-mobile-left whb-hidden-lg">
	                                       <div class="site-logo">
	                                           <a href="{{ route('home') }}" class="wd-logo wd-main-logo" rel="home">
		                                         <img width="141" height="81" src="{{ asset('wp-content/uploads/2023/07/L-001-Black_White.svg') }}" class="attachment-full size-full" alt="Swiss Pixel - Digital Marketing Agency." style="max-width:140px;" decoding="async" />	</a>
	                                       </div>
                                      </div>
                                     <div class="whb-column whb-mobile-center whb-hidden-lg whb-empty-column">
	                                  </div>
                                    <div class="whb-column whb-mobile-right whb-hidden-lg">

                                           <div class="wd-header-text set-cont-mb-s reset-last-child  wd-inline">			<link rel="stylesheet" id="elementor-post-4435-css" href="{{ asset('wp-content/uploads/elementor/css/post-4435.css') }}" type="text/css" media="all">
					                                      <div data-elementor-type="wp-post" data-elementor-id="4435" class="elementor elementor-4435" data-elementor-post-type="cms_block">
						                                      <section class="elementor-section elementor-top-section elementor-element elementor-element-f7b85b8 elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled" data-id="f7b85b8" data-element_type="section">
						                                               <div class="elementor-container elementor-column-gap-default">
					                                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c74cd14" data-id="c74cd14" data-element_type="column">
			                                                                     <div class="elementor-widget-wrap elementor-element-populated">
						                                                                  <div class="elementor-element elementor-element-c5d519b elementor-widget elementor-widget-html" data-id="c5d519b" data-element_type="widget" data-widget_type="html.default">
				                                                                          <div class="elementor-widget-container">
					                                                                           <a href="{{ route('home') }}">EN</a> | <a href="">DE</a>	
                                                                                  </div>
				                                                                      </div>
					                                                                 </div>
		                                                              </div>
					                                                  </div>
		                                               </section>
				                                         </div>
		                                 </div>
                                     <div class="wd-tools-element wd-header-mobile-nav wd-style-icon wd-design-6 whb-wn5z894j1g5n0yp3eeuz">
	                                       <a href="#" rel="nofollow" aria-label="Open mobile menu">
		
		                                        <span class="wd-tools-icon">
					                                              </span>

		                                        <span class="wd-tools-text">Menu</span>

			                                   </a>
                                      </div>
                                      <!--END wd-header-mobile-nav-->
                                    </div>
		                          </div>
	                     </div>
                  </div>
              </div>
    </header>
	
	 <!--End Main Header -->

    <!-- Start banner-section-h1 -->
    <div class="main-page-wrapper">
	    {{ $slot }}
	</div>

	
			<footer class="footer-container color-scheme-light">
				<div class="copyrights-wrapper copyrights-centered">
					<div class="container">
						<div class="min-footer">
							<div class="col-left set-cont-mb-s reset-last-child">
									<strong><i class="fa fa-copyright">
                        </i> 2023 <a href="{{ route('home') }}">Swiss Pixel<strong> - Digital Marketing Agency</strong></a>.															</div>
													</div>
					</div>
				</div>
					</footer>
	</div> <!-- end wrapper 
  <div class="wd-close-side wd-fill"></div>
		<a href="#" class="scrollToTop" aria-label="Scroll to top button"></a>
					<div class="wd-fs-menu wd-fill wd-scroll color-scheme-light">
				<div class="wd-fs-close wd-action-btn wd-style-icon wd-cross-icon">
					<a aria-label="Close main menu"></a>
				</div>
				<div class="container wd-scroll-content">
					<div class="wd-fs-inner">
						<ul id="menu-footer-link" class="menu wd-nav wd-nav-fs wd-style-underline"><li id="menu-item-2515" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2496 current_page_item menu-item-2515 item-level-0 menu-simple-dropdown" ><a href="index.html" class="woodmart-nav-link"><span class="nav-link-text">Home</span></a></li>
<li id="menu-item-4225" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-4225 item-level-0 menu-simple-dropdown onepage-link" ><a href="index.html#our_services" class="woodmart-nav-link"><span class="nav-link-text">Services</span></a></li>
<li id="menu-item-2519" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2519 item-level-0 menu-simple-dropdown" ><a href="projects/index.html" class="woodmart-nav-link"><span class="nav-link-text">Projects</span></a></li>
<li id="menu-item-2518" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2518 item-level-0 menu-simple-dropdown" ><a href="price-list/index.html" class="woodmart-nav-link"><span class="nav-link-text">Price List</span></a></li>
<li id="menu-item-4285" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4285 item-level-0 menu-simple-dropdown" ><a href="blog/index.html" class="woodmart-nav-link"><span class="nav-link-text">Blog</span></a></li>
<li id="menu-item-3924" class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-3924 item-level-0 menu-simple-dropdown onepage-link" ><a href="index.html#ourcontact" class="woodmart-nav-link"><span class="nav-link-text">Contact</span></a></li>
<li id="menu-item-4434" class="trp-language-switcher-container menu-item menu-item-type-post_type menu-item-object-language_switcher menu-item-4434 item-level-0 menu-simple-dropdown" ><a href="#" class="woodmart-nav-link"><span class="nav-link-text"><span data-no-translation><img class="trp-flag-image" src="wp-content/plugins/translatepress-multilingual/assets/images/flags/de_CH.png" width="18" height="12" alt="de_CH" title="German"><span class="trp-ls-language-name">DE</span></span></span></a></li>
</ul>		
											</div>
				</div>
			</div>
		<div class="mobile-nav wd-side-hidden wd-left"><div class="wd-heading"><div class="close-side-widget wd-action-btn wd-style-text wd-cross-icon"><a href="#" rel="nofollow">Close</a></div></div><ul id="menu-footer-link-1" class="mobile-pages-menu wd-nav wd-nav-mobile wd-active"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2496 current_page_item menu-item-2515 item-level-0" ><a href="index.html" class="woodmart-nav-link"><span class="nav-link-text">Home</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-4225 item-level-0 onepage-link" ><a href="index.html#our_services" class="woodmart-nav-link"><span class="nav-link-text">Services</span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2519 item-level-0" ><a href="projects/index.html" class="woodmart-nav-link"><span class="nav-link-text">Projects</span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2518 item-level-0" ><a href="price-list/index.html" class="woodmart-nav-link"><span class="nav-link-text">Price List</span></a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4285 item-level-0" ><a href="blog/index.html" class="woodmart-nav-link"><span class="nav-link-text">Blog</span></a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom current_page_item menu-item-home menu-item-3924 item-level-0 onepage-link" ><a href="index.html#ourcontact" class="woodmart-nav-link"><span class="nav-link-text">Contact</span></a></li>
<li class="trp-language-switcher-container menu-item menu-item-type-post_type menu-item-object-language_switcher menu-item-4434 item-level-0" ><a href="#" class="woodmart-nav-link"><span class="nav-link-text"><span data-no-translation><img class="trp-flag-image" src="wp-content/plugins/translatepress-multilingual/assets/images/flags/de_CH.png" width="18" height="12" alt="de_CH" title="German"><span class="trp-ls-language-name">DE</span></span></span></a></li>
</ul>
		</div>
    <!--END MOBILE-NAV-->
	<script>
				const lazyloadRunObserver = () => {
					const lazyloadBackgrounds = document.querySelectorAll( `.e-con.e-parent:not(.e-lazyloaded)` );
					const lazyloadBackgroundObserver = new IntersectionObserver( ( entries ) => {
						entries.forEach( ( entry ) => {
							if ( entry.isIntersecting ) {
								let lazyloadBackground = entry.target;
								if( lazyloadBackground ) {
									lazyloadBackground.classList.add( 'e-lazyloaded' );
								}
								lazyloadBackgroundObserver.unobserve( entry.target );
							}
						});
					}, { rootMargin: '200px 0px 200px 0px' } );
					lazyloadBackgrounds.forEach( ( lazyloadBackground ) => {
						lazyloadBackgroundObserver.observe( lazyloadBackground );
					} );
				};
				const events = [
					'DOMContentLoaded',
					'elementor/lazyload/observe',
				];
				events.forEach( ( event ) => {
					document.addEventListener( event, lazyloadRunObserver );
				} );
			</script>
      </script>
			<script type="text/javascript" src="{{ asset('wp-includes/js/dist/hooks.min.js') }}" id="wp-hooks-js"></script>
      <script type="text/javascript" src="{{ asset('wp-includes/js/dist/i18n.min.js') }}" id="wp-i18n-js"></script>
      <script type="text/javascript" src="wp-content/plugins/contact-form-7/includes/swv/js/index1b46.js?ver=6.1.4" id="swv-js"></script>
<script type="text/javascript" id="contact-form-7-js-before">
/* <![CDATA[ */
var wpcf7 = {
    "api": {
        "root": "http:\/\/optimization-app.com\/wp-json\/",
        "namespace": "contact-form-7\/v1"
    }
};
//# sourceURL=contact-form-7-js-before
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/contact-form-7/includes/js/index.js') }}" id="contact-form-7-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/revslider/sr6/assets/js/rbtools.min.js') }}" defer async id="tp-tools-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/revslider/sr6/assets/js/rs6.min.js') }}" defer async id="revmin-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor/assets/js/webpack.runtime.min.js') }}" id="elementor-webpack-runtime-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor/assets/js/frontend-modules.min.js') }}" id="elementor-frontend-modules-js"></script>
<script type="text/javascript" src="{{ asset('wp-includes/js/jquery/ui/core.min.js') }}" id="jquery-ui-core-js"></script>
<script type="text/javascript" id="elementor-frontend-js-before">
/* <![CDATA[ */
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":true},"widescreen":{"label":"Widescreen","value":1920,"default_value":2400,"direction":"min","is_enabled":true}},"hasCustomBreakpoints":true},"version":"3.31.2","is_static":false,"experimentalFeatures":{"additional_custom_breakpoints":true,"theme_builder_v2":true,"e_element_cache":true,"home_screen":true,"global_classes_should_enforce_capabilities":true,"e_variables":true,"cloud-library":true,"e_opt_in_v4_page":true},"urls":{"assets":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor\/assets\/","ajaxurl":"https:\/\/optimization-app.com\/wp-admin\/admin-ajax.php","uploadUrl":"https:\/\/optimization-app.com\/wp-content\/uploads"},"nonces":{"floatingButtonsClickTracking":"d11c421f49"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet","viewport_laptop","viewport_widescreen"],"viewport_widescreen":1920,"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":2496,"title":"Swiss%20Pixel%20-%20Digital%20Marketing%20Agency","excerpt":"","featuredImage":false}};
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":true},"widescreen":{"label":"Widescreen","value":1920,"default_value":2400,"direction":"min","is_enabled":true}},"hasCustomBreakpoints":true},"version":"3.31.2","is_static":false,"experimentalFeatures":{"additional_custom_breakpoints":true,"theme_builder_v2":true,"e_element_cache":true,"home_screen":true,"global_classes_should_enforce_capabilities":true,"e_variables":true,"cloud-library":true,"e_opt_in_v4_page":true},"urls":{"assets":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor\/assets\/","ajaxurl":"https:\/\/optimization-app.com\/wp-admin\/admin-ajax.php","uploadUrl":"https:\/\/optimization-app.com\/wp-content\/uploads"},"nonces":{"floatingButtonsClickTracking":"d11c421f49"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet","viewport_laptop","viewport_widescreen"],"viewport_widescreen":1920,"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":2496,"title":"Swiss%20Pixel%20-%20Digital%20Marketing%20Agency","excerpt":"","featuredImage":false}};
//# sourceURL=elementor-frontend-js-before
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor/assets/js/frontend.min.js') }}" id="elementor-frontend-js"></script>
<script type="text/javascript" src="{{ asset('wp-includes/js/imagesloaded.min.js') }}" id="imagesloaded-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/vendor/js/popper.min.js') }}" id="popper-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/vendor/js/tippy.all.min.js') }}" id="tippyjs-js"></script>
<script type="text/javascript" id="bdt-uikit-js-extra">
/* <![CDATA[ */
var element_pack_ajax_login_config = {"ajaxurl":"https://optimization-app.com/wp-admin/admin-ajax.php","language":"en","loadingmessage":"Sending user info, please wait...","unknownerror":"Unknown error, make sure access is correct!"};
var ElementPackConfig = {"ajaxurl":"https://optimization-app.com/wp-admin/admin-ajax.php","nonce":"672a2d3af9","data_table":{"language":{"sLengthMenu":"Show _MENU_ Entries","sInfo":"Showing _START_ to _END_ of _TOTAL_ entries","sSearch":"Search :","sZeroRecords":"No matching records found","oPaginate":{"sPrevious":"Previous","sNext":"Next"}}},"contact_form":{"sending_msg":"Sending message please wait...","captcha_nd":"Invisible captcha not defined!","captcha_nr":"Could not get invisible captcha response!"},"mailchimp":{"subscribing":"Subscribing you please wait..."},"search":{"more_result":"More Results","search_result":"SEARCH RESULT","not_found":"not found"},"elements_data":{"sections":[],"columns":[],"widgets":[]}};
var element_pack_ajax_login_config = {"ajaxurl":"https://optimization-app.com/wp-admin/admin-ajax.php","language":"en","loadingmessage":"Sending user info, please wait...","unknownerror":"Unknown error, make sure access is correct!"};
var ElementPackConfig = {"ajaxurl":"https://optimization-app.com/wp-admin/admin-ajax.php","nonce":"672a2d3af9","data_table":{"language":{"sLengthMenu":"Show _MENU_ Entries","sInfo":"Showing _START_ to _END_ of _TOTAL_ entries","sSearch":"Search :","sZeroRecords":"No matching records found","oPaginate":{"sPrevious":"Previous","sNext":"Next"}}},"contact_form":{"sending_msg":"Sending message please wait...","captcha_nd":"Invisible captcha not defined!","captcha_nr":"Could not get invisible captcha response!"},"mailchimp":{"subscribing":"Subscribing you please wait..."},"search":{"more_result":"More Results","search_result":"SEARCH RESULT","not_found":"not found"},"elements_data":{"sections":[],"columns":[],"widgets":[]}};
//# sourceURL=bdt-uikit-js-extra
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/js/bdt-uikit.min.js') }}" id="bdt-uikit-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/js/modules/ep-logo-grid.min.js') }}" id="ep-logo-grid-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/js/common/helper.min.js') }}" id="element-pack-helper-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js') }}" id="elementor-pro-webpack-runtime-js"></script>
<script type="text/javascript" id="elementor-pro-frontend-js-before">
/* <![CDATA[ */
var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/optimization-app.com\/wp-admin\/admin-ajax.php","nonce":"6191859717","urls":{"assets":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor-pro\/assets\/","rest":"https:\/\/optimization-app.com\/wp-json\/"},"settings":{"lazy_load_background_images":true},"popup":{"hasPopUps":false},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"},"x-twitter":{"title":"X"},"threads":{"title":"Threads"}},"facebook_sdk":{"lang":"en_GB","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/optimization-app.com\/wp-admin\/admin-ajax.php","nonce":"6191859717","urls":{"assets":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor-pro\/assets\/","rest":"https:\/\/optimization-app.com\/wp-json\/"},"settings":{"lazy_load_background_images":true},"popup":{"hasPopUps":false},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"},"x-twitter":{"title":"X"},"threads":{"title":"Threads"}},"facebook_sdk":{"lang":"en_GB","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/optimization-app.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
//# sourceURL=elementor-pro-frontend-js-before
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor-pro/assets/js/frontend.min.js') }}" id="elementor-pro-frontend-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/elementor-pro/assets/js/elements-handlers.min.js') }}" id="pro-elements-handlers-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/libs/cookie.min.js') }}" id="wd-cookie-library-js"></script>
<script type="text/javascript" id="woodmart-theme-js-extra">
/* <![CDATA[ */
var woodmart_settings = {"menu_storage_key":"woodmart_b0e6c4a2267f331db98638915095f0bf","ajax_dropdowns_save":"1","photoswipe_close_on_scroll":"1","woocommerce_ajax_add_to_cart":"yes","variation_gallery_storage_method":"old","elementor_no_gap":"enabled","adding_to_cart":"Processing","added_to_cart":"Product was successfully added to your cart.","continue_shopping":"Continue shopping","view_cart":"View Cart","go_to_checkout":"Checkout","loading":"Loading...","countdown_days":"days","countdown_hours":"hr","countdown_mins":"min","countdown_sec":"sc","cart_url":"","ajaxurl":"http://optimization-app.com","add_to_cart_action":"widget","added_popup":"no","categories_toggle":"yes","enable_popup":"no","popup_delay":"2000","popup_event":"time","popup_scroll":"1000","popup_pages":"0","promo_popup_hide_mobile":"yes","product_images_captions":"no","ajax_add_to_cart":"1","all_results":"View all results","zoom_enable":"yes","ajax_scroll":"yes","ajax_scroll_class":".main-page-wrapper","ajax_scroll_offset":"100","infinit_scroll_offset":"300","product_slider_auto_height":"no","product_slider_dots":"no","price_filter_action":"click","product_slider_autoplay":"","close":"Close (Esc)","share_fb":"Share on Facebook","pin_it":"Pin it","tweet":"Tweet","download_image":"Download image","off_canvas_column_close_btn_text":"Close","cookies_version":"1","header_banner_version":"1","promo_version":"1","header_banner_close_btn":"yes","header_banner_enabled":"no","whb_header_clone":"\n    \u003Cdiv class=\"whb-sticky-header whb-clone whb-main-header \u003C%wrapperClasses%\u003E\"\u003E\n        \u003Cdiv class=\"\u003C%cloneClass%\u003E\"\u003E\n            \u003Cdiv class=\"container\"\u003E\n                \u003Cdiv class=\"whb-flex-row whb-general-header-inner\"\u003E\n                    \u003Cdiv class=\"whb-column whb-col-left whb-visible-lg\"\u003E\n                        \u003C%.site-logo%\u003E\n                    \u003C/div\u003E\n                    \u003Cdiv class=\"whb-column whb-col-center whb-visible-lg\"\u003E\n                        \u003C%.wd-header-main-nav%\u003E\n                    \u003C/div\u003E\n                    \u003Cdiv class=\"whb-column whb-col-right whb-visible-lg\"\u003E\n                        \u003C%.wd-header-my-account%\u003E\n                        \u003C%.wd-header-search:not(.wd-header-search-mobile)%\u003E\n\t\t\t\t\t\t\u003C%.wd-header-wishlist%\u003E\n                        \u003C%.wd-header-compare%\u003E\n                        \u003C%.wd-header-cart%\u003E\n                        \u003C%.wd-header-fs-nav%\u003E\n                    \u003C/div\u003E\n                    \u003C%.whb-mobile-left%\u003E\n                    \u003C%.whb-mobile-center%\u003E\n                    \u003C%.whb-mobile-right%\u003E\n                \u003C/div\u003E\n            \u003C/div\u003E\n        \u003C/div\u003E\n    \u003C/div\u003E\n","pjax_timeout":"5000","split_nav_fix":"","shop_filters_close":"no","woo_installed":"","base_hover_mobile_click":"no","centered_gallery_start":"1","quickview_in_popup_fix":"","one_page_menu_offset":"150","hover_width_small":"1","is_multisite":"","current_blog_id":"1","swatches_scroll_top_desktop":"no","swatches_scroll_top_mobile":"no","lazy_loading_offset":"0","add_to_cart_action_timeout":"no","add_to_cart_action_timeout_number":"3","single_product_variations_price":"no","google_map_style_text":"Custom style","quick_shop":"yes","sticky_product_details_offset":"150","preloader_delay":"300","comment_images_upload_size_text":"Some files are too large. Allowed file size is 1 MB.","comment_images_count_text":"You can upload up to 3 images to your review.","single_product_comment_images_required":"no","comment_required_images_error_text":"Image is required.","comment_images_upload_mimes_text":"You are allowed to upload images only in png, jpeg formats.","comment_images_added_count_text":"Added %s image(s)","comment_images_upload_size":"1048576","comment_images_count":"3","search_input_padding":"no","comment_images_upload_mimes":{"jpg|jpeg|jpe":"image/jpeg","png":"image/png"},"home_url":"https://optimization-app.com/","shop_url":"","age_verify":"no","banner_version_cookie_expires":"60","promo_version_cookie_expires":"7","age_verify_expires":"30","cart_redirect_after_add":"no","swatches_labels_name":"no","product_categories_placeholder":"Select a category","product_categories_no_results":"No matches found","cart_hash_key":"wc_cart_hash_20b5e4988ba8e2282620082df6ad9175","fragment_name":"wc_fragments_20b5e4988ba8e2282620082df6ad9175","photoswipe_template":"\u003Cdiv class=\"pswp\" aria-hidden=\"true\" role=\"dialog\" tabindex=\"-1\"\u003E\u003Cdiv class=\"pswp__bg\"\u003E\u003C/div\u003E\u003Cdiv class=\"pswp__scroll-wrap\"\u003E\u003Cdiv class=\"pswp__container\"\u003E\u003Cdiv class=\"pswp__item\"\u003E\u003C/div\u003E\u003Cdiv class=\"pswp__item\"\u003E\u003C/div\u003E\u003Cdiv class=\"pswp__item\"\u003E\u003C/div\u003E\u003C/div\u003E\u003Cdiv class=\"pswp__ui pswp__ui--hidden\"\u003E\u003Cdiv class=\"pswp__top-bar\"\u003E\u003Cdiv class=\"pswp__counter\"\u003E\u003C/div\u003E\u003Cbutton class=\"pswp__button pswp__button--close\" title=\"Close (Esc)\"\u003E\u003C/button\u003E \u003Cbutton class=\"pswp__button pswp__button--share\" title=\"Share\"\u003E\u003C/button\u003E \u003Cbutton class=\"pswp__button pswp__button--fs\" title=\"Toggle fullscreen\"\u003E\u003C/button\u003E \u003Cbutton class=\"pswp__button pswp__button--zoom\" title=\"Zoom in/out\"\u003E\u003C/button\u003E\u003Cdiv class=\"pswp__preloader\"\u003E\u003Cdiv class=\"pswp__preloader__icn\"\u003E\u003Cdiv class=\"pswp__preloader__cut\"\u003E\u003Cdiv class=\"pswp__preloader__donut\"\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E\u003Cdiv class=\"pswp__share-modal pswp__share-modal--hidden pswp__single-tap\"\u003E\u003Cdiv class=\"pswp__share-tooltip\"\u003E\u003C/div\u003E\u003C/div\u003E\u003Cbutton class=\"pswp__button pswp__button--arrow--left\" title=\"Previous (arrow left)\"\u003E\u003C/button\u003E \u003Cbutton class=\"pswp__button pswp__button--arrow--right\" title=\"Next (arrow right)\u003E\"\u003E\u003C/button\u003E\u003Cdiv class=\"pswp__caption\"\u003E\u003Cdiv class=\"pswp__caption__center\"\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E\u003C/div\u003E","load_more_button_page_url":"yes","load_more_button_page_url_opt":"yes","menu_item_hover_to_click_on_responsive":"no","clear_menu_offsets_on_resize":"yes","three_sixty_framerate":"60","three_sixty_prev_next_frames":"5","ajax_search_delay":"300","animated_counter_speed":"3000","site_width":"1600","cookie_secure_param":"1","cookie_path":"/","slider_distortion_effect":"sliderWithNoise","current_page_builder":"elementor","collapse_footer_widgets":"yes","ajax_fullscreen_content":"yes","grid_gallery_control":"hover","grid_gallery_enable_arrows":"none","add_to_cart_text":"Add to cart","ajax_links":".wd-nav-product-cat a, .website-wrapper .widget_product_categories a, .widget_layered_nav_filters a, .woocommerce-widget-layered-nav a, .filters-area:not(.custom-content) a, body.post-type-archive-product:not(.woocommerce-account) .woocommerce-pagination a, body.tax-product_cat:not(.woocommerce-account) .woocommerce-pagination a, .wd-shop-tools a:not(.breadcrumb-link), .woodmart-woocommerce-layered-nav a, .woodmart-price-filter a, .wd-clear-filters a, .woodmart-woocommerce-sort-by a, .woocommerce-widget-layered-nav-list a, .wd-widget-stock-status a, .widget_nav_mega_menu a, .wd-products-shop-view a, .wd-products-per-page a, .category-grid-item a, .wd-cat a, body[class*=\"tax-pa_\"] .woocommerce-pagination a","wishlist_expanded":"no","wishlist_show_popup":"enable","wishlist_page_nonce":"4faf824493","wishlist_fragments_nonce":"a5585bc2bc","wishlist_remove_notice":"Do you really want to remove these products?","wishlist_hash_name":"woodmart_wishlist_hash_ecf23d5075d6c198d821ad36187e71d2","wishlist_fragment_name":"woodmart_wishlist_fragments_ecf23d5075d6c198d821ad36187e71d2","wishlist_save_button_state":"no","frequently_bought":"555bac3abc","is_criteria_enabled":"","summary_criteria_ids":"","myaccount_page":"","vimeo_library_url":"https://optimization-app.com/wp-content/themes/swisspixel/js/libs/vimeo-player.min.js","reviews_criteria_rating_required":"no","is_rating_summary_filter_enabled":""};
var woodmart_page_css = {"wd-lazy-loading-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/opt-lazy-load.min.css","wd-wpcf7-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/int-wpcf7.min.css","wd-revolution-slider-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/int-rev-slider.min.css","wd-elementor-base-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/int-elem-base.min.css","wd-elementor-pro-base-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/int-elementor-pro.min.css","wd-header-base-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/header-base.min.css","wd-mod-tools-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/mod-tools.min.css","wd-header-elements-base-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/header-el-base.min.css","wd-social-icons-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/el-social-icons.min.css","wd-header-fullscreen-menu-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/header-el-fullscreen-menu.min.css","wd-widget-collapse-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/opt-widget-collapse.min.css","wd-footer-base-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/footer-base.min.css","wd-scroll-top-css":"https://optimization-app.com/wp-content/themes/swisspixel/css/parts/opt-scrolltotop.min.css"};
var woodmart_variation_gallery_data = [];
//# sourceURL=woodmart-theme-js-extra
/* ]]> */
</script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/global/helpers.min.js') }}" id="woodmart-theme-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/wc/woocommerceNotices.min.js') }}" id="wd-woocommerce-notices-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/header/headerBuilder.min.js') }}" id="wd-header-builder-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/menu/menuOffsets.min.js') }}" id="wd-menu-offsets-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/menu/menuSetUp.min.js') }}" id="wd-menu-setup-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/global/lazyLoading.min.js') }}" id="wd-lazy-loading-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/plugins/bdthemes-element-pack/assets/js/modules/ep-wrapper-link.min.js') }}" id="ep-wrapper-link-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/global/widgetCollapse.min.js') }}" id="wd-widget-collapse-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/global/scrollTop.min.js') }}" id="wd-scroll-top-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/menu/fullScreenMenu.min.js') }}" id="wd-full-screen-menu-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/libs/waypoints.min.js') }}" id="wd-waypoints-library-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/menu/onePageMenu.min.js') }}" id="wd-one-page-menu-js"></script>
<script type="text/javascript" src="{{ asset('wp-content/themes/swisspixel/js/scripts/menu/mobileNavigation.min.js') }}" id="wd-mobile-navigation-js"></script>
<script type="text/javascript" defer src="{{ asset('wp-content/plugins/mailchimp-for-wp/assets/js/forms3f6b.js') }}" id="mc4wp-forms-api-js"></script>


@livewireScripts
</body>


</html>
