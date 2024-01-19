import * as yup from "yup";
import i18next from "i18next";
import FormMonster from "../common/form";
import SexyInput from "../common/input";

export const cartFormUkraine = (formRef, onSuccess) => {
    const btnRef = formRef.querySelector("[data-btn-submit]");

    new FormMonster({
        elements: {
            $form: formRef,
            $btnSubmit: btnRef,
            showSuccessMessage: false,
            successAction: (data) => {
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
                name: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-recipient-name]"
                        ),
                        typeInput: "name",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                phone_delivery: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-recipient-phone]"
                        ),
                        typeInput: "phone_delivery",
                    }),
                    rule: yup
                        .string()
                        .required(i18next.t("required"))
                        .min(12, i18next.t("field_too_short", { cnt: 19 - 7 })),

                    defaultMessage: i18next.t("phone"),
                    valid: false,
                    error: [],
                },
                city: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-recipient-city]"
                        ),
                        typeInput: "city",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                address: {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-recipient-address]"
                        ),
                        typeInput: "address",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                "delivery_info[carrier]": {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector("[data-field-carrier]"),
                        typeInput: "delivery_info[carrier]",
                    }),
                    rule: yup.string().required(i18next.t("required")).trim(),
                    defaultMessage: i18next.t("name"),
                    valid: false,
                    error: [],
                },
                "delivery_info[branch_number]": {
                    inputWrapper: new SexyInput({
                        animation: "none",
                        $field: formRef.querySelector(
                            "[data-field-carrier-unit]"
                        ),
                        typeInput: "delivery_info[branch_number]",
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
