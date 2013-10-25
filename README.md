emo - E-Mail Obfuscation
================================================================================

E-Mail Obfuscation with Javascript for the MODX Evolution content management framework

This plugin replaces all plaintext emails and email links with span elements.
Then the email addresses are encrypted and stored in javascript variables.
Javascript decryption routines are triggered by the browser on 'window.onload'
event and replace the span elements with the real email addresses.

Features:
--------------------------------------------------------------------------------
This plugin searches for 'mailto:' strings in href attributes and all plain text
email addresses in the html output. However, only email addresses like
'user@host.com' are matched whereas 'Tog@ther' is left untouched.

Matches of all plaintext emails and email links are consequently replaced with
span elements only containing a note to turn on javascript. Then email addresses
and original link text are encrypted and stored in javascript variables.
Decryption routines triggered by the browser on 'window.onload' event are
located in the script file 'emo.js'. Optionally, CSS class 'emo_address' can be
used to configure the appearance of email links.

It is still believed that encoding will stop spam-bots being able to find your
email address. Nevertheless, encoded email address harvester are on the way
(http://www.dreamweaverfever.com/experiments/spam/). Unlike other obfuscation
plugins, this one uses real encryption instead of using an out-dated and
over-used hack such as hexadecimal or unicode encoding (not encryption) of email
addresses. Also, all traces of href attributes as well as 'mailto:' strings and
'@' characters are hidden from spam-bots.
  
Installation:
--------------------------------------------------------------------------------
1. Upload the folder *assets/plugins/emo* in the corresponding folder in your installation.
2. Create a plugin called 'emo' with the following plugin code and check the `OnWebPagePrerender` and `OnLoadWebDocument` events `php
include MODX_BASE_PATH.'/assets/plugins/emo/emo.plugin.php';`
3. Insert the following code into the *input option values* 

```
&emoTplOnly=Templates only?;list;enable,disable;enable
&emoSelection=How to select ID's?;list;exclude,include;exclude
&emoSelectionRange=Chosen ID's;text;
&pathToEmoJs=Path to javascript;text;/assets/plugins/emo/emo.min.js
&pathToEmoCss=Path to css;text;
&noScriptMessage='No javascript' message (ID for internal link);text;Turn on JavaScript!
```