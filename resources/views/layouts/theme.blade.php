<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <meta content="notranslate" name="google">
{{--    <link rel="icon" type="image/png" sizes="16x16" href="../static/favicon.ico">--}}
    <script>document.documentElement.className = "js"; var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e;}; supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables."); </script>
    <title>{{ @$title.' - '.config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="{{asset('/assets/styles/main.min.css')}}">
</head>
<body class="home-page" id="id-home-page">
<!-- START SVG SPRITE-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0" height="0" style="position:absolute">
	
		<symbol id="icon-alert" viewBox="0 0 24 24">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M10.606 2.61a2.75 2.75 0 0 1 3.776 1.019v.001l7.998 13.995v.002a2.751 2.751 0 0 1-2.379 4.123H4.002A2.75 2.75 0 0 1 1.6 17.627v-.002L9.599 3.63V3.63a2.75 2.75 0 0 1 1.008-1.019zm1.384 1.126a1.25 1.25 0 0 0-1.087.634l-.001.002-8 14-.002.003a1.25 1.25 0 0 0 1.094 1.875H20a1.25 1.25 0 0 0 1.08-1.875v-.003l-8-14-.002-.002a1.25 1.25 0 0 0-1.088-.634zM12 8.25a.75.75 0 0 1 .75.75v4a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75zm0 8a.75.75 0 0 0 0 1.5h.01a.75.75 0 0 0 0-1.5H12z" fill="#C8102E"></path>
		</symbol>
	
		<symbol id="icon-arrow" viewBox="0 0 18 18">
			<path d="M18 9H2m0 0l8.047-8M2 9l8.047 8"></path>
		</symbol>
	
		<symbol id="icon-arrow-item" viewBox="0 0 14 14">
			<path d="M1 13h12m0 0V1m0 12L1 1"></path>
		</symbol>
	
		<symbol id="icon-arrow-item-contacts" viewBox="0 0 14 14">
			<path d="M0 7h12m0 0L5.965 1M12 7l-6.035 6" stroke="#C8102E" stroke-width="1.5"></path>
		</symbol>
	
		<symbol id="icon-arrow-to-section" viewBox="0 0 30 32">
			<path d="M1.5 20.679L11.03 30m0 0l9.529-9.321M11.029 30V7.56c0-5.87 6-6.56 7.412-6.56H28.5" stroke="#242424" stroke-width="2" stroke-linecap="round"></path>
		</symbol>
	
		<symbol id="icon-cart" viewBox="0 0 23 22">
			<path d="M7 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM18 21a1 1 0 1 0 0-2 1 1 0 0 0 0 2zM1.05 1.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H4.12"></path>
		</symbol>
	
		<symbol id="icon-cart-map" viewBox="0 0 12 14">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M6 14s6-4.2 6-8.4c0-1.485-.632-2.91-1.757-3.96C9.117.59 7.59 0 6 0 4.409 0 2.883.59 1.757 1.64.632 2.69 0 4.115 0 5.6 0 9.8 6 14 6 14zm2-8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" fill="#C8102E"></path>
		</symbol>
	
		<symbol id="icon-contacts-arrow" viewBox="0 0 12 8">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M.293 7.707a1 1 0 0 0 1.414 0L6 3.414l4.293 4.293a1 1 0 1 0 1.414-1.414l-5-5L6 .586l-.707.707-5 5a1 1 0 0 0 0 1.414z" fill="#242424"></path>
		</symbol>
	
		<symbol id="icon-contacts-mail" viewBox="0 0 24 24">
			<g stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><path d="M22 7l-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></g>
		</symbol>
	
		<symbol id="icon-contacts-map" viewBox="0 0 24 24">
			<g stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 1 1 16 0z"></path><path d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path></g>
		</symbol>
	
		<symbol id="icon-contacts-phone" viewBox="0 0 24 24">
			<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.791 19.791 0 0 1-8.63-3.07 19.502 19.502 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.126.96.36 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" stroke="#242424" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
		</symbol>
	
		<symbol id="icon-epicentr" viewBox="0 0 230 48">
			<g fill="#1060C1"><path d="M25.466 6.523V3.085C25.466 1.366 24.034 0 22.288 0c-1.745 0-3.133 1.41-3.133 3.085V6.48C8.951 7.978 1.076 16.617 1.076 27.063c0 11.46 9.487 20.805 21.124 20.805 11.636 0 21.125-9.345 21.125-20.805-.045-10.358-7.788-18.953-17.858-20.54zM22.2 44.077c-9.533 0-17.276-7.625-17.276-17.014 0-8.33 6.132-15.294 14.232-16.705v3.703c0 1.013.493 1.939 1.254 2.512v3.13h-7.116a2.37 2.37 0 0 0-2.014 1.101c-.403.706-.448 1.543-.045 2.248l8.996 16.882a2.364 2.364 0 0 0 2.058 1.234c.895 0 1.656-.485 2.06-1.234l8.995-16.882c.358-.705.358-1.586-.09-2.248a2.34 2.34 0 0 0-1.969-1.101h-7.116v-3.13a3.076 3.076 0 0 0 1.298-2.512v-3.703c7.967 1.543 13.964 8.463 13.964 16.705 0 9.389-7.743 17.014-17.231 17.014zm128.27-7.273h-6.937v-8.242h5.908v-7.229h-5.908v-7.096h6.266V6.656h-15.71v37.73h16.381v-7.582zm-71.43-22.611h2.954v30.149h9.398V6.656H69.64v37.686h9.399v-30.15zM66.507 36.849h-6.982v-8.287h5.953v-7.229h-5.953V14.15h6.4V6.656H49.992v37.686h16.515v-7.493zm96.494-8.243h2.909v15.78h9.443V6.7h-9.443V20.23h-2.909V6.7h-9.399v37.686h9.399v-15.78zm21.035 15.78h9.399v-30.15h5.639V6.7h-20.633v7.537h5.595v30.149zm-80.113-37.73h-9.399v37.686h9.399V6.656zM131 36.804h-2.014V6.656h-9.488v30.148h-2.954V6.656h-9.488v37.642h17.365V48H131V36.804zm91.168-24.815a6.166 6.166 0 0 0-1.388-2.865c-.716-.793-1.745-1.41-3.133-1.807-1.387-.441-3.356-.617-5.907-.617h-9.533v37.686h9.398V29.179h2.551c2.059 0 3.76-.308 5.013-.881 1.298-.573 2.148-1.455 2.641-2.557.492-1.102.716-2.865.716-5.245V17.19c0-2.336-.134-4.1-.358-5.201zm-9.623 10.005c-2.73 0-4.968-2.203-4.968-4.892 0-2.689 2.238-4.893 4.968-4.893s4.968 2.204 4.968 4.893c0 2.733-2.238 4.892-4.968 4.892z"></path><path d="M212.544 13.4c-2.103 0-3.804 1.674-3.804 3.702 0 2.072 1.701 3.702 3.804 3.702 2.104 0 3.805-1.675 3.805-3.702-.045-2.028-1.746-3.703-3.805-3.703zm.672 6.17l-1.074-2.027v2.027h-1.567v-4.848h1.567v2.071l1.029-2.071h1.835l-1.343 2.424 1.522 2.468-1.969-.044zM228.522 10.799l-.492-.793c-.09-.133-.179-.265-.313-.353a.983.983 0 0 0 .358-.22c.179-.177.224-.397.224-.618 0-.176-.045-.352-.135-.529-.089-.176-.224-.264-.403-.352-.179-.044-.358-.088-.671-.088h-1.477v3.217h.761V9.785h.448c.044 0 .089.044.134.044.045 0 .089.044.134.132.09.089.179.22.269.397l.402.573.045.088h.895l-.179-.22zm-.984-1.807c-.045.044-.09.088-.135.088-.089.044-.179.044-.358.044h-.671v-.617h.761c.179 0 .313.044.358.088a.333.333 0 0 1 .089.22c0 .044-.044.089-.044.177z"></path><path d="M229.373 9.477c0 1.278-1.074 2.336-2.372 2.336-1.298 0-2.372-1.058-2.372-2.336 0-1.279 1.074-2.336 2.372-2.336 1.298-.045 2.372 1.013 2.372 2.336zm-2.372-2.954c-1.656 0-2.999 1.323-2.999 2.954 0 1.63 1.343 2.953 2.999 2.953 1.656 0 2.998-1.322 2.998-2.953 0-1.631-1.387-2.954-2.998-2.954z"></path></g>
		</symbol>
	
		<symbol id="icon-equipment-btn" viewBox="0 0 24 24">
			<rect x="2.75" y="2.75" width="7.5" height="7.5" rx="1.25" stroke="#fff" stroke-width="1.5"></rect><rect x="17.5" y="1.197" width="7.5" height="7.5" rx="1.25" transform="rotate(45 17.5 1.197)" stroke="#fff" stroke-width="1.5"></rect><rect x="2.75" y="13.75" width="7.5" height="7.5" rx="1.25" stroke="#fff" stroke-width="1.5"></rect><rect x="13.75" y="13.75" width="7.5" height="7.5" rx="1.25" stroke="#fff" stroke-width="1.5"></rect>
		</symbol>
	
		<symbol id="icon-icon-list" viewBox="0 0 12 8">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M5.997 2.823l-4.09 4.351L.816 6.147 5.45 1.214l.546-.581.547.581 4.636 4.933-1.093 1.027-4.09-4.35z" fill="#080E14"></path>
		</symbol>
	
		<symbol id="icon-logo" viewBox="0 0 88 42">
			<g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M43.89 7.533c.758.815.6 2.347-.127 2.967-.758.815-2.117.815-2.939-.033L36.78 6.13c-.695-.717-.916-2.054-.095-2.967.822-.913 2.307-.946 3.128 0l4.076 4.37zm34.694 14.021c-7.33-5.478-17.6.066-17.126 9.587.095 2.283.853 4.37 2.243 6.13h-1.453L50.809 24.979l8.563-9.195c.853-.913.885-2.153.158-3-.726-.913-2.18-1.011-3.002-.163l-6.92 7.402V2.217C49.609.75 48.504 0 47.524 0s-2.085.75-2.085 2.217V24.49l-.443.457.443.456v11.87h-3.034l-.031-22.924c0-1.5-1.043-2.413-2.054-2.413s-2.117.88-2.117 2.413v22.858h-3.034V2.413c.064-3.13-4.107-3.13-4.17 0v14.804C25.877 7.37 14.345.327 4.202.065 2.085.033.032 1.728 0 4.37l.032 35.282C0 41.152 1.106 42 2.085 42c.98 0 2.086-.685 2.054-2.38l.032-35.153c12.892.522 25.057 11.74 26.858 26.12v8.674c0 1.272.948 2.315 2.37 2.315h38.265c.38.033.758.033 1.169.033 2.054-.163 4.108-.848 5.814-2.153.063-.065.221-.195.253-.195v.489c0 1.304.98 2.25 2.117 2.25.98 0 2.117-.848 2.054-2.283V22.794C82.944 17.12 78.299 11.87 72.233 12h-8.974c-1.422 0-2.149 1.076-2.149 2.185 0 1.108.885 2.12 2.054 2.152h9.069c2.749-.163 5.719 2.087 6.35 5.217zM72.2 23.772c3.665 0 6.51 3.065 6.572 6.684.032 4.077-3.254 6.816-6.54 6.848-3.381 0-6.541-2.902-6.541-6.75 0-3.945 3.16-6.782 6.51-6.782zm-22.592 6l6.888 7.467h-6.888v-7.467zM83.07 11.837c-2.718 0-4.93-2.283-4.93-5.087s2.212-5.087 4.93-5.087C85.788 1.663 88 3.946 88 6.75s-2.212 5.087-4.93 5.087zm0-1.01c-2.18 0-3.95-1.827-3.95-4.077s1.77-4.076 3.95-4.076S87.02 4.5 87.02 6.75c0 2.217-1.77 4.076-3.95 4.076zM81.428 4.01h1.927c.537 0 .948.13 1.17.391.252.261.378.587.378 1.044 0 .326-.094.62-.284.88-.19.261-.474.424-.885.522.158.065.285.163.348.228.095.13.221.294.348.522 0 .032.252.489.695 1.467H83.86c-.411-.945-.696-1.532-.822-1.728-.126-.196-.284-.294-.41-.294-.032 0-.064 0-.127.033v1.99h-1.074V4.01zm1.042 2.152V4.891h.506c.284 0 .505.066.632.163.126.13.19.261.19.457a.601.601 0 0 1-.19.456c-.127.13-.348.163-.664.163h-.474v.033z" fill="#fff"></path></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h88v42H0z"></path></clipPath></defs>
		</symbol>
	
		<symbol id="icon-mail" viewBox="0 0 24 24">
			<path d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z" stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M22 7l-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" stroke="#242424" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		</symbol>
	
		<symbol id="icon-profile" viewBox="0 0 20 34">
			<g clip-path="url(#a)" fill="#080E14"><path d="M4.654 8.343c0-5.907 2.503-4.567 5.346-4.567 2.844 0 4.95-3.91 4.95 4.567 0 .548-.034 1.082-.098 1.599a7.024 7.024 0 0 0 .866-3.405C15.718 2.927 13.07 0 9.802 0c-.761 0-.445 1.453-1.163 1.424-3.985-.164-4.752 2.344-4.752 5.113a7.02 7.02 0 0 0 .866 3.405 13.018 13.018 0 0 1-.099-1.599zM14.407 18.232l-3.542 7.525-.569-3.958.891-1.532L10 19.83l-1.188.437.891 1.532-.569 3.962-3.55-7.527C2.396 18.86 0 21.378 0 25.134v5.252c0 4.362 3.23 3.555 7.178 3.555h5.644c3.947 0 7.178.807 7.178-3.555v-5.25c0-3.761-2.401-6.28-5.592-6.904h-.001zm2.151 9.064h-2.475v-1.094h2.475v1.094z"></path></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h20v34H0z"></path></clipPath></defs>
		</symbol>
	
</svg>

<!-- END SVG SPRITE-->
<!-- START LOADER-->
<div class="preloader">
    <svg class="preloader__image" width="108" height="88" viewBox="0 0 108 88" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="108" height="88" fill="#C8102E"/>
        <g clip-path="url(#clip0_186_11664)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M53.8894 39.5326C54.6478 40.3478 54.4898 41.8804 53.763 42.5C53.0047 43.3152 51.646 43.3152 50.8244 42.4674L46.7799 38.1304C46.0847 37.413 45.8636 36.0761 46.6851 35.163C47.5066 34.25 48.9917 34.2174 49.8133 35.163L53.8894 39.5326ZM88.5838 53.5543C81.2531 48.0761 70.9838 53.6196 71.4578 63.1413C71.5526 65.4239 72.311 67.5109 73.7013 69.2717H72.2478L60.8093 56.9783L69.3724 47.7826C70.2255 46.8696 70.2571 45.6304 69.5303 44.7826C68.8036 43.8696 67.3501 43.7717 66.5285 44.6196L59.6086 52.0217V34.2174C59.6086 32.75 58.5027 32 57.5232 32C56.5436 32 55.4377 32.75 55.4377 34.2174V56.4891L54.9953 56.9457L55.4377 57.4022V69.2717H52.4043L52.3727 46.3478C52.3727 44.8478 51.33 43.9348 50.3189 43.9348C49.3077 43.9348 48.2018 44.8152 48.2018 46.3478V69.2065H45.1684C45.1684 58.7717 45.1684 46.8696 45.1684 34.413C45.2316 31.2826 41.0607 31.2826 40.9975 34.413C40.9975 39.7609 40.9975 43.8043 40.9975 49.2174C35.8786 39.3696 24.3454 32.3261 14.2025 32.0652C12.0855 32.0326 10.0316 33.7283 10 36.3696L10.0316 71.6522C10 73.1522 11.1059 74 12.0855 74C13.065 74 14.1709 73.3152 14.1393 71.6196L14.1709 36.4674C27.0628 36.9891 39.228 48.2065 41.0291 62.587V68.2609V71.2609C41.0291 72.5326 41.977 73.5761 43.3989 73.5761C59.2294 73.5761 71.205 73.5761 81.6639 73.5761C82.0431 73.6087 82.4223 73.6087 82.833 73.6087C84.8869 73.4456 86.9408 72.7609 88.647 71.4565C88.7102 71.3913 88.8682 71.2609 88.8998 71.2609V71.75C88.8998 73.0543 89.8794 74 91.0169 74C91.9964 74 93.1339 73.1522 93.0707 71.7174C93.0707 66.3043 93.0707 60.2065 93.0707 54.7935C92.9443 49.1196 88.2995 43.8696 82.2327 44H73.2589C71.837 44 71.1102 45.0761 71.1102 46.1848C71.1102 47.2935 71.995 48.3043 73.1641 48.337H82.2327C84.9817 48.1739 87.9519 50.4239 88.5838 53.5543ZM82.2011 55.7717C85.8664 55.7717 88.7102 58.837 88.7734 62.4565C88.805 66.5326 85.5189 69.2717 82.2327 69.3043C78.8517 69.3043 75.6919 66.4022 75.6919 62.5543C75.6919 58.6087 78.8517 55.7717 82.2011 55.7717ZM59.6086 61.7717L66.497 69.2391H59.6086V61.7717ZM93.0707 43.837C90.3533 43.837 88.1415 41.5543 88.1415 38.75C88.1415 35.9457 90.3533 33.663 93.0707 33.663C95.7882 33.663 98 35.9457 98 38.75C98 41.5543 95.7882 43.837 93.0707 43.837ZM93.0707 42.8261C90.8905 42.8261 89.121 41 89.121 38.75C89.121 36.5 90.8905 34.6739 93.0707 34.6739C95.251 34.6739 97.0205 36.5 97.0205 38.75C97.0205 40.9674 95.251 42.8261 93.0707 42.8261ZM91.4277 36.0109H93.3551C93.8923 36.0109 94.3031 36.1413 94.5242 36.4022C94.777 36.663 94.9034 36.9891 94.9034 37.4457C94.9034 37.7717 94.8086 38.0652 94.619 38.3261C94.4294 38.587 94.1451 38.75 93.7343 38.8478C93.8923 38.913 94.0187 39.0109 94.0819 39.0761C94.1767 39.2065 94.3031 39.3696 94.4295 39.5978C94.4295 39.6304 94.6822 40.087 95.1246 41.0652H93.8607C93.4499 40.1196 93.1655 39.5326 93.0391 39.337C92.9127 39.1413 92.7548 39.0435 92.6284 39.0435C92.5968 39.0435 92.5652 39.0435 92.502 39.0761V41.0652H91.4277V36.0109ZM92.4704 38.163V36.8913H92.9759C93.2603 36.8913 93.4815 36.9565 93.6079 37.0543C93.7343 37.1848 93.7975 37.3152 93.7975 37.5109C93.7975 37.7065 93.7343 37.837 93.6079 37.9674C93.4815 38.0978 93.2603 38.1304 92.9444 38.1304H92.4704V38.163Z" fill="white"/>
        </g>
        <defs>
            <clipPath id="clip0_186_11664">
                <rect width="88" height="42" fill="white" transform="translate(10 32)"/>
            </clipPath>
        </defs>
    </svg>
</div>

<!-- END LOADER-->
<!-- START POPUP MODAL-->
<!-- END POPUP MODAL-->
<!-- START MENU-->
<!-- END MENU-->
<!-- --------->
<!-- --------->
<!-- --------->
<!-- --------->
<!-- START HEADER-->

<header class="header">
    <div class="header-inner container">
        <div class="header-top">
          <div class="header-logo-wrap">
            <a class="header-logo" href="index.html">
              <svg class="icon--logo" role="presentation">
                <use xlink:href="#icon-logo"></use>
              </svg>
            </a>
            <p class="header-logo-text text-14">Виробництво торгового, виставкового обладнання та елементів офісних меблів </p>
          </div>
          <div class="header-location">
            <div class="header-location__city">
                <span class="header-location__city-text text-14">Ваше місто </span>
                <span class="header-location__city-current text-14">Київ</span>
            </div>
            <span class="header-location__details text-14">04080 м. Київ, вул. Вікентія Хвойки, 15/15</span>
          </div>
        </div>
        <div class="header-bottom">
          <div class="header-list-wrap">
            <ul class="header-list">
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/')}}">Головна</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/')}}#about">Компанія</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/catalog') }}">Каталог</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/gallery') }}">Галерея</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/services') }}">Послуги</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/')}}#clients">Клієнти</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/news') }}">Новини</a></li>
              <li class="header-list-item"><a class="header-list-link text-s" href="{{ url('/contacts') }}">Контакти</a></li>
            </ul>
          </div>
          <div class="header-call-wrap">
            <ul class="header-number-list">
              <li class="header-number-list__item"><a class="header-number-list__item-link text-18 text-black" href="tel:+(90)28947777">+(90) 28 94 7777</a></li>
              <li class="header-number-list__item"><a class="header-number-list__item-link text-18 text-black" href="tel:+(90)28947777">+(90) 28 94 7777</a></li>
            </ul>
          </div>
          <div class="header-lang-wrap">
            <ul class="lang header-lang">
                <ul class="lang header-lang">
                    <li class="header-lang__item  @if(App::currentLocale()=='ua'){{'header-lang__item--active'}}@endif" data-animate-links>
                        <a class="text-18 text-black" href="{{ url('/locale/ua')}}">UA</a>
                    </li>
                    <li class="header-lang__item @if(App::currentLocale()=='en'){{'header-lang__item--active'}}@endif" data-animate-links>
                        <a class="text-18 text-black" href="{{ url('/locale/en')}}">EN</a>
                    </li>
                    <li class="header-lang__item @if(App::currentLocale()=='ru'){{'header-lang__item--active'}}@endif" data-animate-links>
                        <a class="text-18 text-black" href="{{ url('/locale/ru')}}">RU</a>
                    </li>
                </ul>
            </ul>
          </div>
          <div class="header-callback-wrap"><a class="header-callback" href="#">
              <svg class="icon--mail" role="presentation">
                <use xlink:href="#icon-mail"></use>
              </svg></a></div>
          <div class="header-cart-wrap"> <a class="header-cart" href="cart-page.html">
              <svg class="icon--cart" role="presentation">
                <use xlink:href="#icon-cart"></use>
              </svg>
              <div class="header-cart-amount text-10 text-white" id="cartAmount">
                  @if (Cart::instance('cart')->count() > 0)
                      {{ Cart::instance('cart')->content()->count() }}
 @else
 0                     
                  @endif</div>
              </a></div>
        </div>
    </div>
</header>
@yield('content')
<footer class="footer">
    <div class="footer-wrap">
        <div class="footer-menu-wrap">
            <div class="footer-btn-wrap">
                <button class="footer-up round-btn round-btn-up round-btn--black">
                    <svg class="icon--arrow" role="presentation">
                        <use xlink:href="#icon-arrow"></use>
                    </svg>
                </button>
            </div>
            <div class="footer-contact">
                <h3 class="footer-social-title text-24">Відділ продажів:</h3>
                <div class="footer-contact-item"> <span class="footer-contact-city text-14-uppercase">Київ (головний офіс)</span><a class="footer-contact-link text-14" href="tel:+380504478965"> +38 (050) 447-89-65</a><a class="footer-contact-link text-14" href="mailto:nika@nika-trade.net.ua">nika@nika-trade.net.ua </a><span class="footer-contact-address text-14">Київ, Україна, 04080 вул. Вікентія Хвойки, 15/15</span></div>
                <div class="footer-contact-item"> <span class="footer-contact-city text-14-uppercase">Дніпро (представництво)</span><a class="footer-contact-link text-14" href="tel:+380562386990"> +38 (056) 238-69-90</a><a class="footer-contact-link text-14" href="mailto:alexnika.dp@gmail.com">alexnika.dp@gmail.com</a><span class="footer-contact-address text-14">Дніпро, Україна, 49000 вул. Князя Володимира Великого (кол. Плеханова), 18, 1 поверх</span></div>
            </div>
            <div class="footer-social">
                <h3 class="footer-social-title text-24">Соцмережі:</h3>
                <div class="footer-social-list"> <a class="footer-social-list__item text-14" href="#">Telegram</a><a class="footer-social-list__item text-14" href="#">Viber</a><a class="footer-social-list__item text-14" href="#">Instagram</a><a class="footer-social-list__item text-14" href="#">Facebook</a></div>
            </div>
        </div>
        <div class="footer-bottom">
            <span class="footer-all-rights text-14">© Nika-Trade усі права захищено</span>
            <a class="footer-bottom__link" href="https://smarto.agency/?utm_source=referral&amp;amp;utm_medium=giza-wp.smarto.com.ua">
                <img class="footer-bottom__img" src="{{asset('/assets/images/logo-smart-orange.jpg')}}" alt="Smart Orange">
            </a>
        </div>
    </div>
</footer>
<div class="cart-overlay">
      <div class="cart-overlay-inner">
        <div class="cart-wrap">
          <button class="cart-close"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
<path d="M1 11L11 1L1 11ZM11 11L1 1L11 11Z" fill="#C8102E"/>
<path d="M11 11L1 1M1 11L11 1L1 11Z" stroke="white" stroke-width="2"/>
</svg>
          </button>
          <div class="cart-title text-m text-black-100">Додано у кошик</div>
          <div class="cart-list">
            <div class="cart-list-item">
              <div class="cart-list-item-img"> <img src="" alt=""></div>
              <div class="cart-list-item-descr-wrap"> <span class="cart-list-item-descr__name text-24 text-black-100">Стійка</span>
                <div class="cart-list-item-descr__row"> <span class="cart-list-item-descr__row-size text-14 text-black-100">Розмір товару: </span><span class="cart-list-item-descr__row-size text-14 text-black-100"> </span></div>
                <div class="cart-list-item-descr__row">
                  <div class="cart-list-item-descr__row-code text-14 text-black-100">Артикул:</div>
                  <div class="cart-list-item-descr__row-code text-14 text-black-100"></div>
                </div>
              </div><span class="cart-list-item-descr__quantity">
                <div class="buttons cart-list-item-descr__quantity-btns">
                  <div class="quantity cart-list-item-descr__quantity-num text-14 text-black">0</div>
                  <div class="increment-btn cart-list-item-descr__quantity-increment text-14 text-black">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
</svg>
                  </div>
                  <div class="decrement-btn cart-list-item-descr__quantity-decrement text-14 text-black">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" viewBox="0 0 330 330" xml:space="preserve">
<path id="XMLID_224_" d="M325.606,229.393l-150.004-150C172.79,76.58,168.974,75,164.996,75c-3.979,0-7.794,1.581-10.607,4.394  l-149.996,150c-5.858,5.858-5.858,15.355,0,21.213c5.857,5.857,15.355,5.858,21.213,0l139.39-139.393l139.397,139.393  C307.322,253.536,311.161,255,315,255c3.839,0,7.678-1.464,10.607-4.394C331.464,244.748,331.464,235.251,325.606,229.393z"/>
</svg>
                  </div>
                </div></span><span class="cart-list-item-descr__price text-18 text-black-100">777</span>
              <button class="cart-list-item-delete"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
<path d="M1 11L11 1L1 11ZM11 11L1 1L11 11Z" fill="#C8102E"/>
<path d="M11 11L1 1M1 11L11 1L1 11Z" stroke="white" stroke-width="2"/>
</svg>
              </button>
            </div>
          </div>
          <div class="cart-descr"> <span class="cart-descr-title text-14 text-black-100">Діючі ціни можуть не збігатися з вказаними на сайті. Уточнюйте, будь ласка.</span><span class="cart-descr-price text-18 text-black-100"> Разом</span><span class="cart-descr-price-sum text-18 text-black-100"> </span></div>
          <div class="cart-buttons-wrap"> <a class="cart-buttons__back" href="">
              <svg class="icon--arrow" role="presentation">
                <use xlink:href="#icon-arrow"></use>
              </svg><span class="text-14 text-black-100">Продовжити покупки</span></a><a class="cart-buttons__cart" href="cart-page.html"><span class="text-14 text-white">Перейти у кошик</span>
              <svg class="icon--cart" role="presentation">
                <use xlink:href="#icon-cart"></use>
              </svg></a></div>
        </div>
      </div>
      <div id="label"></div>
      <div class="shopping-cart" id="shopping-cart"></div>
    </div>
    <div class="thank-you-popup overlay">
      <div class="popup">
        <div class="thank-you-popup__text">
          <h1 class="thank-you-popup__title">Your message was sent successfully</h1>
          <p class="thank-you-popup__descr text-descr-uppercase">Thank you for your feedback. Wait for a call from our managers.</p>
          <div class="btn-container btn-container-border">
            <div class="btn-mask">Close</div>
            <button class="btn thank-you-popup__btn">Close</button>
          </div>
        </div>
        <div class="thank-you-popup-icon-wrap">
          <div class="thank-you-popup-icon">
            <svg class="icon--done" role="presentation">
              <use xlink:href="#icon-done"></use>
            </svg>
          </div>
        </div>
      </div>
      <div class="close-popup"></div>
    </div>
<div class="thank-you-popup overlay">
    <div class="popup">
        <div class="thank-you-popup__text">
            <h1 class="thank-you-popup__title">Your message was sent successfully</h1>
            <p class="thank-you-popup__descr text-descr-uppercase">Thank you for your feedback. Wait for a call from our managers.</p>
            <div class="btn-container btn-container-border">
                <div class="btn-mask">Close</div>
                <button class="btn thank-you-popup__btn">Close</button>
            </div>
        </div>
        <div class="thank-you-popup-icon-wrap">
            <div class="thank-you-popup-icon">
                <svg class="icon--done" role="presentation">
                    <use xlink:href="#icon-done"></use>
                </svg>
            </div>
        </div>
    </div>
    <div class="close-popup"></div>
</div>
<div class="contact-popup overlay">
      <div class="contact-popup-inner">
        <div class="contact-popup__text-wrap">
          <div class="contact-popup__text">
            <h1 class="contact-popup__title text-36 text-text">Замовити дзвінок</h1>
            <p class="contact-popup__descr text-16 text-black">Якщо у вас виникли питання, залиште свій номер і ми передзвонимо вам:</p>
          </div>
        </div>
        <div class="contact-popup-form">
          <form data-contact-popup id="popup-form">
            <div class="contact-popup-form-field form-field-input" data-field-input data-field-name data-status="field--inactive">
              <input class="contact-popup-form__input" type="text" name="name" placeholder="Ім`я*">
              <div class="contact-popup-input-message text-descr" data-input-message></div>
            </div>
            <div class="contact-popup-form-field disabled form-field-input" data-field-input data-field-phone data-status="field--inactive">
              <input class="contact-popup-form__input" type="text" name="phone">
              <div class="contact-popup-input-message text-descr" data-input-message></div>
            </div>
            <div class="btn-container">
              <button class="contact-popup__btn btn" type="submit" data-btn-submit><span data-btn-submit-text>Надіслати</span></button>
            </div>
          </form>
        </div>
        <div class="close-popup btn-small close-form"></div>
      </div>
    </div>
@stack('footer-scripts')
</body>
</html>
