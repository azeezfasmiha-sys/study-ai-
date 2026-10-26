<?php
// language_switcher.php
?>
<div class="google-translate-container" style="display: inline-block; background: #fff; padding: 5px 10px; border-radius: 6px; border: 1px solid #ccc;">
    <span style="font-size: 12px; font-weight: bold; color: #333; margin-right: 5px;">🌐 Language:</span>
    <div id="google_translate_element" style="display: inline-block;"></div>
</div>

<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'ta', // Your default page language code
        includedLanguages: 'ta,en,si', // Tamil, English, Sinhala
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
/* Clean up the Google Translate widget UI to match your site design */
.goog-te-combo {
    padding: 4px 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
    background: #fff;
    font-size: 13px;
    cursor: pointer;
}
.goog-te-banner-frame.skiptranslate { display: none !important; }
body { top: 0px !important; }
.goog-logo-link { display: none !important; }
.goog-te-gadget { font-size: 0px !important; color: transparent !important; }
</style>