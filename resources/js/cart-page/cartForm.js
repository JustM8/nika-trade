import * as yup from "yup";
import i18next from "i18next";
import FormMonster from "../common/form";
import SexyInput from "../common/input";

export const cartForm = (formRef, onSuccess) => {
    const btnRef = formRef.querySelector("[data-btn-submit]");

    const phoneSchema = yup
        .string()
        .required(i18next.t("required"))
        .transform((value) => (value ? value.replace(/\s/g, "") : value))
        .matches(/^[\d+]+$/, i18next.t("invalid_phone"))
        .min(13, i18next.t("field_too_short", { cnt: 19 - 7 }))
        .max(13, i18next.t("field_too_long", { cnt: 13 }));

    new FormMonster({
        elements: {
            $form: formRef,
            $btnSubmit: btnRef,
            showSuccessMessage: false,
            successAction: () => {
                onSuccess && onSuccess();
            },
            fields: {
                company_name: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-company-name]"
                        ),
                        typeInput: "company_name",
                    }),
                    rule: yup
                        .string()
                        .required(i18next.t("required"))
                        .trim()
                        .min(3, i18next.t("invalid_name")),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                phone: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-company-phone]"
                        ),
                        typeInput: "phone",
                        validationSchema: phoneSchema,
                        errorMessage: i18next.t("invalid_phone"),
                    }),
                    rule: phoneSchema,
                    defaultMessage: i18next.t("phone"),
                    valid: false,
                    error: [],
                },
                email: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-company-email]"
                        ),
                        typeInput: "email",
                    }),
                    rule: yup.string().trim(),
                    defaultMessage: i18next.t("email"),
                    valid: false,
                    error: [],
                },
            },
        },
    });
};

window.addEventListener("successFormSendFinished", ({ detail }) => {
    const redirectUrl = detail.redirect_url;
    window.location.href = redirectUrl;
});
