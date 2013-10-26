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
 * @internal	@properties &emoTplOnly=Templates only?;list;enable,disable;enable &emoSelection=How to select IDs?;list;exclude,include;exclude &emoSelectionRange=Chosen IDs;text; &pathToEmoJs=Path to emo javascript;text;/assets/plugins/emo/emo.min.js &pathToEmoCss=Path to emo css;text; &noScriptMessage='No javascript' message (Resource ID for internal link);text;Turn on JavaScript!
 * @internal    @events OnLoadWebDocument,OnWebPagePrerender
 * @internal	@modx_category Forms and Mail
 * @internal    @installset base, sample
 */
require(MODX_BASE_PATH . 'assets/plugins/emo/emo.plugin.php');
