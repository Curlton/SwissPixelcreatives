import './bootstrap';

// 1. Function to change language via your custom flag dropdown
window.changeLanguage = function(langCode) {
    const select = document.querySelector('.goog-te-combo');
    if (select) {
        select.value = langCode;
        select.dispatchEvent(new Event('change'));
    }
};

// 2. Initialize Google Translate (Hidden)
// Note: This must be on the 'window' object so the external script can find it
window.googleTranslateElementInit = function() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        autoDisplay: false
    }, 'google_translate_element');
};

// 3. Load Google Translate Script Dynamically
// FIX: Added the 'cb' parameter so Google calls your init function
if (!document.getElementById('google-translate-script')) {
    const script = document.createElement('script');
    script.id = 'google-translate-script';
    script.type = 'text/javascript';
    script.src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit";
    document.head.appendChild(script);
}