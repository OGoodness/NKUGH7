function languageSelect(id) {
    var languageFlag = document.getElementById(id).src;
    var languageAlt = document.getElementById(id).alt;
    var languageData = document.getElementById(id).getAttribute("data");
    console.log(languageFlag, languageAlt, languageData);
    form = document.createElement('form');
    form.setAttribute('method', 'POST');
    form.setAttribute('action', 'login.php');
    myvar = document.createElement('input');
    myvar.setAttribute('name', 'language');
    myvar.setAttribute('type', 'hidden');
    myvar.setAttribute('value', languageData);
    form.appendChild(myvar);
    document.body.appendChild(form);
    form.submit();
}
function displayLanguage(lang){
    var language;
    switch(lang){
        case 'ar': language = 'عربى'; break;
        case 'en': language = 'english'; break;
        case 'tl': language = 'filipino'; break;
        case 'vi': language = 'Tiếng Việt'; break;
        case 'es': language = 'español'; break;
        case 'hi': language = 'हिंदी'; break;
        case 'am': language = 'አማርኛ'; break;
        case 'bg': language = 'български'; break;
        case 'fr': language = 'français'; break;
        case 'tr': language = 'Türk'; break;
    }
    document.getElementById("language-display").innerHTML=language;
}