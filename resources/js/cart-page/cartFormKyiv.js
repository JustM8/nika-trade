import * as yup from "yup";
import i18next from "i18next";
import FormMonster from "../common/form";
import SexyInput from "../common/input";

export const cartFormKyiv = (formRef, onSuccess) => {
    const btnRef = formRef.querySelector("[data-btn-submit]");
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
                    rule: yup.string().required(i18next.t("required")).trim(),
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
                    }),
                    rule: yup
                        .string()
                        .required(i18next.t("required"))
                        .min(12, i18next.t("field_too_short", { cnt: 19 - 7 })),

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
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("email"),
                    valid: false,
                    error: [],
                },
                nameKyiv: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector("[data-field-kyiv-name]"),
                        typeInput: "nameKyiv",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                phoneKyiv: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-kyiv-phone]"
                        ),
                        typeInput: "phoneKyiv",
                    }),
                    rule: yup
                        .string()
                        .required(i18next.t("required"))
                        .min(12, i18next.t("field_too_short", { cnt: 19 - 7 })),

                    defaultMessage: i18next.t("phone"),
                    valid: false,
                    error: [],
                },
                addressKyiv: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-kyiv-address]"
                        ),
                        typeInput: "addressKyiv",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
            },
        },
    });
};

window.addEventListener("successFormSendFinished", ({ detail }) => {
    console.log(detail);
    const redirectUrl = detail.redirect_url;
    window.location.href = redirectUrl;
});
