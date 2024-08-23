import "jquery";
import "chosen-js";

const translations = {
    en: {
        no_results_text: "No results found",
        placeholder_text_single: "Select an option",
        placeholder_text_multiple: "Select options",
    },
    ua: {
        no_results_text: "Не знайдено жодних результатів",
        placeholder_text_single: "Обиріть зі списку",
        placeholder_text_multiple: "Обиріть зі списку",
    },
    ru: {
        no_results_text: "Не найдено результатов",
        placeholder_text_single: "Выберите опцию",
        placeholder_text_multiple: "Выберите опции",
    },
  
};


function setChosenTranslations(language) {
    const translation = translations[language];

    $("#category").chosen({
        no_results_text: translation.no_results_text,
        placeholder_text_single: translation.placeholder_text_single,
        placeholder_text_multiple: translation.placeholder_text_multiple,
        search_contains: true,
    });

    $("#recommended_id").chosen({
        no_results_text: translation.no_results_text,
        placeholder_text_single: translation.placeholder_text_single,
        placeholder_text_multiple: translation.placeholder_text_multiple,
        search_contains: true,
    });
}


$(document).ready(function () {
    const userLanguage = $("html").attr("lang") || "ua";
    console.log(userLanguage);
    setChosenTranslations(userLanguage); 
});