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