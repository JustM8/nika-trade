import * as yup from "yup";
import i18next from "i18next";
import axios from "axios";
import initView from "./form-view-popup";
import { langDetect } from "./helpers";

const sendForm = async (data) => {
    const response = await axios.post("/order/create", data, {
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });
    return response.data;
};

/*  */
const lang = langDetect();
(async () => {
    await i18next.init({
        lng: lang, // Текущий язык
        debug: true,
        resources: {
            en: {
                // Тексты конкретного языка
                translation: {
                    // Так называемый namespace по умолчанию
                    name: "Name:*",
                    phone: "Phone:*",
                    send: "Send",
                    sending: "Sending",
                    invalid_name: "must contain at least 3 characters",
                    invalid_phone: "must contain only numbers",
                    field_too_short:
                        "phone must be at least {{cnt}} characters",
                    field_too_long: "phone must be at most {{cnt}} characters",
                    only_number: "only digits here",
                    required: "this field is required",
                    sendingSuccessTitle: "Message sent",
                    sendingSuccessText: "Wait for the answers of our managers",
                    sendingErrorText: "Wait for the answers of our managers",
                    sendingErrorTitle: "An error has occurred",
                    send_fail:
                        "The message was not sent due to an unknown server error. Code: [send_fail] ",
                    invalid_form:
                        "The message was not sent for an unknown server error. Code: [invalid_form] ",
                    front_error:
                        "The message was not sent for an unknown server error. Code: [front_error] ",
                    invalid_upload_file:
                        "Error uploading file. Code: [invalid_upload_file] ",
                    invalid_recaptcha:
                        "Please fill in the captcha and try again. Code: [invalid_recaptcha] ",
                    connectionFailed: "Server connection error",
                    // field_too_short: 'this field must consist at least {{cnt}} characters'
                },
            },
            ua: {
                // Тексты конкретного языка
                translation: {
                    // Так называемый namespace по умолчанию
                    name: "Ім’я:*",
                    phone: "Телефон:*",
                    send: "Надіслати",
                    sending: "Відправлення",
                    invalid_name: "Має містити більше 3 символів",
                    invalid_phone: "Має містити тільки цифри",
                    field_too_short:
                        "Телефон має містити принаймні {{cnt}} символів",
                    field_too_long:
                        "Телефон має містити не більше {{cnt}} символів",
                    only_number: "Тут лише цифри",
                    required: "Це поле є обов`язковим",
                    sendingSuccessTitle: "Повідомлення надіслано",
                    sendingSuccessText: "Чекайте відповіді наших менеджерів",
                    sendingErrorText: "Чекайте відповіді наших менеджерів",

                    sendingErrorTitle: "Сталася помилка",
                    send_fail:
                        "Повідомлення не було відправлено через невідому помилку сервера. Код: [send_fail] ",
                    invalid_form:
                        "Повідомлення не було відправлено через невідому помилку сервера. Код: [invalid_form] ",
                    front_error:
                        "Повідомлення не було відправлено через невідому помилку сервера. Код: [front_error] ",
                    invalid_upload_file:
                        "Помилка завантаження файлу. Код: [invalid_upload_file]",
                    invalid_recaptcha:
                        "Заповніть капчу і спробуйте ще раз знову. Код: [invalid_recaptcha]",
                    connectionFailed: "Помилка з'єднання с CRM",
                },
            },
        },
    });
})();
/*  */
export default class FormMonster {
    constructor(setting) {
        this.elements = setting.elements;
        this.$body = document.querySelector("body");
        this.showSuccessMessage = setting.showSuccessMessage || true;

        this.state = {
            serverError: null,
            error: true,
            form: setting.elements.fields,
            status: "filling",
        };

        this.fieldsKey = Object.keys(this.elements.fields);
        this.watchedState = initView(this.state, this.elements);

        this.init();
    }

    validate(formData) {
        const formDataObj = this.fieldsKey.reduce((acc, key) => {
            acc[key] = formData.get(key);
            return acc;
        }, {});

        const shapeObject = this.fieldsKey.reduce((acc, key) => {
            acc[key] = this.elements.fields[key].rule;
            return acc;
        }, {});

        const schema = yup.object().shape(shapeObject);

        try {
            schema.validateSync(formDataObj, { abortEarly: false });
            return null;
        } catch (err) {
            return err.inner;
        }
    }

    changeInput() {
        return (e) => {
            e.preventDefault();
            this.watchedState.status = "filling";
            const formData = new FormData(this.elements.$form);
            const error = this.validate(formData);

            this.fieldsKey.map((key) => {
                const field = this.elements.fields[key];
                field.valid = true;
                field.error = [];
                return null;
            });

            if (error) {
                error.forEach(({ path, message }) => {
                    this.watchedState.form[path].valid = false;
                    this.watchedState.form[path].error.push(message);
                });
                this.watchedState.error = true;
                this.watchedState.status = "renderErrorValidation";
                return null;
            }

            this.watchedState.error = false;
            this.watchedState.status = "renderSuccessValidation";
            return null;
        };
    }

    submitForm() {
        return async (e) => {
            e.preventDefault();

            // Check if form has already been submitted
            if (this.elements.$form.isSubmitted) {
                return;
            }

            this.changeInput()(e);

            if (this.watchedState.error === false) {
                try {
                    this.watchedState.status = "loading";
                    const formData = new FormData(this.elements.$form);
                    formData.append("action", "app");

                    console.log(formData);

                    const { error, code_error, redirect_url } = await sendForm(formData);

                    if (error === 0 || redirect_url) {
                        this.watchedState.status = "successSand";

                        window.dispatchEvent(
                            new CustomEvent("successFormSendFinished", {
                                detail: { redirect_url },
                            })
                        );

                        // Mark the form as submitted
                        this.elements.$form.isSubmitted = true;
                        return true;
                    }

                    this.watchedState.serverError = code_error;
                    this.watchedState.status = "failed";
                } catch (err) {
                    this.watchedState.error = err.message;
                    this.watchedState.serverError = "front_error";
                    this.watchedState.status = "failed";
                }
            }

            return null;
        };
    }

    listers() {
        if (!this.elements.$form.hasEventListener) { // Check if listeners are already attached
            this.elements.$form.addEventListener(
                "submit",
                this.submitForm(this.watchedState)
            );
            this.fieldsKey.map((key) => {
                const { input } = this.elements.fields[key].inputWrapper;
                input.addEventListener(
                    "input",
                    this.changeInput(this.watchedState)
                );
                return null;
            });
            this.elements.$form.hasEventListener = true; // Flag that listeners are attached
        }
    }

    init() {
        this.elements.$form.isSubmitted = false; // Reset the submission flag
        this.listers();
    }
}
