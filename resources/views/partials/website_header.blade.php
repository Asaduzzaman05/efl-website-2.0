<div class="preloader-bg"></div>
<div class="container">
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="container">
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper logo-default">
            <a class="logo earth-logo" href="{{ url('/') }}">
                 <img src="{{ asset('public/website/assets/images/logo/image.png') }}" class="logo-img" alt="">
                 {{-- <svg width="" height="" viewBox="0 0 574 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M137.89 55.89H152.4L151.55 64H128.34L132.93 20.16H156.14L155.29 28.27H140.78L139.76 38.01H151.83L150.98 46.15H138.91L137.89 55.89Z" fill="#656464"/>
                    <path d="M195.76 48.37L194.13 63.99H185.42L190.01 20.15H209.23C210.97 20.15 212.42 20.73 213.56 21.89C214.72 23.06 215.21 24.48 215.03 26.14L213.84 37.44C213.54 40.31 212.2 42.6 209.79 44.31C211.83 46.02 212.7 48.33 212.41 51.23L211.07 64H202.36L203.7 51.23C203.78 50.44 203.54 49.75 202.97 49.18C202.4 48.64 201.71 48.38 200.88 48.38H195.75L195.76 48.37ZM201.75 40.26C202.58 40.26 203.33 39.98 204.01 39.43C204.69 38.89 205.07 38.23 205.15 37.44L206.11 28.27H197.87L196.61 40.27H201.74L201.75 40.26Z" fill="#656464"/>
                    <path d="M225.75 28.27H217.25L218.1 20.16H243.75L242.9 28.27H234.43L230.69 64H222.01L225.75 28.27Z" fill="#656464"/>
                    <path d="M253.41 46.14L251.54 63.99H242.83L247.42 20.15H256.13L254.26 38H262.5L264.37 20.15H273.08L268.49 63.99H259.78L261.65 46.14H253.41Z" fill="#656464"/>
                    <path d="M291.05 20.16H314.26L313.41 28.27H298.9L297.88 38.01H309.95L309.1 46.15H297.03L295.16 64H286.45L291.04 20.16H291.05Z" fill="#656464"/>
                    <path d="M358.33 28.27H350.09L349.36 35.19C349.17 37.07 350.44 38.01 353.19 38.01C356.78 38.01 359.68 38.97 361.87 40.89C364.21 42.93 365.21 45.62 364.87 48.97L363.92 58.01C363.74 59.67 362.95 61.08 361.55 62.26C360.17 63.42 358.61 64 356.86 64H344.06C342.32 64 340.87 63.42 339.73 62.26C338.57 61.09 338.08 59.67 338.26 58.01L339.18 49.18H347.89L347.2 55.89H355.44L356.17 48.97C356.36 47.09 355.09 46.15 352.34 46.15C348.75 46.15 345.85 45.19 343.66 43.27C341.3 41.23 340.3 38.54 340.66 35.19L341.61 26.15C341.79 24.49 342.58 23.08 343.98 21.9C345.36 20.74 346.92 20.16 348.67 20.16H361.47C363.21 20.16 364.66 20.74 365.8 21.9C366.96 23.07 367.45 24.49 367.27 26.15L366.35 34.96H357.64L358.34 28.28L358.33 28.27Z" fill="#656464"/>
                    <path d="M378.48 46.14L376.61 63.99H367.9L372.49 20.15H381.2L379.33 38H387.57L389.44 20.15H398.15L393.56 63.99H384.85L386.72 46.14H378.48Z" fill="#656464"/>
                    <path d="M399.44 63.99L404.03 20.15H412.74L408.15 63.99H399.44Z" fill="#656464"/>
                    <path d="M437.43 20.16C439.17 20.16 440.62 20.74 441.76 21.9C442.92 23.07 443.41 24.49 443.23 26.15L439.9 58.02C439.72 59.68 438.93 61.09 437.53 62.27C436.15 63.43 434.59 64.01 432.84 64.01H420.04C418.3 64.01 416.85 63.43 415.71 62.27C414.55 61.1 414.06 59.68 414.24 58.02L417.57 26.15C417.75 24.49 418.54 23.08 419.94 21.9C421.32 20.74 422.88 20.16 424.63 20.16H437.43ZM426.06 28.27L423.17 55.89H431.41L434.3 28.27H426.06Z" fill="#656464"/>
                    <path d="M456.63 35.75L453.67 63.99H444.96L449.55 20.15H461.62L465.77 48.52L468.74 20.15H477.45L472.86 63.99H460.81L456.62 35.75H456.63Z" fill="#656464"/>
                    <path d="M490.85 63.99L495.44 20.15H504.15L500.41 55.88H512.48L511.63 63.99H490.85Z" fill="#656464"/>
                    <path d="M519.59 28.27H511.09L511.94 20.16H537.59L536.74 28.27H528.27L524.53 64H515.85L519.59 28.27Z" fill="#656464"/>
                    <path d="M539.38 20.16H558.6C560.34 20.16 561.79 20.74 562.93 21.9C564.09 23.07 564.58 24.49 564.4 26.15L561.58 53.04C561.24 56.39 559.69 59.09 556.92 61.12C554.31 63.04 551.21 64 547.62 64H534.8L539.39 20.16H539.38ZM547.23 28.27L544.34 55.89H548.46C551.21 55.89 552.68 54.94 552.87 53.04L555.47 28.27H547.23Z" fill="#656464"/>
                    <path d="M573.78 55.86L572.93 63.97H563.76L564.61 55.86H573.78Z" fill="#656464"/>
                    <path d="M171.88 33.49L173.28 55.11L173.35 55.84L174.05 63.99H182.89L179.01 20.16H167.43L154.34 63.99H163.15L171.88 33.49Z" fill="#656464"/>
                    <path d="M324.43 33.49L325.83 55.11L325.89 55.84L326.6 63.99H335.43L331.55 20.16H319.97L306.88 63.99H315.69L324.43 33.49Z" fill="#656464"/>
                    <path d="M99.56 0H9.23C4.13241 0 0 4.13241 0 9.23V99.56C0 104.658 4.13241 108.79 9.23 108.79H99.56C104.658 108.79 108.79 104.658 108.79 99.56V9.23C108.79 4.13241 104.658 0 99.56 0Z" fill="url(#paint0_linear_437_290)"/>
                    <path d="M42.9196 34.1801C39.3396 34.1801 36.2896 36.9801 35.9696 40.5501L32.9596 75.3601L42.0196 75.4001L44.8496 43.2701H75.6096L76.5796 34.1801H42.9196Z" fill="url(#paint1_linear_437_290)"/>
                    <path d="M87.9896 23.9C85.7796 21.49 82.7296 20.16 79.3896 20.16H35.4796C28.9196 20.16 23.1096 25.49 22.5196 32.04L20.9096 49.99H15.1196L14.3496 59.08H20.0996L18.5896 75.96C18.2896 79.31 19.3396 82.49 21.5596 84.91C23.7696 87.32 26.8196 88.65 30.1596 88.65H86.4296L87.1996 79.56H30.1596C29.3996 79.56 28.7296 79.28 28.2596 78.78C27.7896 78.27 27.5696 77.55 27.6396 76.78L29.2196 59.09H88.5796L88.6396 58.37H88.6696L90.9496 32.86C91.2496 29.51 90.1996 26.33 87.9796 23.91L87.9896 23.9ZM31.5696 32.84C31.7396 30.96 33.5996 29.24 35.4696 29.24H79.3796C80.1396 29.24 80.8196 29.52 81.2796 30.02C81.7496 30.53 81.9696 31.25 81.8996 32.02L80.2896 49.97H30.0296L31.5596 32.83L31.5696 32.84Z" fill="url(#paint2_linear_437_290)"/>
                    <path d="M132.08 77.8L131.33 81.66H135.77L135.52 82.97H131.07L130.07 88.13H128.73L130.99 76.51H137.48L137.23 77.81H132.08V77.8Z" fill="url(#paint3_linear_437_290)"/>
                    <path d="M154.77 86.21H148.88L147.73 88.11H146.17L153.5 76.35H153.79L156.56 88.11H155.2L154.78 86.21H154.77ZM154.51 85.07L153.17 79.1L149.56 85.07H154.5H154.51Z" fill="url(#paint4_linear_437_290)"/>
                    <path d="M169.09 85.89L170.13 85.16C170.72 86.33 171.67 86.96 172.97 86.96C174.2 86.96 175.33 86.36 175.56 85.32C175.87 83.87 174.14 82.97 173.17 82.45C172.03 81.82 170.58 80.92 170.99 79.03C171.31 77.49 172.85 76.36 174.7 76.36C176.28 76.36 177.45 77.27 177.75 78.48L176.67 79.18C176.45 78.27 175.59 77.64 174.5 77.64C173.32 77.64 172.45 78.41 172.28 79.27C172.03 80.48 173.32 81.07 174.41 81.67C175.86 82.49 177.27 83.62 176.89 85.39C176.55 87.04 175.02 88.26 172.79 88.26C170.79 88.26 169.64 87.23 169.1 85.88L169.09 85.89Z" fill="url(#paint5_linear_437_290)"/>
                    <path d="M200.19 76.53L197.94 88.11H196.6L197.6 82.96H192.18L191.18 88.11H189.84L192.09 76.53H193.43L192.43 81.67H197.85L198.85 76.53H200.19Z" fill="url(#paint6_linear_437_290)"/>
                    <path d="M214.41 76.53H215.75L213.5 88.11H212.16L214.41 76.53Z" fill="url(#paint7_linear_437_290)"/>
                    <path d="M228.23 82.36C228.76 78.89 231.63 76.25 234.79 76.38C237.82 76.5 239.7 79.1 239.17 82.45C238.62 85.96 235.71 88.46 232.6 88.33C229.6 88.21 227.73 85.69 228.23 82.36ZM237.83 82.42C238.28 79.8 236.83 77.72 234.55 77.67C232.2 77.62 230.02 79.75 229.58 82.36C229.15 84.93 230.56 86.95 232.84 87.01C235.14 87.08 237.37 85.09 237.83 82.42Z" fill="url(#paint8_linear_437_290)"/>
                    <path d="M262.82 76.5L260.53 88.29H260.41L254.68 79.47L253 88.13H251.66L253.95 76.35H254.07L259.78 85.15L261.47 76.5H262.81H262.82Z" fill="url(#paint9_linear_437_290)"/>
                    <path d="M293.11 76.53H294.451L292.201 88.11H290.86L293.11 76.53Z" fill="url(#paint10_linear_437_290)"/>
                    <path d="M306.12 85.89L307.16 85.16C307.75 86.33 308.7 86.96 310 86.96C311.23 86.96 312.36 86.36 312.59 85.32C312.9 83.87 311.171 82.97 310.201 82.45C309.061 81.82 307.61 80.92 308.02 79.03C308.34 77.49 309.88 76.36 311.73 76.36C313.31 76.36 314.48 77.27 314.78 78.48L313.701 79.18C313.481 78.27 312.62 77.64 311.53 77.64C310.35 77.64 309.48 78.41 309.31 79.27C309.06 80.48 310.35 81.07 311.44 81.67C312.89 82.49 314.301 83.62 313.921 85.39C313.581 87.04 312.05 88.26 309.82 88.26C307.82 88.26 306.67 87.23 306.13 85.88L306.12 85.89Z" fill="url(#paint11_linear_437_290)"/>
                    <path d="M343.46 82.36C343.99 78.89 346.86 76.25 350.02 76.38C353.05 76.5 354.93 79.1 354.4 82.45C353.85 85.96 350.94 88.46 347.83 88.33C344.83 88.21 342.96 85.69 343.46 82.36ZM353.06 82.42C353.51 79.8 352.06 77.72 349.78 77.67C347.43 77.62 345.25 79.75 344.81 82.36C344.38 84.93 345.79 86.95 348.07 87.01C350.37 87.08 352.6 85.09 353.06 82.42Z" fill="url(#paint12_linear_437_290)"/>
                    <path d="M367.68 83.54L369.04 76.53H370.39L369.03 83.54C368.66 85.47 369.61 86.97 371.3 86.97C372.84 86.97 374.2 85.86 374.65 83.54L376.01 76.53H377.36L376 83.54C375.38 86.71 373.38 88.29 371.09 88.29C368.52 88.29 367.18 86.12 367.68 83.54Z" fill="url(#paint13_linear_437_290)"/>
                    <path d="M394.85 83.46L397.29 88.12H395.81L393.53 83.6H391.421L390.54 88.12H389.201L391.44 76.54H394.56C396.56 76.54 398.25 77.97 397.87 80.27C397.61 81.8 396.53 83.07 394.84 83.47L394.85 83.46ZM394.37 77.82H392.55L391.65 82.48H393.46C395.17 82.48 396.32 81.52 396.54 80.22C396.78 78.8 395.75 77.81 394.38 77.81L394.37 77.82Z" fill="url(#paint14_linear_437_290)"/>
                    <path d="M428.74 76.53H431.98C434.02 76.53 435.72 77.99 435.35 80.33C435.03 82.43 433.25 83.84 430.56 83.84H428.671L427.85 88.11H426.5L428.75 76.53H428.74ZM434.05 80.32C434.3 78.8 433.1 77.82 431.72 77.82H429.83L428.91 82.54H430.8C432.63 82.55 433.83 81.66 434.05 80.32Z" fill="url(#paint15_linear_437_290)"/>
                    <path d="M453.28 86.21H447.391L446.24 88.11H444.68L452.01 76.35H452.3L455.07 88.11H453.71L453.29 86.21H453.28ZM453.02 85.07L451.68 79.1L448.07 85.07H453.01H453.02Z" fill="url(#paint16_linear_437_290)"/>
                    <path d="M467.6 85.89L468.64 85.16C469.23 86.33 470.18 86.96 471.48 86.96C472.71 86.96 473.84 86.36 474.07 85.32C474.38 83.87 472.65 82.97 471.68 82.45C470.54 81.82 469.09 80.92 469.5 79.03C469.82 77.49 471.36 76.36 473.21 76.36C474.79 76.36 475.96 77.27 476.26 78.48L475.18 79.18C474.96 78.27 474.1 77.64 473.01 77.64C471.83 77.64 470.96 78.41 470.79 79.27C470.54 80.48 471.83 81.07 472.92 81.67C474.37 82.49 475.78 83.62 475.4 85.39C475.06 87.04 473.53 88.26 471.3 88.26C469.3 88.26 468.15 87.23 467.61 85.88L467.6 85.89Z" fill="url(#paint17_linear_437_290)"/>
                    <path d="M488.05 85.89L489.09 85.16C489.68 86.33 490.63 86.96 491.93 86.96C493.16 86.96 494.29 86.36 494.52 85.32C494.83 83.87 493.1 82.97 492.13 82.45C490.99 81.82 489.541 80.92 489.951 79.03C490.271 77.49 491.81 76.36 493.66 76.36C495.24 76.36 496.41 77.27 496.71 78.48L495.63 79.18C495.41 78.27 494.55 77.64 493.46 77.64C492.28 77.64 491.41 78.41 491.24 79.27C490.99 80.48 492.28 81.07 493.37 81.67C494.82 82.49 496.23 83.62 495.85 85.39C495.51 87.04 493.98 88.26 491.75 88.26C489.75 88.26 488.6 87.23 488.06 85.88L488.05 85.89Z" fill="url(#paint18_linear_437_290)"/>
                    <path d="M511.04 76.53H512.38L510.13 88.11H508.79L511.04 76.53Z" fill="url(#paint19_linear_437_290)"/>
                    <path d="M524.87 82.36C525.4 78.89 528.27 76.25 531.43 76.38C534.46 76.5 536.34 79.1 535.81 82.45C535.26 85.96 532.35 88.46 529.24 88.33C526.24 88.21 524.37 85.69 524.87 82.36ZM534.461 82.42C534.911 79.8 533.46 77.72 531.18 77.67C528.83 77.62 526.651 79.75 526.211 82.36C525.781 84.93 527.19 86.95 529.47 87.01C531.77 87.08 534.001 85.09 534.461 82.42Z" fill="url(#paint20_linear_437_290)"/>
                    <path d="M559.461 76.5L557.17 88.29H557.05L551.32 79.47L549.641 88.13H548.3L550.591 76.35H550.711L556.42 85.15L558.11 76.5H559.451H559.461Z" fill="url(#paint21_linear_437_290)"/>
                    <defs>
                    <linearGradient id="paint0_linear_437_290" x1="85.63" y1="106" x2="37.23" y2="26.04" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_437_290" x1="59.0696" y1="61.8701" x2="46.9096" y2="41.7901" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#EBE9EA"/>
                    <stop offset="1" stop-color="#CCCCCC"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_437_290" x1="51.9196" y1="47.08" x2="64.0696" y2="78.26" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#EBE9EA"/>
                    <stop offset="1" stop-color="#C4C4C4"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_437_290" x1="128.73" y1="82.32" x2="137.48" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint4_linear_437_290" x1="146.17" y1="82.23" x2="156.56" y2="82.23" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint5_linear_437_290" x1="169.09" y1="82.32" x2="177.75" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint6_linear_437_290" x1="189.84" y1="82.32" x2="200.19" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint7_linear_437_290" x1="212.16" y1="82.32" x2="215.75" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint8_linear_437_290" x1="228.15" y1="82.35" x2="239.26" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint9_linear_437_290" x1="251.67" y1="82.32" x2="262.82" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint10_linear_437_290" x1="290.86" y1="82.32" x2="294.451" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint11_linear_437_290" x1="306.12" y1="82.32" x2="314.78" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint12_linear_437_290" x1="343.38" y1="82.35" x2="354.49" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint13_linear_437_290" x1="367.57" y1="82.41" x2="377.36" y2="82.41" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint14_linear_437_290" x1="389.211" y1="82.32" x2="397.93" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint15_linear_437_290" x1="426.49" y1="82.32" x2="435.4" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint16_linear_437_290" x1="444.68" y1="82.23" x2="455.07" y2="82.23" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint17_linear_437_290" x1="467.6" y1="82.32" x2="476.26" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint18_linear_437_290" x1="488.05" y1="82.32" x2="496.7" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint19_linear_437_290" x1="508.79" y1="82.32" x2="512.38" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint20_linear_437_290" x1="524.78" y1="82.35" x2="535.89" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint21_linear_437_290" x1="548.31" y1="82.32" x2="559.461" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    </defs>
                </svg> --}}

            </a>
        </div>

        <div class="logo-wrapper logo-sticky">
            <a class="logo earth-logo" href="{{ url('/') }}">
                 <img src="{{ asset('public/website/assets/images/logo/image.png') }}" class="logo-img" alt="">
                 {{-- <svg width="574" height="109" viewBox="0 0 574 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M137.89 55.89H152.4L151.55 64H128.34L132.93 20.16H156.14L155.29 28.27H140.78L139.76 38.01H151.83L150.98 46.15H138.91L137.89 55.89Z" fill="#656464"/>
                    <path d="M195.76 48.37L194.13 63.99H185.42L190.01 20.15H209.23C210.97 20.15 212.42 20.73 213.56 21.89C214.72 23.06 215.21 24.48 215.03 26.14L213.84 37.44C213.54 40.31 212.2 42.6 209.79 44.31C211.83 46.02 212.7 48.33 212.41 51.23L211.07 64H202.36L203.7 51.23C203.78 50.44 203.54 49.75 202.97 49.18C202.4 48.64 201.71 48.38 200.88 48.38H195.75L195.76 48.37ZM201.75 40.26C202.58 40.26 203.33 39.98 204.01 39.43C204.69 38.89 205.07 38.23 205.15 37.44L206.11 28.27H197.87L196.61 40.27H201.74L201.75 40.26Z" fill="#656464"/>
                    <path d="M225.75 28.27H217.25L218.1 20.16H243.75L242.9 28.27H234.43L230.69 64H222.01L225.75 28.27Z" fill="#656464"/>
                    <path d="M253.41 46.14L251.54 63.99H242.83L247.42 20.15H256.13L254.26 38H262.5L264.37 20.15H273.08L268.49 63.99H259.78L261.65 46.14H253.41Z" fill="#656464"/>
                    <path d="M291.05 20.16H314.26L313.41 28.27H298.9L297.88 38.01H309.95L309.1 46.15H297.03L295.16 64H286.45L291.04 20.16H291.05Z" fill="#656464"/>
                    <path d="M358.33 28.27H350.09L349.36 35.19C349.17 37.07 350.44 38.01 353.19 38.01C356.78 38.01 359.68 38.97 361.87 40.89C364.21 42.93 365.21 45.62 364.87 48.97L363.92 58.01C363.74 59.67 362.95 61.08 361.55 62.26C360.17 63.42 358.61 64 356.86 64H344.06C342.32 64 340.87 63.42 339.73 62.26C338.57 61.09 338.08 59.67 338.26 58.01L339.18 49.18H347.89L347.2 55.89H355.44L356.17 48.97C356.36 47.09 355.09 46.15 352.34 46.15C348.75 46.15 345.85 45.19 343.66 43.27C341.3 41.23 340.3 38.54 340.66 35.19L341.61 26.15C341.79 24.49 342.58 23.08 343.98 21.9C345.36 20.74 346.92 20.16 348.67 20.16H361.47C363.21 20.16 364.66 20.74 365.8 21.9C366.96 23.07 367.45 24.49 367.27 26.15L366.35 34.96H357.64L358.34 28.28L358.33 28.27Z" fill="#656464"/>
                    <path d="M378.48 46.14L376.61 63.99H367.9L372.49 20.15H381.2L379.33 38H387.57L389.44 20.15H398.15L393.56 63.99H384.85L386.72 46.14H378.48Z" fill="#656464"/>
                    <path d="M399.44 63.99L404.03 20.15H412.74L408.15 63.99H399.44Z" fill="#656464"/>
                    <path d="M437.43 20.16C439.17 20.16 440.62 20.74 441.76 21.9C442.92 23.07 443.41 24.49 443.23 26.15L439.9 58.02C439.72 59.68 438.93 61.09 437.53 62.27C436.15 63.43 434.59 64.01 432.84 64.01H420.04C418.3 64.01 416.85 63.43 415.71 62.27C414.55 61.1 414.06 59.68 414.24 58.02L417.57 26.15C417.75 24.49 418.54 23.08 419.94 21.9C421.32 20.74 422.88 20.16 424.63 20.16H437.43ZM426.06 28.27L423.17 55.89H431.41L434.3 28.27H426.06Z" fill="#656464"/>
                    <path d="M456.63 35.75L453.67 63.99H444.96L449.55 20.15H461.62L465.77 48.52L468.74 20.15H477.45L472.86 63.99H460.81L456.62 35.75H456.63Z" fill="#656464"/>
                    <path d="M490.85 63.99L495.44 20.15H504.15L500.41 55.88H512.48L511.63 63.99H490.85Z" fill="#656464"/>
                    <path d="M519.59 28.27H511.09L511.94 20.16H537.59L536.74 28.27H528.27L524.53 64H515.85L519.59 28.27Z" fill="#656464"/>
                    <path d="M539.38 20.16H558.6C560.34 20.16 561.79 20.74 562.93 21.9C564.09 23.07 564.58 24.49 564.4 26.15L561.58 53.04C561.24 56.39 559.69 59.09 556.92 61.12C554.31 63.04 551.21 64 547.62 64H534.8L539.39 20.16H539.38ZM547.23 28.27L544.34 55.89H548.46C551.21 55.89 552.68 54.94 552.87 53.04L555.47 28.27H547.23Z" fill="#656464"/>
                    <path d="M573.78 55.86L572.93 63.97H563.76L564.61 55.86H573.78Z" fill="#656464"/>
                    <path d="M171.88 33.49L173.28 55.11L173.35 55.84L174.05 63.99H182.89L179.01 20.16H167.43L154.34 63.99H163.15L171.88 33.49Z" fill="#656464"/>
                    <path d="M324.43 33.49L325.83 55.11L325.89 55.84L326.6 63.99H335.43L331.55 20.16H319.97L306.88 63.99H315.69L324.43 33.49Z" fill="#656464"/>
                    <path d="M99.56 0H9.23C4.13241 0 0 4.13241 0 9.23V99.56C0 104.658 4.13241 108.79 9.23 108.79H99.56C104.658 108.79 108.79 104.658 108.79 99.56V9.23C108.79 4.13241 104.658 0 99.56 0Z" fill="url(#paint0_linear_437_290)"/>
                    <path d="M42.9196 34.1801C39.3396 34.1801 36.2896 36.9801 35.9696 40.5501L32.9596 75.3601L42.0196 75.4001L44.8496 43.2701H75.6096L76.5796 34.1801H42.9196Z" fill="url(#paint1_linear_437_290)"/>
                    <path d="M87.9896 23.9C85.7796 21.49 82.7296 20.16 79.3896 20.16H35.4796C28.9196 20.16 23.1096 25.49 22.5196 32.04L20.9096 49.99H15.1196L14.3496 59.08H20.0996L18.5896 75.96C18.2896 79.31 19.3396 82.49 21.5596 84.91C23.7696 87.32 26.8196 88.65 30.1596 88.65H86.4296L87.1996 79.56H30.1596C29.3996 79.56 28.7296 79.28 28.2596 78.78C27.7896 78.27 27.5696 77.55 27.6396 76.78L29.2196 59.09H88.5796L88.6396 58.37H88.6696L90.9496 32.86C91.2496 29.51 90.1996 26.33 87.9796 23.91L87.9896 23.9ZM31.5696 32.84C31.7396 30.96 33.5996 29.24 35.4696 29.24H79.3796C80.1396 29.24 80.8196 29.52 81.2796 30.02C81.7496 30.53 81.9696 31.25 81.8996 32.02L80.2896 49.97H30.0296L31.5596 32.83L31.5696 32.84Z" fill="url(#paint2_linear_437_290)"/>
                    <path d="M132.08 77.8L131.33 81.66H135.77L135.52 82.97H131.07L130.07 88.13H128.73L130.99 76.51H137.48L137.23 77.81H132.08V77.8Z" fill="url(#paint3_linear_437_290)"/>
                    <path d="M154.77 86.21H148.88L147.73 88.11H146.17L153.5 76.35H153.79L156.56 88.11H155.2L154.78 86.21H154.77ZM154.51 85.07L153.17 79.1L149.56 85.07H154.5H154.51Z" fill="url(#paint4_linear_437_290)"/>
                    <path d="M169.09 85.89L170.13 85.16C170.72 86.33 171.67 86.96 172.97 86.96C174.2 86.96 175.33 86.36 175.56 85.32C175.87 83.87 174.14 82.97 173.17 82.45C172.03 81.82 170.58 80.92 170.99 79.03C171.31 77.49 172.85 76.36 174.7 76.36C176.28 76.36 177.45 77.27 177.75 78.48L176.67 79.18C176.45 78.27 175.59 77.64 174.5 77.64C173.32 77.64 172.45 78.41 172.28 79.27C172.03 80.48 173.32 81.07 174.41 81.67C175.86 82.49 177.27 83.62 176.89 85.39C176.55 87.04 175.02 88.26 172.79 88.26C170.79 88.26 169.64 87.23 169.1 85.88L169.09 85.89Z" fill="url(#paint5_linear_437_290)"/>
                    <path d="M200.19 76.53L197.94 88.11H196.6L197.6 82.96H192.18L191.18 88.11H189.84L192.09 76.53H193.43L192.43 81.67H197.85L198.85 76.53H200.19Z" fill="url(#paint6_linear_437_290)"/>
                    <path d="M214.41 76.53H215.75L213.5 88.11H212.16L214.41 76.53Z" fill="url(#paint7_linear_437_290)"/>
                    <path d="M228.23 82.36C228.76 78.89 231.63 76.25 234.79 76.38C237.82 76.5 239.7 79.1 239.17 82.45C238.62 85.96 235.71 88.46 232.6 88.33C229.6 88.21 227.73 85.69 228.23 82.36ZM237.83 82.42C238.28 79.8 236.83 77.72 234.55 77.67C232.2 77.62 230.02 79.75 229.58 82.36C229.15 84.93 230.56 86.95 232.84 87.01C235.14 87.08 237.37 85.09 237.83 82.42Z" fill="url(#paint8_linear_437_290)"/>
                    <path d="M262.82 76.5L260.53 88.29H260.41L254.68 79.47L253 88.13H251.66L253.95 76.35H254.07L259.78 85.15L261.47 76.5H262.81H262.82Z" fill="url(#paint9_linear_437_290)"/>
                    <path d="M293.11 76.53H294.451L292.201 88.11H290.86L293.11 76.53Z" fill="url(#paint10_linear_437_290)"/>
                    <path d="M306.12 85.89L307.16 85.16C307.75 86.33 308.7 86.96 310 86.96C311.23 86.96 312.36 86.36 312.59 85.32C312.9 83.87 311.171 82.97 310.201 82.45C309.061 81.82 307.61 80.92 308.02 79.03C308.34 77.49 309.88 76.36 311.73 76.36C313.31 76.36 314.48 77.27 314.78 78.48L313.701 79.18C313.481 78.27 312.62 77.64 311.53 77.64C310.35 77.64 309.48 78.41 309.31 79.27C309.06 80.48 310.35 81.07 311.44 81.67C312.89 82.49 314.301 83.62 313.921 85.39C313.581 87.04 312.05 88.26 309.82 88.26C307.82 88.26 306.67 87.23 306.13 85.88L306.12 85.89Z" fill="url(#paint11_linear_437_290)"/>
                    <path d="M343.46 82.36C343.99 78.89 346.86 76.25 350.02 76.38C353.05 76.5 354.93 79.1 354.4 82.45C353.85 85.96 350.94 88.46 347.83 88.33C344.83 88.21 342.96 85.69 343.46 82.36ZM353.06 82.42C353.51 79.8 352.06 77.72 349.78 77.67C347.43 77.62 345.25 79.75 344.81 82.36C344.38 84.93 345.79 86.95 348.07 87.01C350.37 87.08 352.6 85.09 353.06 82.42Z" fill="url(#paint12_linear_437_290)"/>
                    <path d="M367.68 83.54L369.04 76.53H370.39L369.03 83.54C368.66 85.47 369.61 86.97 371.3 86.97C372.84 86.97 374.2 85.86 374.65 83.54L376.01 76.53H377.36L376 83.54C375.38 86.71 373.38 88.29 371.09 88.29C368.52 88.29 367.18 86.12 367.68 83.54Z" fill="url(#paint13_linear_437_290)"/>
                    <path d="M394.85 83.46L397.29 88.12H395.81L393.53 83.6H391.421L390.54 88.12H389.201L391.44 76.54H394.56C396.56 76.54 398.25 77.97 397.87 80.27C397.61 81.8 396.53 83.07 394.84 83.47L394.85 83.46ZM394.37 77.82H392.55L391.65 82.48H393.46C395.17 82.48 396.32 81.52 396.54 80.22C396.78 78.8 395.75 77.81 394.38 77.81L394.37 77.82Z" fill="url(#paint14_linear_437_290)"/>
                    <path d="M428.74 76.53H431.98C434.02 76.53 435.72 77.99 435.35 80.33C435.03 82.43 433.25 83.84 430.56 83.84H428.671L427.85 88.11H426.5L428.75 76.53H428.74ZM434.05 80.32C434.3 78.8 433.1 77.82 431.72 77.82H429.83L428.91 82.54H430.8C432.63 82.55 433.83 81.66 434.05 80.32Z" fill="url(#paint15_linear_437_290)"/>
                    <path d="M453.28 86.21H447.391L446.24 88.11H444.68L452.01 76.35H452.3L455.07 88.11H453.71L453.29 86.21H453.28ZM453.02 85.07L451.68 79.1L448.07 85.07H453.01H453.02Z" fill="url(#paint16_linear_437_290)"/>
                    <path d="M467.6 85.89L468.64 85.16C469.23 86.33 470.18 86.96 471.48 86.96C472.71 86.96 473.84 86.36 474.07 85.32C474.38 83.87 472.65 82.97 471.68 82.45C470.54 81.82 469.09 80.92 469.5 79.03C469.82 77.49 471.36 76.36 473.21 76.36C474.79 76.36 475.96 77.27 476.26 78.48L475.18 79.18C474.96 78.27 474.1 77.64 473.01 77.64C471.83 77.64 470.96 78.41 470.79 79.27C470.54 80.48 471.83 81.07 472.92 81.67C474.37 82.49 475.78 83.62 475.4 85.39C475.06 87.04 473.53 88.26 471.3 88.26C469.3 88.26 468.15 87.23 467.61 85.88L467.6 85.89Z" fill="url(#paint17_linear_437_290)"/>
                    <path d="M488.05 85.89L489.09 85.16C489.68 86.33 490.63 86.96 491.93 86.96C493.16 86.96 494.29 86.36 494.52 85.32C494.83 83.87 493.1 82.97 492.13 82.45C490.99 81.82 489.541 80.92 489.951 79.03C490.271 77.49 491.81 76.36 493.66 76.36C495.24 76.36 496.41 77.27 496.71 78.48L495.63 79.18C495.41 78.27 494.55 77.64 493.46 77.64C492.28 77.64 491.41 78.41 491.24 79.27C490.99 80.48 492.28 81.07 493.37 81.67C494.82 82.49 496.23 83.62 495.85 85.39C495.51 87.04 493.98 88.26 491.75 88.26C489.75 88.26 488.6 87.23 488.06 85.88L488.05 85.89Z" fill="url(#paint18_linear_437_290)"/>
                    <path d="M511.04 76.53H512.38L510.13 88.11H508.79L511.04 76.53Z" fill="url(#paint19_linear_437_290)"/>
                    <path d="M524.87 82.36C525.4 78.89 528.27 76.25 531.43 76.38C534.46 76.5 536.34 79.1 535.81 82.45C535.26 85.96 532.35 88.46 529.24 88.33C526.24 88.21 524.37 85.69 524.87 82.36ZM534.461 82.42C534.911 79.8 533.46 77.72 531.18 77.67C528.83 77.62 526.651 79.75 526.211 82.36C525.781 84.93 527.19 86.95 529.47 87.01C531.77 87.08 534.001 85.09 534.461 82.42Z" fill="url(#paint20_linear_437_290)"/>
                    <path d="M559.461 76.5L557.17 88.29H557.05L551.32 79.47L549.641 88.13H548.3L550.591 76.35H550.711L556.42 85.15L558.11 76.5H559.451H559.461Z" fill="url(#paint21_linear_437_290)"/>
                    <defs>
                    <linearGradient id="paint0_linear_437_290" x1="85.63" y1="106" x2="37.23" y2="26.04" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_437_290" x1="59.0696" y1="61.8701" x2="46.9096" y2="41.7901" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#EBE9EA"/>
                    <stop offset="1" stop-color="#CCCCCC"/>
                    </linearGradient>
                    <linearGradient id="paint2_linear_437_290" x1="51.9196" y1="47.08" x2="64.0696" y2="78.26" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#EBE9EA"/>
                    <stop offset="1" stop-color="#C4C4C4"/>
                    </linearGradient>
                    <linearGradient id="paint3_linear_437_290" x1="128.73" y1="82.32" x2="137.48" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint4_linear_437_290" x1="146.17" y1="82.23" x2="156.56" y2="82.23" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint5_linear_437_290" x1="169.09" y1="82.32" x2="177.75" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint6_linear_437_290" x1="189.84" y1="82.32" x2="200.19" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint7_linear_437_290" x1="212.16" y1="82.32" x2="215.75" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint8_linear_437_290" x1="228.15" y1="82.35" x2="239.26" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint9_linear_437_290" x1="251.67" y1="82.32" x2="262.82" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint10_linear_437_290" x1="290.86" y1="82.32" x2="294.451" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint11_linear_437_290" x1="306.12" y1="82.32" x2="314.78" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint12_linear_437_290" x1="343.38" y1="82.35" x2="354.49" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint13_linear_437_290" x1="367.57" y1="82.41" x2="377.36" y2="82.41" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint14_linear_437_290" x1="389.211" y1="82.32" x2="397.93" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint15_linear_437_290" x1="426.49" y1="82.32" x2="435.4" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint16_linear_437_290" x1="444.68" y1="82.23" x2="455.07" y2="82.23" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint17_linear_437_290" x1="467.6" y1="82.32" x2="476.26" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint18_linear_437_290" x1="488.05" y1="82.32" x2="496.7" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint19_linear_437_290" x1="508.79" y1="82.32" x2="512.38" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint20_linear_437_290" x1="524.78" y1="82.35" x2="535.89" y2="82.35" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    <linearGradient id="paint21_linear_437_290" x1="548.31" y1="82.32" x2="559.461" y2="82.32" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#D61F2A"/>
                    <stop offset="1" stop-color="#EF4C24"/>
                    </linearGradient>
                    </defs>
                </svg> --}}
            </a>

        </div>

        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fa-regular fa-bars"></i></span> </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto " >
                <li id="247" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 247 "><a   title="About" class="nav-link {{ Route::currentRouteName() === 'about.website' ? 'mil-active' : '' }}" href="{{ route('about.website') }}">about us</a></li>
                <li id="247" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 247 "><a   title="Collection" class="nav-link {{ Route::currentRouteName() === 'collection' ? 'mil-active' : '' }}" href="{{ route('collection') }}">collection</a></li>
                <li id="245" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 245 "><a   title="Services" class="nav-link {{ Route::currentRouteName() === 'our_service' ? 'mil-active' : '' }}" href="{{ route('our_service') }}">services</a></li>
                <li id="246" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 246 "><a   title="Careers" class="nav-link {{ Route::currentRouteName() === 'carrers' ? 'mil-active' : '' }}" href="{{ route('carrers') }}">careers</a></li>
                <li id="268" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 268 "><a   title="Blog" class=" nav-link {{ Route::currentRouteName() === 'blog.website' || Route::currentRouteName() === 'blog.details' ? 'mil-active' : '' }}" href="{{ route('blog.website') }}">blog</a></li>
                <li id="264" class="menu-item menu-item-type-post_type menu-item-object-page  nav-item 264 "><a   title="Contact" class=" nav-link {{ Route::currentRouteName() === 'contact.website' ? 'mil-active' : '' }}" href="{{ route('contact.website') }}">contact</a></li>
            </ul>
            {{-- <div class="navbar-right">
                <div class="wrap">
                    <div class="menu-svg">
                        <svg width="40" height="33" viewBox="0 0 40 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="6" fill="#E03D3D"/>
                            <rect y="13" width="40" height="6" fill="#E03D3D"/>
                            <rect y="27" width="40" height="6" fill="#E03D3D"/>
                        </svg>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</nav>
