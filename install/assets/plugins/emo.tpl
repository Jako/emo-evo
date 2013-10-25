<?php
/**
 * emo
 *
 * E-Mail Obfuscation with Javascript
 *
 * @events:
 * - OnLoadWebDocument
 * - OnWebPagePrerender
 * @category 	plugin
 * @version 	1.5.0
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @author      Jako
 * @internal	@properties &emoTplOnly=Templates only?;list;enable,disable;enable &emoSelection=How to select ID's?;list;exclude,include;exclude &emoSelectionRange=Chosen ID's;text; &pathToEmoJs=Path to javascript;text;/assets/plugins/emo/emo.min.js &pathToEmoCss=Path to css;text; &noScriptMessage='No javascript' message (ID for internal link);text;Turn on JavaScript!
 * @internal    @events OnLoadWebDocument,OnWebPagePrerender
 * @internal	@modx_category Forms and Mail
 * @internal    @installset base, sample
 */
require(MODX_BASE_PATH . 'assets/plugins/emo/emo.plugin.php');
