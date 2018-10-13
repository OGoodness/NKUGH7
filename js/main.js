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
        case 'ar': language = 'arabic'; break;
        case 'en': language = 'english'; break;
        case 'tl': language = 'filipino'; break;
        case 'vi': language = 'vietnamese'; break;
        case 'es': language = 'spanish'; break;
        case 'hi': language = 'hindi'; break;
        case 'am': language = 'amharic'; break;
        case 'bg': language = 'bulgarian'; break;
        case 'fr': language = 'french'; break;
        case 'tr': language = 'turkish'; break;
    }
    document.getElementById("language-display").innerHTML=language;
}