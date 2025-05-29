<?php
if (isset($_SESSION['dmsmo_isLogin'])) {
    if ($_SESSION['dmsmo_usertype'] == 'administrator' || $_SESSION['dmsmo_usertype'] === 'staff') {
       header('location:' . URL . 'admin');
    } else if ($_SESSION['dmsmo_usertype'] == 'employee') {
        header('location:' . URL . 'users');
    } else {
        header('location:' . URL);
    }
}


?>
<div class="wrapper">
    <div class="container-fluid">
        <svg viewbox="0 0 0 0" width="0" height="0" style="display:block;position:relative;left:0px;top:0px;">
            <defs>
                <filter id="jssor_1_flt_1" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stddeviation="4"></feGaussianBlur>
                </filter>
                <radialGradient id="jssor_1_grd_2">
                    <stop offset="0" stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#000"></stop>
                </radialGradient>
                <mask id="jssor_1_msk_3">
                    <path fill="url(#jssor_1_grd_2)" d="M600,0L600,400L0,400L0,0Z" x="0" y="0" style="position:absolute;overflow:visible;"></path>
                </mask>
            </defs>
        </svg>
        <div class="empty-box"></div>
        <div id="jssor_1" class="slider">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin slider-loader">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;">
                <div style="background-color:#14261C;">
                    <img class="image-carousel" data-u="image" style="opacity:0.8;" data-src="<?= URL ?>public/images/carousel-2.png" />
                    <div data-ts="flat" data-p="275" data-po="40% 50%" style="left:150px;top:40px;width:800px;height:300px;position:absolute;">
                        <div data-to="50% 50%" data-t="0" style="left:50px;top:520px;width:400px;height:100px;position:absolute;color:#f0a329;font-family:'Roboto Condensed',sans-serif;font-size:44px;font-weight:900;letter-spacing:2px;">DOCUMENT MANAGEMENT</div>
                        <div data-to="50% 50%" data-t="1" style="left:50px;top:540px;width:400px;height:100px;position:absolute;opacity:0.1;color:#f0a329;font-family:'Roboto Condensed',sans-serif;font-size:84px;font-weight:900;letter-spacing:0.5em;">DOCUMENT MANAGEMENT</div>
                        <div data-to="50% 50%" data-t="5" style="left:50px;top:710px;width:700px;height:100px;position:absolute;color:#f0a329;font-family:'Roboto Condensed',sans-serif;font-size:54px;font-weight:900;letter-spacing:0px;">MEMORANDUM ORDER</div>
                    </div>
                </div>
                <div>
                    <img data-u="image" data-src="<?= URL ?>public/images/banner1.jpg" />
                    <div data-ts="flat" data-p="540" data-po="40% 50%" style="left:0px;top:0px;width:1600px;height:560px;position:absolute;">
                        <div data-to="50% 50%" data-t="5" style="left:50px;top:710px;width:700px;height:100px;position:absolute;color:#14261C;font-family:'Roboto Condensed',sans-serif;font-size:34px;font-weight:900;letter-spacing:0.5em">PROTECTION OF VITAL RECORDS</div>
                    </div>
                </div>
                <div style="background-color:#000000;">
                    <img data-u="image" style="opacity:0.8;" data-src="<?= URL ?>public/images/banner2.png" />
                    <div data-ts="flat" data-p="1080" style="left:0px;top:0px;width:1600px;height:560px;position:absolute;">
                        <svg viewbox="0 0 600 400" data-ts="preserve-3d" width="600" height="400" data-tchd="jssor_1_msk_3" style="left:255px;top:0px;display:block;position:absolute;overflow:visible;">
                            <g mask="url(#jssor_1_msk_3)">
                                <path data-to="300px -180px" fill="none" stroke="rgba(250,251,252,0.5)" stroke-width="20" d="M410-350L410-10L190-10L190-350Z" x="190" y="-350" data-t="10" style="position:absolute;overflow:visible;"></path>
                            </g>
                        </svg>
                        <svg viewbox="0 0 800 72" data-to="50% 50%" width="800" height="72" data-t="11" style="left:-800px;top:78px;display:block;position:absolute;font-family:'Roboto Condensed',sans-serif;font-size:54px;font-weight:900;overflow:visible;">
                            <text fill="#fafbfc" text-anchor="middle" x="400" y="72">SHOULD PROVIDE CLEAR
                            </text>
                        </svg>
                        <svg viewbox="0 0 800 72" data-to="50% 50%" width="800" height="72" data-t="12" style="left:1600px;top:153px;display:block;position:absolute;font-family:'Roboto Condensed',sans-serif;font-size:30px;font-weight:900;overflow:visible;">
                            <text fill="#fafbfc" text-anchor="middle" x="400" y="72">SIMPLE FILE CATEGORIES
                            </text>
                        </svg>
                    </div>
                </div>


            </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">slider html</a>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb132" style="position:absolute;bottom:24px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:12px;height:12px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
        <div class="content-memo">
            <hr>
            <h3><strong>Assign responsibility</strong></h3>
            <p>One individual should be assigned the responsibility for developing and coordinating the new filing system. This task usually falls to the Records Coordinator. The Records Coordinator may work in conjunction with the Records Authority or with a committee established for that purpose. The Records Coordinator may implement the system or may supervise others in its implementation. The first step in developing or improving a filing system is to gain the support of both the administration and the users of the system. Administrative support legitimizes the project and ensures the cooperation of all members of the office. Every member of the office must understand the purpose and scope of the project. Everyone should be involved in the process. The creator of a record may provide important insight useful during the analysis of the records. Office members can help determine which features or aspects of the present system work well and should be retained. Office members can also help identify specific problems within the present system that must be changed. Most importantly, involving others in the process makes them more amenable to using the system once it is implemented.</p>
        </div>
    </div>
</div>