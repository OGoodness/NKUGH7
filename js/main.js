function languageSelect(id) {
    var languageFlag = document.getElementById(id).src;
    var languageAlt = document.getElementById(id).alt;
    var languageData = document.getElementById(id).getAttribute("data");
    console.log(languageFlag, languageAlt, languageData);
}