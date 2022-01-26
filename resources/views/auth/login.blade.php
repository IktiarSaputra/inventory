<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In Page</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset_login/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('asset_login/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        .bg-gray {
            background: rgba(33, 45, 59, 0.8);
        }

        .btn-gray {
            background: rgba(33, 45, 59, 0.8);
        }

        svg#freepik_stories-login:not(.animated) .animable {
            opacity: 0;
        }

        svg#freepik_stories-login.animated #freepik--background-simple--inject-1 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
            animation-delay: 0s;
        }

        svg#freepik_stories-login.animated #freepik--Shadow--inject-1 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
            animation-delay: 0s;
        }

        svg#freepik_stories-login.animated #freepik--Login--inject-1 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut;
            animation-delay: 0s;
        }

        svg#freepik_stories-login.animated #freepik--Character--inject-1 {
            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomIn;
            animation-delay: 0s;
        }

        @keyframes slideLeft {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomOut {
            0% {
                opacity: 0;
                transform: scale(1.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 1.3rem">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-primary">
                                <svg class="animated" id="freepik_stories-login" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns:svgjs="http://svgjs.com/svgjs">
                                    <g id="freepik--background-simple--inject-1" class="animable"
                                        style="transform-origin: 241.238px 224.087px;">
                                        <path
                                            d="M424,265.32c10.09,46-18.09,75.72-57.11,74.34-18.71-.66-41.05-21.23-59.42-25.81-24-6-44.76,1.77-67.69,2.91-57.05,2.82-56.3-20.46-94.74-50.48-27-21.1-70.57-18.79-85-55.74-17.68-45.17,33-67,71.5-60.3,44.24,7.68,56.49-47.4,124.06-41.3C322,114.94,409.79,196,424,265.32Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 241.238px 224.087px;"
                                            id="elrbmz433wz9" class="animable"></path>
                                        <g id="elzl9yc2u4alg">
                                            <path
                                                d="M424,265.32c10.09,46-18.09,75.72-57.11,74.34-18.71-.66-41.05-21.23-59.42-25.81-24-6-44.76,1.77-67.69,2.91-57.05,2.82-56.3-20.46-94.74-50.48-27-21.1-70.57-18.79-85-55.74-17.68-45.17,33-67,71.5-60.3,44.24,7.68,56.49-47.4,124.06-41.3C322,114.94,409.79,196,424,265.32Z"
                                                style="fill: rgb(255, 255, 255); opacity: 0.9; transform-origin: 241.238px 224.087px;"
                                                class="animable"></path>
                                        </g>
                                    </g>
                                    <g id="freepik--Shadow--inject-1" class="animable"
                                        style="transform-origin: 250px 416.24px;">
                                        <ellipse id="freepik--path--inject-1" cx="250" cy="416.24" rx="193.89"
                                            ry="11.32"
                                            style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;"
                                            class="animable"></ellipse>
                                    </g>
                                    <g id="freepik--Login--inject-1" class="animable"
                                        style="transform-origin: 193.11px 243.48px;">
                                        <path
                                            d="M260.41,365.5H132.84a8.13,8.13,0,0,1-8-7.64L113.4,136.31a7.17,7.17,0,0,1,7.24-7.63H248.21a8.12,8.12,0,0,1,8,7.63l11.42,221.55A7.18,7.18,0,0,1,260.41,365.5Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 190.515px 247.09px;"
                                            id="el7kh9we476ih" class="animable"></path>
                                        <g id="elq66far77jpj">
                                            <path
                                                d="M260.41,365.5H132.84a8.13,8.13,0,0,1-8-7.64L113.4,136.31a7.17,7.17,0,0,1,7.24-7.63H248.21a8.12,8.12,0,0,1,8,7.63l11.42,221.55A7.18,7.18,0,0,1,260.41,365.5Z"
                                                style="fill: rgb(255, 255, 255); opacity: 0.8; transform-origin: 190.515px 247.09px;"
                                                class="animable"></path>
                                        </g>
                                        <rect x="221.51" y="121.46" width="14.11" height="1"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 228.565px 121.96px;"
                                            id="elj449g5ckm6" class="animable"></rect>
                                        <rect x="211.45" y="121.46" width="5.17" height="1"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 214.035px 121.96px;"
                                            id="el1r8a9i51oici" class="animable"></rect>
                                        <path
                                            d="M265.9,351.44h-122a7.77,7.77,0,0,1-7.68-7.29l-10.92-211.9a6.86,6.86,0,0,1,6.93-7.3h122a7.77,7.77,0,0,1,7.67,7.3l10.92,211.9A6.85,6.85,0,0,1,265.9,351.44Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 199.06px 238.195px;"
                                            id="elbqnmktcpa6g" class="animable"></path>
                                        <path
                                            d="M265.9,346.57h-122a2.92,2.92,0,0,1-2.81-2.68L130.16,132a2,2,0,0,1,.54-1.55,2,2,0,0,1,1.52-.62h122a2.92,2.92,0,0,1,2.8,2.68L268,344.4a2,2,0,0,1-2.05,2.17ZM132.22,130.08a1.79,1.79,0,0,0-1.34.54,1.84,1.84,0,0,0-.47,1.37l10.92,211.89a2.67,2.67,0,0,0,2.56,2.44h122a1.74,1.74,0,0,0,1.33-.54,1.76,1.76,0,0,0,.47-1.37L256.78,132.52a2.66,2.66,0,0,0-2.55-2.44Z"
                                            style="fill: rgb(255, 255, 255); transform-origin: 199.08px 238.2px;"
                                            id="elzsz7gmpxrz9" class="animable"></path>
                                        <g id="elto5x2z52ry">
                                            <ellipse cx="196.09" cy="180.61" rx="36" ry="37.9"
                                                style="fill: rgb(255, 255, 255); opacity: 0.3; transform-origin: 196.09px 180.61px; transform: rotate(-45.74deg);"
                                                class="animable"></ellipse>
                                        </g>
                                        <path
                                            d="M226,180.61a28.71,28.71,0,0,1-2.87,14.24,28.07,28.07,0,0,1-25.47,15.65,31.75,31.75,0,0,1-27.08-15.65,30.78,30.78,0,0,1-4.34-14.24,28.09,28.09,0,0,1,28.34-29.88A31.81,31.81,0,0,1,226,180.61Z"
                                            style="fill: rgb(255, 255, 255); transform-origin: 196.115px 180.615px;"
                                            id="eltd97goz51ks" class="animable"></path>
                                        <path
                                            d="M223.1,194.85a28.07,28.07,0,0,1-25.47,15.65,31.75,31.75,0,0,1-27.08-15.65,45.16,45.16,0,0,1,25.86-8A49.14,49.14,0,0,1,223.1,194.85Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 196.825px 198.676px;"
                                            id="el29n95p5r3u6" class="animable"></path>
                                        <g id="eltpnx69zm2ja">
                                            <ellipse cx="195.56" cy="170.39" rx="12.97" ry="13.66"
                                                style="fill: rgb(127, 179, 213 ); transform-origin: 195.56px 170.39px; transform: rotate(-45.74deg);"
                                                class="animable"></ellipse>
                                        </g>
                                        <path
                                            d="M248.41,269H152.88a3.29,3.29,0,0,1-3.25-3.09l-.72-14a2.9,2.9,0,0,1,2.93-3.08h95.53a3.29,3.29,0,0,1,3.25,3.08l.72,14A2.9,2.9,0,0,1,248.41,269Z"
                                            style="fill: rgb(255, 255, 255); transform-origin: 200.125px 258.915px;"
                                            id="elh3hzu8arlz7" class="animable"></path>
                                        <g id="el5by7w3acg2q">
                                            <path
                                                d="M219.16,241.1h-39.9A3.29,3.29,0,0,1,176,238l-.15-3a2.9,2.9,0,0,1,2.93-3.09h39.89a3.29,3.29,0,0,1,3.25,3.09l.16,3A2.92,2.92,0,0,1,219.16,241.1Z"
                                                style="opacity: 0.3; transform-origin: 198.965px 236.505px;"
                                                class="animable"></path>
                                        </g>
                                        <g id="elq1l39wf8e6">
                                            <path
                                                d="M234,336.31H174.23a5.61,5.61,0,0,1-5.53-5.26l-.35-6.9a5,5,0,0,1,5-5.26H233.1a5.61,5.61,0,0,1,5.53,5.26l.35,6.9A5,5,0,0,1,234,336.31Z"
                                                style="opacity: 0.3; transform-origin: 203.665px 327.6px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M250.16,302.86H154.62a3.3,3.3,0,0,1-3.25-3.09l-.72-14a2.91,2.91,0,0,1,2.93-3.09h95.53a3.29,3.29,0,0,1,3.25,3.09l.73,14A2.92,2.92,0,0,1,250.16,302.86Z"
                                            style="fill: rgb(255, 255, 255); transform-origin: 201.87px 292.77px;"
                                            id="elqrm1yt5ikjb" class="animable"></path>
                                        <path
                                            d="M165,258.91a3.22,3.22,0,0,1-3.25,3.42,3.64,3.64,0,0,1-3.59-3.42,3.21,3.21,0,0,1,3.24-3.42A3.65,3.65,0,0,1,165,258.91Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 161.58px 258.91px;"
                                            id="el1q6dht66e7l" class="animable"></path>
                                        <path
                                            d="M175.53,258.91a3.21,3.21,0,0,1-3.24,3.42,3.63,3.63,0,0,1-3.59-3.42,3.21,3.21,0,0,1,3.24-3.42A3.63,3.63,0,0,1,175.53,258.91Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 172.115px 258.91px;"
                                            id="el5i7k8umwryj" class="animable"></path>
                                        <path
                                            d="M186,258.91a3.21,3.21,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.22,3.22,0,0,1,3.25-3.42A3.64,3.64,0,0,1,186,258.91Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 182.58px 258.91px;"
                                            id="el237h5utg3gk" class="animable"></path>
                                        <path
                                            d="M196.55,258.91a3.22,3.22,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.22,3.22,0,0,1,3.24-3.42A3.65,3.65,0,0,1,196.55,258.91Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 193.13px 258.91px;"
                                            id="elnt3tygrdjb" class="animable"></path>
                                        <path
                                            d="M166.77,292.75a3.21,3.21,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.22,3.22,0,0,1,3.25-3.42A3.64,3.64,0,0,1,166.77,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 163.35px 292.75px;"
                                            id="elppvnsq5msia" class="animable"></path>
                                        <path
                                            d="M177.28,292.75a3.22,3.22,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.21,3.21,0,0,1,3.24-3.42A3.65,3.65,0,0,1,177.28,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 173.86px 292.75px;"
                                            id="elvkcwuij6ol" class="animable"></path>
                                        <path
                                            d="M187.79,292.75a3.22,3.22,0,0,1-3.25,3.42,3.63,3.63,0,0,1-3.59-3.42,3.21,3.21,0,0,1,3.24-3.42A3.65,3.65,0,0,1,187.79,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 184.37px 292.75px;"
                                            id="elf4gip5jpi3" class="animable"></path>
                                        <path
                                            d="M198.29,292.75a3.21,3.21,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.22,3.22,0,0,1,3.25-3.42A3.63,3.63,0,0,1,198.29,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 194.87px 292.75px;"
                                            id="elcqwmcy6key4" class="animable"></path>
                                        <path
                                            d="M208.8,292.75a3.21,3.21,0,0,1-3.24,3.42,3.65,3.65,0,0,1-3.6-3.42,3.22,3.22,0,0,1,3.24-3.42A3.65,3.65,0,0,1,208.8,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 205.38px 292.75px;"
                                            id="elygulxtdy" class="animable"></path>
                                        <path
                                            d="M219.31,292.75a3.22,3.22,0,0,1-3.25,3.42,3.64,3.64,0,0,1-3.59-3.42,3.21,3.21,0,0,1,3.24-3.42A3.65,3.65,0,0,1,219.31,292.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 215.89px 292.75px;"
                                            id="elr5wab0jeflf" class="animable"></path>
                                    </g>
                                    <g id="freepik--Character--inject-1" class="animable"
                                        style="transform-origin: 290.067px 260.484px;">
                                        <path
                                            d="M333,176.62c.25.38.38.58.54.85l.45.74c.29.5.55,1,.8,1.49.5,1,1,2,1.4,3a55.2,55.2,0,0,1,2.16,6.09,63.77,63.77,0,0,1,2.38,12.54l.07.79a4.59,4.59,0,0,1,0,.48l0,.53a12.79,12.79,0,0,1-.12,2.08,17.14,17.14,0,0,1-1,3.73,25.81,25.81,0,0,1-3.46,6,42.89,42.89,0,0,1-9.31,8.81l-2.76-3.23a57.35,57.35,0,0,0,6.64-9.19,21,21,0,0,0,2-4.72,9.53,9.53,0,0,0,.33-2.14,4.69,4.69,0,0,0,0-.93l0-.21a1.3,1.3,0,0,0,0-.28l-.12-.7a79.26,79.26,0,0,0-2.72-11c-.58-1.79-1.29-3.52-2-5.21-.35-.85-.75-1.68-1.15-2.48l-.62-1.18-.31-.55-.26-.44Z"
                                            style="fill: rgb(128, 62, 60); transform-origin: 332.478px 200.185px;"
                                            id="elu3ad8z0360i" class="animable"></path>
                                        <path d="M323.7,223.77l3.62,7.65,2.87-6.47s-2.55-5.6-6-5.08Z"
                                            style="fill: rgb(127, 62, 59); transform-origin: 326.945px 225.628px;"
                                            id="elmcnlp1vk39" class="animable"></path>
                                        <polygon
                                            points="329.91 231.8 332.79 227.08 330.19 224.95 327.32 231.42 329.91 231.8"
                                            style="fill: rgb(127, 62, 59); transform-origin: 330.055px 228.375px;"
                                            id="elujv17p6r7t" class="animable"></polygon>
                                        <path
                                            d="M313.63,408.22a10.27,10.27,0,0,0,2.22-.3.22.22,0,0,0,.15-.16.2.2,0,0,0-.09-.2c-.29-.19-2.83-1.83-3.81-1.39a.68.68,0,0,0-.39.56,1.13,1.13,0,0,0,.33,1A2.37,2.37,0,0,0,313.63,408.22Zm1.65-.59c-1.45.3-2.55.25-3-.14a.77.77,0,0,1-.21-.71c0-.17.1-.22.17-.25C312.78,406.29,314.25,407,315.28,407.63Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 313.848px 407.16px;"
                                            id="el1nelhsbspxs" class="animable"></path>
                                        <path
                                            d="M315.8,407.92l.1,0a.22.22,0,0,0,.1-.18c0-.1,0-2.51-.92-3.32a1.05,1.05,0,0,0-.84-.26.69.69,0,0,0-.67.55c-.19.95,1.33,2.75,2.13,3.21Zm-1.43-3.39a.61.61,0,0,1,.44.17,4.53,4.53,0,0,1,.78,2.64c-.8-.64-1.75-2-1.63-2.57,0-.09.07-.21.32-.24Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 314.777px 406.035px;"
                                            id="el06jfbol2sffl" class="animable"></path>
                                        <path
                                            d="M304.19,404.14a.21.21,0,0,0-.14-.34c-.41,0-4-.17-4.82.71l0,.06a.63.63,0,0,0-.09.62,1.11,1.11,0,0,0,.73.73c1.16.36,3.21-.95,4.33-1.76Zm-4.66.63c.45-.48,2.43-.61,3.91-.59-1.55,1.06-2.84,1.56-3.49,1.36a.72.72,0,0,1-.48-.48.27.27,0,0,1,0-.25Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 301.666px 404.884px;"
                                            id="elogfzi0tqcp" class="animable"></path>
                                        <path
                                            d="M304.19,404.14l0,0a.23.23,0,0,0,0-.2c-.05-.08-1.17-2-2.49-2.4a1.45,1.45,0,0,0-1.14.14c-.48.28-.51.61-.45.82.26.93,2.81,1.75,3.91,1.74A.2.2,0,0,0,304.19,404.14Zm-3.59-2a.84.84,0,0,1,.19-.14,1,1,0,0,1,.84-.11c.87.23,1.68,1.35,2.05,1.9-1.19-.13-3-.86-3.15-1.42A.23.23,0,0,1,300.6,402.13Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 302.15px 402.861px;"
                                            id="elt4wpwbdp9x" class="animable"></path>
                                        <path
                                            d="M315.2,147.33c-1,5-3.16,15.81.31,19.13,0,0-1.36,5-10.59,5-10.16,0-4.85-5-4.85-5,5.54-1.32,5.4-5.44,4.43-9.3Z"
                                            style="fill: rgb(127, 62, 59); transform-origin: 307.097px 159.395px;"
                                            id="elmrjbw59qz1d" class="animable"></path>
                                        <path
                                            d="M298.28,135.61a.53.53,0,0,0,.17,0,.4.4,0,0,0,.18-.54,3.94,3.94,0,0,0-2.88-2.2.41.41,0,0,0-.44.35.4.4,0,0,0,.35.44h0a3.14,3.14,0,0,1,2.26,1.77A.4.4,0,0,0,298.28,135.61Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 296.991px 134.243px;"
                                            id="els0wl2su8ww8" class="animable"></path>
                                        <path d="M295.25,140a18.26,18.26,0,0,1-2.92,4,2.91,2.91,0,0,0,2.33.74Z"
                                            style="fill: rgb(99, 15, 15); transform-origin: 293.79px 142.382px;"
                                            id="elv15dwxe1leq" class="animable"></path>
                                        <path
                                            d="M296,138.87c-.08.67-.51,1.17-.94,1.12s-.73-.64-.65-1.31.51-1.17,1-1.12S296.07,138.2,296,138.87Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 295.206px 138.775px;"
                                            id="elnubhkh67bz" class="animable"></path>
                                        <path d="M295.54,137.62,294,137S294.65,138.32,295.54,137.62Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 294.77px 137.412px;"
                                            id="el1kfds2o9esm" class="animable"></path>
                                        <polygon
                                            points="313.02 402.24 304.86 404.14 299.9 385.38 308.06 383.48 313.02 402.24"
                                            style="fill: rgb(127, 62, 59); transform-origin: 306.46px 393.81px;"
                                            id="elisrf2liplb" class="animable"></polygon>
                                        <polygon
                                            points="325.54 407.72 317.17 407.72 317.82 388.33 326.2 388.33 325.54 407.72"
                                            style="fill: rgb(127, 62, 59); transform-origin: 321.685px 398.025px;"
                                            id="elg9q2d810oh7" class="animable"></polygon>
                                        <path
                                            d="M316.5,406.75h9.41a.67.67,0,0,1,.67.58l1.07,7.44a1.34,1.34,0,0,1-1.34,1.49c-3.28-.05-4.86-.25-9-.25-2.55,0-6.27.27-9.78.27s-3.71-3.48-2.24-3.79c6.56-1.42,7.6-3.36,9.81-5.22A2.17,2.17,0,0,1,316.5,406.75Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 316.043px 411.515px;"
                                            id="elg4ovbdfbe9v" class="animable"></path>
                                        <path
                                            d="M304.14,402.89l8.55-3.93a.66.66,0,0,1,.84.24l4.09,6.32a1.35,1.35,0,0,1-.6,1.91c-3,1.32-4.52,1.81-8.28,3.54-2.31,1.06-7,3.5-10.18,5s-4.82-1.61-3.62-2.51c5.37-4,6.91-6.87,8.14-9.48A2.14,2.14,0,0,1,304.14,402.89Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 306.176px 407.634px;"
                                            id="elhzc74rx7a8" class="animable"></path>
                                        <g id="elzh2cpllgxif">
                                            <polygon
                                                points="299.9 385.38 302.56 395.44 310.62 393.15 308.07 383.48 299.9 385.38"
                                                style="opacity: 0.2; transform-origin: 305.26px 389.46px;"
                                                class="animable"></polygon>
                                        </g>
                                        <g id="el115z8anuan1m">
                                            <polygon
                                                points="326.2 388.33 317.82 388.33 317.49 398.33 325.87 398.33 326.2 388.33"
                                                style="opacity: 0.2; transform-origin: 321.845px 393.33px;"
                                                class="animable"></polygon>
                                        </g>
                                        <path
                                            d="M330,168.36c3.48.77,7.2,13.28,7.2,13.28l-9.84,10.47s-8.17-11.76-6.5-16.08C322.55,171.52,325.85,167.46,330,168.36Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 328.917px 180.172px;"
                                            id="elfd81zah3gbm" class="animable"></path>
                                        <g id="el86ev0igsfda">
                                            <path
                                                d="M324.44,176.33c-1.76-1.61-2.95-1.13-3.76.15-.8,3.72,3.94,11.51,5.85,14.46C327.41,187.42,328.42,180,324.44,176.33Z"
                                                style="opacity: 0.4; transform-origin: 323.96px 183.124px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M285.91,168.61s-4,1.4,4,50.55h34c-.57-13.84-.59-22.38,6-50.8a100.28,100.28,0,0,0-14.45-1.9,107.4,107.4,0,0,0-15.44,0C293.43,167.07,285.91,168.61,285.91,168.61Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 307.41px 192.671px;"
                                            id="eljkkzvqcnlx" class="animable"></path>
                                        <g id="el6v5bkbhug8w">
                                            <path
                                                d="M285.6,187.47c.22,2.39.51,5.08.89,8.12,2.79-2.51,5.07-9.65,4.23-13.81A24.59,24.59,0,0,0,285.6,187.47Z"
                                                style="opacity: 0.4; transform-origin: 288.248px 188.685px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M289.24,180a148.06,148.06,0,0,1-6.19,13.55,83.26,83.26,0,0,1-8,13l-.64.79-.32.39c-.11.13-.2.25-.37.43a12.44,12.44,0,0,1-2,1.76,16.3,16.3,0,0,1-4.18,2.08,30.53,30.53,0,0,1-8,1.42,59.36,59.36,0,0,1-15.16-1.35l.55-4.2c2.3,0,4.71,0,7-.19a56.44,56.44,0,0,0,6.86-.76,27,27,0,0,0,6.14-1.72,9.17,9.17,0,0,0,2.21-1.34,4.57,4.57,0,0,0,.69-.72s.12-.16.2-.27l.23-.33.47-.66a99.14,99.14,0,0,0,6.69-12.11c2-4.25,4-8.66,5.83-13Z"
                                            style="fill: rgb(128, 62, 60); transform-origin: 266.81px 195.118px;"
                                            id="eld7ieujg3okw" class="animable"></path>
                                        <path
                                            d="M285.91,168.61c-4.17,1-9.29,12.44-9.29,12.44l8.64,12.7s11.51-14.49,10.14-18.91C294,170.23,291,167.37,285.91,168.61Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 286.067px 181.035px;"
                                            id="elbnzfjwaok7w" class="animable"></path>
                                        <path d="M247.33,208.51l-7.21-3.33-.72,7.17s6,1.77,9,0Z"
                                            style="fill: rgb(127, 62, 59); transform-origin: 243.9px 209.158px;"
                                            id="elmm006n37q8m" class="animable"></path>
                                        <polygon
                                            points="235.81 204.46 235.12 209.92 239.4 212.35 240.12 205.18 235.81 204.46"
                                            style="fill: rgb(127, 62, 59); transform-origin: 237.62px 208.405px;"
                                            id="eltj4omry3smh" class="animable"></polygon>
                                        <path
                                            d="M318.82,139.36c-1.53,8.17-2,11.67-6.68,15.38-7,5.58-16.75,1.92-17.69-6.54-.86-7.62,1.78-19.7,10.25-22A11.33,11.33,0,0,1,318.82,139.36Z"
                                            style="fill: rgb(127, 62, 59); transform-origin: 306.669px 141.599px;"
                                            id="el5qby9s423o" class="animable"></path>
                                        <path
                                            d="M300.87,141.08c-.47,4.17-.65,15,8.51,15.34,11.21.41,14.57-9.17,13.57-13,5.84-4.75,6.68-12.92.12-19.17s-21-2.76-25,3.33C293,135.13,300.87,141.08,300.87,141.08Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 312.017px 138.692px;"
                                            id="elv1j1jxvc3n9" class="animable"></path>
                                        <path
                                            d="M312.1,126.68c-.54-4.4-.12-7.43,4-7.43s9.74,1.49,11.8,5.7,2.23,10.8-3.52,10.13S312.75,131.94,312.1,126.68Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 320.56px 127.189px;"
                                            id="eljz5qiemu7bp" class="animable"></path>
                                        <path
                                            d="M318.48,125.62c-1-5.24,3.69-20,15.08-21,5.28-.45,7.72,5.23,5,6.17,5-.06,8.2,6.55,3.54,7.54,3.68,2.36,2.77,7.2-2.48,9.58C335.71,129.71,319.83,132.88,318.48,125.62Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 331.357px 117.383px;"
                                            id="el6z0cl2s01c8" class="animable"></path>
                                        <path
                                            d="M330.65,131.25c-3.67,0-7.5-.54-9.88-2.13a4.89,4.89,0,0,1-2.35-3.8.26.26,0,0,1,.23-.27.24.24,0,0,1,.27.23,4.46,4.46,0,0,0,2.13,3.43c4.53,3,15,2,18.26,1,2.82-.92,4.73-2.71,5.11-4.77a4.14,4.14,0,0,0-1.67-4,.24.24,0,0,1,0-.35.25.25,0,0,1,.35,0,4.66,4.66,0,0,1,1.85,4.53c-.41,2.25-2.44,4.17-5.44,5.15A32.69,32.69,0,0,1,330.65,131.25Z"
                                            style="fill: rgb(38, 50, 56); transform-origin: 331.717px 125.89px;"
                                            id="el4inagxqts4u" class="animable"></path>
                                        <path
                                            d="M298.32,140a6.15,6.15,0,0,0-1.07,4.51c.33,2.1,2.37,2.24,3.85.9s2.77-3.76,1.68-5.5A2.62,2.62,0,0,0,298.32,140Z"
                                            style="fill: rgb(127, 62, 59); transform-origin: 300.182px 142.494px;"
                                            id="elfjx9yfv24t5" class="animable"></path>
                                        <path
                                            d="M298.89,219.16s4.86,57.49,9.91,89.89c4.07,26.17,7.29,87.34,7.29,87.34h11.42s4.06-59.34,2-85.22c-5.23-65.5,6.44-70.84-5.57-92Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 314.492px 307.775px;"
                                            id="elc0vmddynw9" class="animable"></path>
                                        <g id="el7kzjg0jz81n">
                                            <path
                                                d="M313.27,240.89a55.8,55.8,0,0,0-10.79,16.28c1.33,12.92,2.91,27.26,4.59,39.82A110.38,110.38,0,0,0,313.27,240.89Z"
                                                style="opacity: 0.4; transform-origin: 308.482px 268.94px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M290.9,218.8s-10.55,62.79-12.21,91.09c4.14,26.17,21.08,81.49,21.08,81.49l10.39-3.77s-5.75-60.32-12-76.83c14.07-47.37,24.41-59.35,21.4-91.62C312.35,219.16,290.9,218.8,290.9,218.8Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 299.387px 305.09px;"
                                            id="eltmzne0vt7ao" class="animable"></path>
                                        <polygon
                                            points="298.38 394.14 312.42 390.33 311.62 384.73 296.59 388.8 298.38 394.14"
                                            style="fill: rgb(38, 50, 56); transform-origin: 304.505px 389.435px;"
                                            id="elppr8gvcoh7g" class="animable"></polygon>
                                        <polygon
                                            points="314.52 396.62 329.07 396.62 329.83 391.52 314.44 391 314.52 396.62"
                                            style="fill: rgb(38, 50, 56); transform-origin: 322.135px 393.81px;"
                                            id="ell3shsq3yans" class="animable"></polygon>
                                        <path
                                            d="M324.44,217.16l1.53,3.05c.12.24-.16.48-.55.48H289.74c-.3,0-.56-.15-.58-.35l-.31-3c0-.21.25-.39.58-.39h34.45A.63.63,0,0,1,324.44,217.16Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 307.424px 218.817px;"
                                            id="elnkbix3jfzga" class="animable"></path>
                                        <g id="el92q82r8xkfe">
                                            <path
                                                d="M324.44,217.16l1.53,3.05c.12.24-.16.48-.55.48H289.74c-.3,0-.56-.15-.58-.35l-.31-3c0-.21.25-.39.58-.39h34.45A.63.63,0,0,1,324.44,217.16Z"
                                                style="opacity: 0.5; transform-origin: 307.424px 218.817px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M319.81,221h.92c.19,0,.33-.1.32-.21l-.44-4c0-.12-.17-.21-.35-.21h-.93c-.18,0-.32.09-.31.21l.43,4C319.47,220.92,319.63,221,319.81,221Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 320.035px 218.79px;"
                                            id="el6w7szqqge97" class="animable"></path>
                                        <path
                                            d="M307.43,191.88a.52.52,0,0,1-.49-.37c-3.26-12.06-10-22-13.27-23.5a1.14,1.14,0,0,0-.85-.14.5.5,0,1,1-.41-.91,2,2,0,0,1,1.68.14c3.46,1.64,10.3,11.44,13.72,23.77,2.45,0,6.23-.33,7.15-.41,1.14-1.36,9.52-11.84,6.39-23.31a.49.49,0,0,1,.35-.61.5.5,0,0,1,.61.35c3.49,12.76-6.63,24.27-6.74,24.38a.46.46,0,0,1-.32.17C315.2,191.44,310.21,191.88,307.43,191.88Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 307.564px 179.202px;"
                                            id="elcpjjmylygg" class="animable"></path>
                                        <path
                                            d="M324,198.94c-5.45-10.21-7.68-10.93-8.65-14.21a17,17,0,0,1,3.1-5c-.66-.19-2.08-.47-3-.64.1-.45.21-.89.31-1.32a9.54,9.54,0,0,0-3,.14l0-1a13,13,0,0,0-3.87-.25q.17.71.33,1.44c-1,.19-2.52.5-3.25.71a14.4,14.4,0,0,1,3.05,5.57c-2.94,5.05-14.36,37.51,4.22,40S329.44,209.16,324,198.94Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 315.384px 200.615px;"
                                            id="elckr38nee8ql" class="animable"></path>
                                        <g id="ell6kzem558uc">
                                            <path
                                                d="M324,198.94c-5.45-10.21-7.68-10.93-8.65-14.21a17,17,0,0,1,3.1-5c-.66-.19-2.08-.47-3-.64.1-.45.21-.89.31-1.32a9.54,9.54,0,0,0-3,.14l0-1a13,13,0,0,0-3.87-.25q.17.71.33,1.44c-1,.19-2.52.5-3.25.71a14.4,14.4,0,0,1,3.05,5.57c-2.94,5.05-14.36,37.51,4.22,40S329.44,209.16,324,198.94Z"
                                                style="fill: rgb(255, 255, 255); opacity: 0.4; transform-origin: 315.384px 200.615px;"
                                                class="animable"></path>
                                        </g>
                                        <path
                                            d="M308.26,183.41a6.29,6.29,0,0,0-.15,1.57c0,.37,1,.62,2.11.73s5.77.29,5.62-.23.23-1.23.25-1.67-1.85-.46-3.42-.4S308.57,182.85,308.26,183.41Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 312.099px 184.503px;"
                                            id="el6s5hhftxw6y" class="animable"></path>
                                        <path
                                            d="M297.45,221h.92c.18,0,.32-.1.31-.21l-.43-4c0-.12-.17-.21-.36-.21H297c-.18,0-.32.09-.31.21l.43,4C297.1,220.92,297.26,221,297.45,221Z"
                                            style="fill: rgb(127, 179, 213 ); transform-origin: 297.685px 218.79px;"
                                            id="elcssd57tjp7" class="animable"></path>
                                    </g>
                                    <defs>
                                        <filter id="active" height="200%">
                                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                                radius="2"></feMorphology>
                                            <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                                            </feComposite>
                                            <feMerge>
                                                <feMergeNode in="OUTLINE"></feMergeNode>
                                                <feMergeNode in="SourceGraphic"></feMergeNode>
                                            </feMerge>
                                        </filter>
                                        <filter id="hover" height="200%">
                                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                                radius="2"></feMorphology>
                                            <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                                            </feComposite>
                                            <feMerge>
                                                <feMergeNode in="OUTLINE"></feMergeNode>
                                                <feMergeNode in="SourceGraphic"></feMergeNode>
                                            </feMerge>
                                            <feColorMatrix type="matrix"
                                                values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                                            </feColorMatrix>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password" id="password"
                                                placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember"
                                                    id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user text-light btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset_login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset_login/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset_login/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset_login/js/sb-admin-2.min.js') }}"></script>

</body>

</html>




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
