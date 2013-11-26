<?php
/**
 * emo
 *
 * Copyright 2008-2011 by Florian Wobbe - www.eprofs.de
 * Copyright 2011-2013 by Thomas Jakobi <thomas.jakobi@partout.info>
 *
 * emo is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * emo is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * emo; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package emo
 * @subpackage pluginfile
 */
if (MODX_BASE_PATH == '') {
	die('<h1>ERROR:</h1><p>Please use do not access this file directly.</p>');
}

// set customtv (base) path
define('EMO_PATH', str_replace(MODX_BASE_PATH, '', str_replace('\\', '/', realpath(dirname(__FILE__)))) . '/');
define('EMO_BASE_PATH', MODX_BASE_PATH . EMO_PATH);

if (!class_exists('Emo')) {
	include EMO_BASE_PATH . 'emo.class.php';
}

// Get plugin settings
$emoTplOnly = isset($emoTplOnly) ? $emoTplOnly : 'disable';
$emoSelection = isset($emoSelection) ? $emoSelection : 'exclude';
$emoSelectionRange = isset($emoSelectionRange) ? $emoSelectionRange : '';
$pathToEmoJs = isset($pathToEmoJs) ? $pathToEmoJs : '/assets/plugins/emo/emo.js';
$pathToEmoCSS = isset($pathToEmoCSS) ? $pathToEmoCSS : '';
$noScriptMessage = isset($noScriptMessage) ? $noScriptMessage : 'Turn on Javascript!';
if (is_numeric($noScriptMessage)) {
	$doc = $modx->getDocument($noScriptMessage);
	$noScriptMessage = '<a href="' . $modx->makeUrl($doc['id']) . '">' . $doc['pagetitle'] . '</a>';
}

// Stop plugin on selection range and selection type
$emoSelectionRange = explode(',', str_replace(' ', '', $emoSelectionRange));
$emoFound = in_array($modx->documentObject['id'], $emoSelectionRange);
if (($emoFound && ($emoSelection != 'include')) || ($emoTplOnly == 'enable' && ($modx->documentObject['template'] == 0))) {
	return;
}

$e = &$modx->Event;
switch ($e->name) {
	case 'OnLoadWebDocument': {
			if ($pathToEmoJs != '') {
				$modx->regClientScript($pathToEmoJs);
			}
			if ($pathToEmoCSS != '') {
				$modx->regClientCSS($pathToEmoCss);
			}
			break;
		}
	case 'OnWebPagePrerender': {
			$params = array(
				'noScriptMessage' => $noScriptMessage,
				'show_debug' => $show_debug
			);
			$emo = new Emo($modx, $params);
			$modx->documentOutput = $emo->obfuscateEmail($modx->documentOutput);
			$script = $emo->addressesjs . $emo->debug;
			if ($emo->addrCount && strpos($modx->documentOutput, $script) === false) {
				$modx->regClientScript($script);
				$modx->documentOutput = preg_replace('~(</body[^>]*>)~i', $script . "\n" . '\1', $modx->documentOutput);
			}
			break;
		}
	default: {
			break;
		}
}
return;
?>
