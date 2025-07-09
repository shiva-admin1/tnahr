<style type="text/css">
    .card-inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        margin-bottom: 5px;
        border-bottom: 1px solid #ebebeb !important;
        min-height: 102px;
    }

    .card-footer {

        min-height: 59px !important;
    }

    .blue {
        color: #65c4f3;
    }

    .green,
    .green:hover {
        color: #5ebb5e;
    }

    .red,
    .red:hover {
        color: #dc7b78;
    }

    .orange,
    .orange:hover {
        color: #f0ad4e;
    }

    .voilet,
    .voilet:hover {
        color: #bf3fbf;
    }

    .grey {
        color: #607b8a;
    }

    .card {
        border: 1px solid #DDD;
        border-radius: 10px;
        box-shadow: 0 0 5px #CCC;
    }

    .card-body {
        padding: 8px;
    }

    .count {
        font-size: 18px;
        font-weight: 600;
    }

    i.circle-1 {
        display: inline-block !important;
        border: 1px solid #65c4f3;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
    -moz-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
    box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50); */
        padding: 0.5em 0.6em 0.5em 0.6em !important;

    }

    #c-1:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
        -moz-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
        box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-2:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-3:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-4:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
        box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-5:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1);
        box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-6:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    #c-7:hover {
        -webkit-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        -moz-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
        transition-duration: 1s;
        transition-delay: 0.25s ease-in ease-out;
    }

    i.circle-2 {
        display: inline-block !important;
        border: 1px solid #5ebb5e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1); */
        /* padding: 0.5em 0.6em 0.5em 0.6em !important; */

        padding: 0.5em 0.6em !important;

    }

    i.circle-3 {
        display: inline-block !important;
        border: 1px solid #f0ad4e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1); */
        padding: 0.5em 0.6em !important;

    }

    i.circle-4 {
        display: inline-block !important;
        border: 1px solid #dc7b78;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1); */
        padding: 0.5em 0.6em !important;

    }

    i.circle-5 {
        display: inline-block !important;
        border: 1px solid #bf3fbf;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1);
    box-shadow: 0px 6px 25px -5px rgba(191, 63, 191, 1); */
        /* padding: 0.7em 0.8em !important; */

        padding: 0.5em 0.6em !important;

    }

    i.circle-6 {
        display: inline-block;
        border: 1px solid #5ebb5e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1); */
        /* padding: 0.8em 0.9em 0.8em 0.9em !important; */
        padding: 0.5em 0.6em !important;

    }

    i.circle-7 {
        display: inline-block !important;
        border: 1px solid #65c4f3;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
    -moz-box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50);
    box-shadow: 0px 6px 25px -5px rgba(3, 150, 255, 0.50); */
        /* padding: 0.8em 0.9em !important; */
        padding: 0.5em 0.6em !important;

    }

    i.circle-8 {
        display: inline-block !important;
        border: 1px solid #f0ad4e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1); */
        /* padding: 0.8em 0.9em !important; */
        padding: 0.5em 0.6em !important;
    }

    i.circle-9 {
        display: inline-block !important;
        border: 1px solid #dc7b78;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1); */
        /* padding: 0.8em 0.9em !important; */
        padding: 0.5em 0.6em !important;

    }

    i.circle-10 {
        display: inline-block !important;
        border: 1px solid #dc7b78;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1);
    box-shadow: 0px 6px 25px -5px rgba(220, 123, 120, 1); */
        /* padding: 0.8em 0.9em !important; */

        padding: 0.5em 0.6em !important;

    }

    i.circle-11 {
        display: inline-block !important;
        border: 1px solid #607b8a;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(96, 123, 138, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(96, 123, 138, 1);
    box-shadow: 0px 6px 25px -5px rgba(96, 123, 138, 1); */
        /* padding: 0.8em 0.7em !important; */


        padding: 0.5em 0.6em !important;

    }

    i.circle-12 {
        display: inline-block !important;
        border: 1px solid #5ebb5e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1);
    box-shadow: 0px 6px 25px -5px rgba(94, 187, 94, 1); */
        /* padding: 0.8em 0.8em !important; */
        padding: 0.5em 0.6em !important;

    }

    i.circle-13 {
        display: inline-block !important;
        border: 1px solid #f0ad4e;
        border-radius: 50px;
        /* -webkit-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    -moz-box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1);
    box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1); */
        /* padding: 0.8em 0.8em !important; */
        padding: 0.5em 0.6em !important;

    }

    i.align {
        display: inline-block;
        margin-left: 100px;
        margin-bottom: 15px;
    }

    .f-wgt-h {
        font-weight: 800;
        letter-spacing: 1px;
        margin-left: 10px;
    }

    .f-wgt {
        font-size: 14px;
    }

    .panel-heading.active a:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .t-bs {
        /* border-radius: 5px;
    box-shadow: -1px 2px 11px -1px rgba(0, 0, 0, 0.79);
    -webkit-box-shadow: -1px 2px 11px -1px rgba(0, 0, 0, 0.79);
    -moz-box-shadow: -1px 2px 11px -1px rgba(0, 0, 0, 0.79); */

        -webkit-box-shadow: -1px 0px 7px 1px rgba(199, 199, 199, 1);
        -moz-box-shadow: -1px 0px 7px 1px rgba(199, 199, 199, 1);
        box-shadow: -1px 0px 7px 1px rgba(199, 199, 199, 1);

    }

    .t-bg {
        /* box-shadow: 0px 6px 25px -5px rgba(240, 173, 78, 1); */
        background-color: #607b8a;
    }

    .algns {
        margin: 5px 8px 5px 8px;
        /* padding: auto; */
    }

    .arrow-down:before,
    .arrow-down:after {
        content: "";
        transition: transform .5s;
    }

    .arrow-down:before {

        transform: rotate(45deg);
    }

    .arrow-down:after {

        transform: rotate(-45deg);
    }

    .arrow-down.active:before {
        transform: rotate(-45deg);
    }

    .arrow-down.active:after {
        transform: rotate(45deg);
    }

    #o-h {
        /* margin: 6px 6px; */
        padding: 4px 10px;

    }

    #o-h:hover,
    #o-h:focus {
        /* margin: 6px 6px; */
        /* padding: 5px 10px; */
        background-color: rgba(221, 221, 221, 0.4);
        border-radius: 50px;
        transition: 0.3s ease-in-out;

    }
</style>
<script>
    var fired = 0;
    $(document).ready(function() {
        if (fired === 0) {
            $('.count').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'easeInOutQuint',
                    step: function(now) {
                        if ($(this).hasClass('count_1')) {
                            $(this).text(Math.ceil(now) + '%');
                        } else {
                            $(this).text(Math.ceil(now));
                        }
                    }
                });
            });
            fired = 1; //Only do scroll function once
        }
    });

    $(document).ready(function() {
        $("#arrow-down").click(function() {
            $("fa-chevron-down").addClass("arrow-down");
            // $("div").addClass("important");
        });

    });

    $(document).ready(function() {
        $(".go-d").click(function() {
            $(".go-ty").hide();
            $(".go-dep").toggle();

        });

        $(".go-t").click(function() {
            $(".go-dep").hide();
            $(".go-ty").toggle();

        });

    });

    $(document).ready(function() {
        $(".beic-d").click(function() {
            $(".beic-ty").hide();
            $(".beic-dep").toggle();

        });

        $(".beic-t").click(function() {
            $(".beic-dep").hide();
            $(".beic-ty").toggle();

        });

    });

    $(document).ready(function() {
        $(".vr-c").click(function() {
            $(".vr-ty").hide();
            $(".vr-const").toggle();

        });

        $(".vr-t").click(function() {
            $(".vr-const").hide();
            $(".vr-ty").toggle();

        });

    });
</script>

<div class="col-lg-12">
    <div class="portlet box portlet-red">
        <div class="portlet-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="row">
                            <!-- 1-OSR RECORDS -->
                            <div class="col-md-4">
                                <a href="../osr_records">
                                    <div class="card" id="c-4">
                                        <div class="card-body">
                                            <div class="red card-inner">
                                                <div>
                                                    <i class="far fa-file-archive fa-2x circle-4 "></i>
                                                </div>
                                                <div class="text-right">
                                                    <h4 class="red mb-0 pb-0">OSR Records</h4>
                                                    <span class="count">
                                                        <?php echo ($osrallcount[0]['totalrecordcount']) ? ($osrallcount[0]['totalrecordcount']) : 0; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer m-4 p-4">
                                            <div class="row text-center">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3 red f-wgt">
                                                    Districts<br>
                                                    <?php echo ($osrallcount[0]['districtcount']) ? ($osrallcount[0]['districtcount']) : 0; ?>
                                                </div>
                                                <div class="col-md-3 red f-wgt">
                                                    Taluks<br><?php echo ($osrallcount[0]['talukcount']) ? ($osrallcount[0]['talukcount']) : 0; ?>
                                                </div>
                                                <div class="col-md-3 red f-wgt">
                                                    Villages<br><?php echo ($osrallcount[0]['villagecount']) ? ($osrallcount[0]['villagecount']) : 0; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <!-- 2-IFR RECORDS -->
                            <div class="col-md-4">
                                <a href="../ifr_records">
                                    <div class="card" id="c-3">
                                        <div class="card-body ">
                                            <div class="orange card-inner">
                                                <div>
                                                    <i class="fas fa-file-alt fa-2x circle-3 "></i>
                                                </div>
                                                <div class="text-right">
                                                    <h4 class="left f-wgt-h orange">IFR Records</h4>
                                                    <span class="count">
                                                        <?php echo ($ifrallcount[0]['totalrecordcount']) ? ($ifrallcount[0]['totalrecordcount']) : 0; ?>
                                                    </span>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="card-footer m-4 p-4">
                                            <div class="row text-center">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-3 orange f-wgt">
                                                    Districts<br>
                                                    <?php echo ($ifrallcount[0]['districtcount']) ? ($ifrallcount[0]['districtcount']) : 0; ?>
                                                </div>
                                                <div class="col-md-3 orange f-wgt">
                                                    Taluks<br>
                                                    <?php echo ($ifrallcount[0]['talukcount']) ? ($ifrallcount[0]['talukcount']) : 0; ?>
                                                </div>
                                                <div class="col-md-3 orange f-wgt">
                                                    Villages<br>
                                                    <?php echo ($ifrallcount[0]['villagecount']) ? ($ifrallcount[0]['villagecount']) : 0; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- 3-INDICES -->
                            <div class="col-md-4">
                                <div class="card" id="c-1">
                                    <div class="card-body ">
                                        <a href="../indices_records">
                                            <div class="blue card-inner">
                                                <div>
                                                    <i class="fas fa-address-book fa-2x circle-1 blue"></i>
                                                </div>
                                                <div class="text-right">
                                                    <h4 class="f-wgt-h blue">Indices</h4>
                                                    <span class="count">
                                                        <?php echo $ifrallindice[0]['department']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- <hr> -->
                                    </div>
                                    <div class="card-footer">
                                        <div class="row text-center">
                                            <div class="col-md-12 blue f-wgt center">
                                                Departments<br>
                                                <?php echo $ifrallindice[0]['department']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">

                                        <!-- 4-PRE 1857 -->
                                        <div class="col-md-4">
                                            <div class="card" id="c-3">
                                                <div class="card-body ">
												<a href="../pre_records">
                                                    <div class="orange card-inner ">
                                                        <div>
                                                            <i class="fas fa-file-alt fa-2x circle-3 orange ">
                                                            </i>
                                                        </div>
                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h orange">Pre records(1670 to 1857 A.D)</h4>
                                                            <span class="orange count">
                                                                <?php echo ($preordercount[0]['preordercount']) ? ($preordercount[0]['preordercount']) : 0; ?>
                                                            </span>
                                                        </div>

                                                    </div>
                                                  </a>
                                                </div>
                                                  <div class="card-footer">
                                                    <div class="row text-center">
                                                        <div class="col-md-8 voilet f-wgt ">
                                                            Type
                                                        </div>
                                                        <div class="col-md-4 voilet f-wgt">
                                                           <?php echo ($preordertypecount[0]['subtypecount']) ? ($preordertypecount[0]['subtypecount']) : 0; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 5-BOARD -->
										 <div class="col-md-4">
                                            <div class="card" id="c-5">
                                                <div class="card-body">
												<a href="../bmgazettes">
                                                    <div class="card-inner">
                                                        <div>
                                                            <i class="fas fa-book fa-2x circle-5 voilet "></i>
                                                        </div>

                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h voilet">Books/Manuals/ Gazetteers </h4>
                                                            <span class=" voilet count">
                                                                <?php echo ($bmgazordercount[0]['bmgazettesordercount']) ? ($bmgazordercount[0]['bmgazettesordercount']) : 0; ?>
                                                            </span>
                                                        </div>
                                                    </div></a>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row text-center">
                                                        <div class="col-md-8 voilet f-wgt ">
                                                            Type
                                                        </div>
                                                        <div class="col-md-4 voilet f-wgt">
                                                           <?php echo ($bmgazordertypecount[0]['subtypecount']) ? ($bmgazordertypecount[0]['subtypecount']) : 0; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- 6-GO -->
                                        <div class="col-md-4">
                                            <div class="card" id="c-4">
                                                <div class="card-body text-center">
													<a href="../go_records">
                                                    <div class="red card-inner">
                                                        <div>
                                                            <i class="fas fa-layer-group fa-2x circle-4"></i>
                                                        </div>
                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h red">GO Records</h4>
                                                            <span class="count">
                                                                <?php echo ($goordercount[0]['goordercount']) ? ($goordercount[0]['goordercount']) : 0; ?>
                                                            </span>
                                                        </div>
                                                    </div></a>
                                                </div>

                                                  <div class="card-footer">
                                                    <div class="row text-center">
                                                        <div class="col-md-8 voilet f-wgt ">
                                                            Type
                                                        </div>
                                                        <div class="col-md-4 voilet f-wgt">
                                                           <?php echo ($goordertypecount[0]['subtypecount']) ? ($goordertypecount[0]['subtypecount']) : 0; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <!-- 7-GAZETTES -->
                                        <div class="col-md-4">
                                            <div class="card" id="c-2">
                                                <div class="card-body ">
												<a href="../gazettes">
                                                    <div class="green card-inner">
                                                        <div>
                                                            <i class="fas fa-clipboard-list fa-2x circle-6 green "></i>
                                                        </div>

                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h green">Gazettes</h4>
                                                            <span class="green count">
                                                                <?php echo ($gazordercount[0]['gazettesordercount']) ? ($gazordercount[0]['gazettesordercount']) : 0; ?>
                                                            </span>
                                                        </div>
                                                    </div></a>
                                                </div>

                                                   <div class="card-footer">
                                                    <div class="row text-center">
                                                        <div class="col-md-8 voilet f-wgt ">
                                                            Type
                                                        </div>
                                                        <div class="col-md-4 voilet f-wgt">
                                                           <?php echo ($gazordertypecount[0]['subtypecount']) ? ($gazordertypecount[0]['subtypecount']) : 0; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 8-BOOK/MAUALS/GAZETTEERS -->
                                       <div class="col-md-4">
                                            <div class="card" id="c-5">

                                                <div class="card-body ">
                                                    <div class="voilet card-inner">
                                                        <div>
                                                            <i class="fas fa-file fa-2x circle-5 voilet "></i>
                                                        </div>
                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h voilet">Board Proceedings</h4>
                                                            <span class="voilet count">
                                                                <?php echo ($bptotalcount[0]['totalrecordcount']) ? ($bptotalcount[0]['totalrecordcount']) : 0; ?>
                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="card-footer m-4 p-4 text-center">
                                                    <a data-toggle="collapse" href="#bp" role="button"
                                                        aria-expanded="false" aria-controls="bp" id="arrow-down"><i
                                                            class="fas fa-chevron-down fa-lg voilet"></i></a>
                                                    <span class="collapse multi-collapse" id="bp">
                                                        <?php foreach ($bpcount as $key => $value) { ?>
                                                            <h6 class="voilet" style="margin-top:20px;font-size:13px;">
                                                                <div class="row" style="margin-left:1%;margin-right:1%;">
                                                                    <div class="col-md-8 left">
                                                                        <?php echo ($value['name']); ?>
                                                                    </div>
                                                                    <div class="col-md-4 right">
                                                                        <a class="voilet" id="o-h"
                                                                            href="./record_details/<?php echo strip_tags($value['doctyp']); ?>/1"><?php echo ($value['valcount']); ?></a>
                                                                    </div>
                                                                </div>
                                                            </h6>
                                                        <?php $sno++;
                                                        } ?>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- 9-THEMES -->
                                        <div class="col-md-4">
                                            <!-- <div class="card" id="c-2">
                                                <div class="card-body text-center">
                                                    <h4 class="center f-wgt-h green">Themes</h4>
                                                    <span class="green count">
                                                        <h4 class="green" >
                                                            <?php echo ($authorcount[0]['totalauthorcount']); ?>
                                                        </h4>
                                                    </span>
                                                    <i class="fas fa-pen-fancy fa-2x circle-12 green align"
                                                    style="margin-left:0px !important;"></i>
                                                </div>
                                            </div> -->
                                            <div class="card" id="c-2">
                                                <div class="card-body">

                                                    <div class="card-inner">
                                                        <div>
                                                            <i class="fas fa-pen-fancy fa-2x circle-6 green "></i>
                                                        </div>
                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h green">Themes </h4>
                                                            <span class="count green">
                                                                <?php echo ($authorcount[0]['totalauthorcount']); ?>
                                                            </span>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="card-footer m-4 p-4">
                                                    <div class="row text-center">

                                                        <div class="col-md-8 green f-wgt ">
                                                            Districts
                                                        </div>
                                                        <div class="col-md-4 green f-wgt">
                                                            2
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">
                                        <!-- 10-VOTER LIST -->
                                        <div class="col-md-4">
                                            <div class="card" id="c-4">
                                                <div class="card-body text-center">
                                                    <div class="card-inner">
                                                        <div>
                                                            <i class="fas fa-poll-h fa-2x circle-4 red "></i>
                                                        </div>
                                                        <div class="text-right">
                                                            <h4 class=" f-wgt-h red">Voter List</h4>
                                                            <span class="red count">
                                                                <?php echo ($votertotalcount[0]['totalrecordcount']) ? ($votertotalcount[0]['totalrecordcount']) : 0; ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card-footer m-4 p-4">
                                                    <div class="row text-center">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-4">
                                                            <h5 class="red">Constituency<br><a data-toggle="collapse"
                                                                    href="#vr-typ" role="button" aria-expanded="false"
                                                                    aria-controls="vr-typ" class="rotate-arrow"
                                                                    id="arrow-down"><i
                                                                        class="fas fa-chevron-down red vr-t"
                                                                        style="margin-top:6px;"></i></a>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-4">
                                                            <h5 class="red">Types<br><a data-toggle="collapse"
                                                                    href="#vr-const" class="rotate-arrow" role="button"
                                                                    aria-expanded="false" aria-controls="vr-const"
                                                                    id="arrow-down"><i
                                                                        class="fas fa-chevron-down red vr-c"
                                                                        style="margin-top:5px;"></i></a>
                                                            </h5>
                                                        </div>
                                                        <div class="col-lg-12" style="margin-left:8%;margin-right:8%;">
                                                            <span class="collapse multi-collapse vr-const"
                                                                id="vr-const">
                                                                <div class="row">
                                                                    <?php foreach ($votertypcount as $key => $value) { ?>
                                                                        <h6 class="red"
                                                                            style="margin-top:10px;font-size:14px;">
                                                                            <div class="row">
                                                                                <div class="col-md-6 left">
                                                                                    <?php echo ($value['name']); ?>
                                                                                </div>
                                                                                <div class="col-md-4 right">
                                                                                    <a class="red" id="o-h"
                                                                                        href="./record_details/<?php echo strip_tags($value['doctyp']); ?>/1"><?php echo ($value['valcount']); ?></a>
                                                                                </div>
                                                                            </div>
                                                                        </h6>
                                                                    <?php $sno++;
                                                                    } ?>
                                                                </div>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-12" style="margin-left:9%;margin-right:9%;">
                                                            <span class="collapse multi-collapse vr-ty" id="vr-typ">
                                                                <div class="row">
                                                                    <?php foreach ($constituencycount as $key => $value) { ?>
                                                                        <h6 class="red"
                                                                            style="margin-top:10px;font-size:14px;">
                                                                            <div class="row">
                                                                                <div class="col-md-6 left">
                                                                                    <?php echo ($value['constituency_name']); ?>
                                                                                </div>
                                                                                <div class="col-md-4 right">
                                                                                    <a class="red" id="o-h"
                                                                                        href="./record_details/<?php echo strip_tags($value['constituency_name']); ?>/4"><?php echo ($value['valcount']); ?></a>
                                                                                </div>
                                                                            </div>
                                                                        </h6>
                                                                    <?php $sno++;
                                                                    } ?>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 11-FMB RECORDS -->
                                        <div class="col-md-4">
                                            <a href="../fmb_records">
                                                <div class="card" id="c-2">


                                                    <div class="card-body ">
                                                        <div class="card-inner">
                                                            <div>
                                                                <i class="fas fa-atlas fa-2x circle-2 green"></i>
                                                            </div>
                                                            <div class="text-right">
                                                                <h4 class="f-wgt-h green">FMB Records</h4>
                                                                <span class="count green">
                                                                    <?php echo ($fmballcount[0]['totalrecordcount']) ? ($fmballcount[0]['totalrecordcount']) : 0; ?>
                                                                </span>
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div class="card-footer m-4 p-4">
                                                        <div class="row text-center">
                                                            <div class="col-md-1">
                                                            </div>
                                                            <div class="col-md-3 green f-wgt">
                                                                Districts<br>
                                                                <?php echo ($fmballcount[0]['districtcount']) ? ($fmballcount[0]['districtcount']) : 0; ?>
                                                            </div>
                                                            <div class="col-md-3 green f-wgt">
                                                                Taluks<br>
                                                                <?php echo ($fmballcount[0]['talukcount']) ? ($fmballcount[0]['talukcount']) : 0; ?>
                                                            </div>
                                                            <div class="col-md-3 green f-wgt">
                                                                Villages<br>
                                                                <?php echo ($fmballcount[0]['villagecount']) ? ($fmballcount[0]['villagecount']) : 0; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <h3><?php echo ('OSR Villages Count') ?></h3>
                                    <div class="table-responsive" style="overflow:auto;">
                                        <table
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display t-bs">
                                            <thead class="info">
                                                <tr>
                                                    <th width='40%' class="center t-bg">
                                                        District</th>
                                                    <th width='40%' class="center t-bg">
                                                        Taluk</th>
                                                    <th width='20%' class="center t-bg">
                                                        Village Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($osrtalukwiseVillagecount as $key => $value) { ?>
                                                <tr>
                                                    <td class="left"><?php echo $value['district_name']; ?></td>
                                                    <td class="left"><?php echo $value['taluk_name']; ?></td>
                                                    <td class="right"><?php echo $value['valcount']; ?></td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h3><?php echo ('FMB Villages Count') ?></h3>
                                    <div class="table-responsive" style="overflow:auto;">
                                        <table
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display t-bs">
                                            <thead class="info">
                                                <tr>
                                                    <th width='40%' class="center t-bg">
                                                        District</th>
                                                    <th width='40%' class="center t-bg">
                                                        Taluk</th>
                                                    <th width='20%' class="center t-bg">
                                                        Village Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($fmbtalukwiseVillagecount) > 0) {
                                                    foreach ($fmbtalukwiseVillagecount as $key => $value) { ?>
                                                <tr>
                                                    <td class="center"><?php echo $value['district_name']; ?></td>
                                                    <td class="left"><?php echo $value['taluk_name']; ?></td>
                                                    <td class="left"><?php echo $value['valcount']; ?></td>

                                                </tr><?php }
                                                } else { ?>
                                                <tr>
                                                    <td class="center" colspan="3">No Data Available</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <h3><?php echo ('IFR Villages Count') ?></h3>
                                    <div class="table-responsive" style="overflow:auto;">
                                        <table
                                            class="table table-hover table-striped table-bordered table-advanced tablesorter display t-bs">
                                            <thead class="info">
                                                <tr>
                                                    <th width='40%' class="center t-bg">
                                                        District</th>
                                                    <th width='40%' class="center t-bg">
                                                        Taluk</th>
                                                    <th width='20%' class="center t-bg">
                                                        Village Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($ifrtalukwiseVillagecount) > 0) {
                                                    foreach ($ifrtalukwiseVillagecount as $key => $value) { ?>
                                                <tr>
                                                    <td class="center"><?php echo $value['district_name']; ?></td>
                                                    <td class=" left"><?php echo $value['taluk_name']; ?></td>
                                                    <td class="left"><?php echo $value['valcount']; ?></td>

                                                </tr><?php }
                                                } else { ?>
                                                <tr>
                                                    <td class="center" colspan="3">No Data Available</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div id="modal-add-unsent" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
                    aria-hidden="true" class="modal fade col-lg-12">
                    <div class="modal-dialog" style="width:100%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                    class="close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form add-unsent-form">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getapplicant(type, status) {
        $(".add-unsent-form").html("<span class='erro'>Fetching data!!!!!</span>");
        $("#modal-add-unsent").modal('show');
        $.ajax({
            async: true,
            dataType: "html",
            type: "get",
            url: "<?php echo $this->Url->build('/', true) ?>admin/employee_reports/ajaxgetapplicant/" +
                type +
                "/" +
                status,
            success: function(data, textStatus) {

                $(".add-unsent-form").html(data);
            }
        });

    }
</script>
