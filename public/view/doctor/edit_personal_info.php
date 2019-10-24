<?php
require_once("../../../web/functions/doctor_function.php");
include("../../../web/resources/template/header.php");
?>

<div class="starter-template">
    <h3>Update personal info</h3>
    <hr>

    <div>

        <?php
        if (isset($_GET['id'])) :

            $id = escape_string($_GET['id']);

            $result = query("SELECT * from doctor where login_id = '$id'");
            confirm($result);

            while ($row = fetch_array($result)):

        ?>

        <?php update_doctor(); ?>

        <form action="" method="post" role="form">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id']?>">
            <input type="hidden" name="version" id="version" value="<?php echo $row['version']?>">

            <script type='text/javascript'>
                $(document).ready(function(){
                    $("#specility option:contains(" + '<?php echo $row['specility'] ?>' + ")").attr('selected', 'selected');
                });

            </script>

            <div class="row" style="text-align: left">
                <div class="col col-md-2"></div>
                <div class="col col-md-8">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="name.."
                               value="<?php echo isset($row['name']) ? $row['name'] : null ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Specility</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="specility" id="specility">
                                <option>select</option>
                                <option>Heart speciliest</option>
                                <option>Padiatrics</option>
                                <option>Surgery</option>
                                <option>Allergy</option>
                                <option>Neurologiest</option>
                                <option>Gynecologiest</option>
                                <option>Pathologiest</option>
                                <option>Urologiest</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Date *</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="last_donation_date" id="date"
                               value="<?php echo isset($row['last_donation_date']) ? $row['last_donation_date'] : null ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Phone No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="phone number..."
                               value="<?php echo isset($row['phone_no']) ? $row['phone_no'] : null ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="email..."
                               value="<?php echo isset($row['email']) ? $row['email'] : null ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">NID No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nid_no" id="nid_no" placeholder="nid no..."
                               value="<?php echo isset($row['nid_no']) ? $row['nid_no'] : null ?>">
                        </div>
                    </div>

                    <div class="form-group" style="text-align: center">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>

        <?php
        endwhile;
        endif;
        ?>
    </div>

</div>
<?php include("../../../web/resources/template/footer.php");?>