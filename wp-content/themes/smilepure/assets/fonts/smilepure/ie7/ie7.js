/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'smilepure\'">' + entity + '</span>' + html;
	}
	var icons = {
		'smilepure-tooth': '&#xe900;',
		'smilepure-broken-tooth': '&#xe901;',
		'smilepure-teeth': '&#xe902;',
		'smilepure-implant': '&#xe903;',
		'smilepure-teeth-1': '&#xe904;',
		'smilepure-tooth-1': '&#xe905;',
		'smilepure-drilling': '&#xe906;',
		'smilepure-dental-veneer': '&#xe907;',
		'smilepure-dentist-chair': '&#xe908;',
		'smilepure-mouthwash': '&#xe909;',
		'smilepure-open-mouth': '&#xe90a;',
		'smilepure-dentist': '&#xe90b;',
		'smilepure-tooth-2': '&#xe90c;',
		'smilepure-tooth-3': '&#xe90d;',
		'smilepure-braces': '&#xe90e;',
		'smilepure-braces-1': '&#xe90f;',
		'smilepure-tooth-4': '&#xe910;',
		'smilepure-removal': '&#xe911;',
		'smilepure-crown': '&#xe912;',
		'smilepure-tooth-5': '&#xe913;',
		'smilepure-tooth-6': '&#xe914;',
		'smilepure-floss': '&#xe915;',
		'smilepure-tools': '&#xe916;',
		'smilepure-toothbrush': '&#xe917;',
		'smilepure-tooth-drill': '&#xe918;',
		'smilepure-dentist-1': '&#xe919;',
		'smilepure-magnifying-glass': '&#xe91a;',
		'smilepure-dentist-chair-1': '&#xe91b;',
		'smilepure-health-report': '&#xe91c;',
		'smilepure-dentures': '&#xe91d;',
		'smilepure-crown-1': '&#xe91e;',
		'smilepure-plaque': '&#xe91f;',
		'smilepure-tooth-extraction': '&#xe920;',
		'smilepure-x-ray': '&#xe921;',
		'smilepure-forceps': '&#xe922;',
		'smilepure-teeth-brushing': '&#xe923;',
		'smilepure-toothbrush-1': '&#xe924;',
		'smilepure-toothbrush-2': '&#xe925;',
		'smilepure-calcium': '&#xe926;',
		'smilepure-tooth-7': '&#xe927;',
		'smilepure-tooth-8': '&#xe928;',
		'smilepure-tooth-9': '&#xe929;',
		'smilepure-tooth-10': '&#xe92a;',
		'smilepure-tooth-11': '&#xe92b;',
		'smilepure-smartphone': '&#xe92c;',
		'smilepure-tooth-12': '&#xe92d;',
		'smilepure-braces-2': '&#xe92e;',
		'smilepure-suction': '&#xe92f;',
		'smilepure-tooth-fairy': '&#xe930;',
		'smilepure-floss-1': '&#xe931;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/smilepure-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
