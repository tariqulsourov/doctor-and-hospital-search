<?php
require_once("../../../web/functions/doctor_function.php");

include("../../../web/resources/template/header.php");
?>


<div class="container">

    <div class="starter-template">

        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h2>Doctor Search </h2>
                    <div>
                        <form action="../doctor/filtered_list.php" method="post" role="form">

                            <div class="form-group">
                                <select name="specility" class="form-control">
                                    <?php bt_dropdown() ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="police_station" class="form-control">
                                    <?php ps_dropdown() ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="post_office" class="form-control">
                                    <?php po_dropdown() ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select name="city" class="form-control">
                                    <?php city_dropdown() ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-info btn-lg" type="submit" name="search">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php include("../../../web/resources/template/footer.php");?>
