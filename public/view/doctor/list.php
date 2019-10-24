<?php
require_once("../../../web/functions/doctor_function.php");
include("../../../web/resources/template/header.php");
?>

    <div class="starter-template">
        <h3>Doctor List</h3>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Specility</th>
                <th>Phone No</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php get_doctor_list() ?>
            </tbody>
        </table>
    </div>

<?php include("../../../web/resources/template/footer.php");?>