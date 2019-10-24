<?php
/**
 * Created by PhpStorm.
 * User: erfan
 * Date: 5/2/18
 * Time: 11:14 PM
 */
require_once("function.php");
require_once("address_function.php");
require_once("search_freq_function.php");

function get_hospital_list() {
    $result = query("SELECT * FROM hospital");
    confirm($result);

    $i = 1;
    while ($row = fetch_array($result)) {
        echo "
            <tr style='text-align: left'>
    			<td>{$i}</td>
    			<td>{$row['name']}</td>
    			<td>{$row['grade']}</td>
    			<td>{$row['phone_no']}</td>
    			<td>{$row['web_site']}</td>
    			<td>{$row['rating']}</td>
    			<td>
                    <a href='public_profile.php?id={$row['id']}'>
                        visit profile
                    </a>
    			</td>
    		</tr>
        ";
        $i++;
    }
}

function search_hospital() {
    if (isset($_POST['search'])) {

        $grade = escape_string($_POST['grade']);
        $police_station = escape_string($_POST['police_station']);
        $post_office = escape_string($_POST['post_office']);
        $city = escape_string($_POST['city']);

        $ps_search = "";
        $po_search = "";
        $city_search = "";

        /*$old_date = (date('m')-3)."-"."1-".date('y');*/

        if (!empty($police_station)) {
            $ps_search = " AND a.police_station = '{$police_station}'";
        }

        if (!empty($post_office)) {
            $post_office = " AND a.post_office = '{$post_office}'";
        }

        if (!empty($city)) {
            $city_search = " AND a.city = '{$city}'";
        }

        $result = query("SELECT d.id as d_id, a.id as a_id, a.*, d.* FROM hospital d
                              JOIN address a
                              ON d.address_id = a.id
                              WHERE d.status = 'ACTIVE'
                              AND d.grade = '{$grade}'
                              "
                                .$ps_search.$po_search.$city_search);

        confirm($result);
        add_freq($grade);

        $i = 1;
        while ($row = fetch_array($result)) {
            echo "
            <tr style='text-align: left'>
    			<td>{$i}</td>
    			<td>{$row['name']}</td>
    			<td>{$row['grade']}</td>
    			<td>{$row['phone_no']}</td>
    			<td>{$row['email']}</td>
    			
    			</td>
    		</tr>
        ";
            $i++;
        }
    }
}

function register_hospital() {
    if (isset($_POST['submit'])) {

        $address = create_address();

        $name = escape_string($_POST['name']);
        $grade = escape_string($_POST['grade']);
        $login_id = escape_string($_POST['login_id']);
        $password = escape_string($_POST['password']);
        $phone_no = escape_string($_POST['phone_no']);
        $email = escape_string($_POST['email']);
        $nid_no = escape_string($_POST['nid_no']);
        $address_id = escape_string($address);

        $query = query("INSERT INTO hospital(name, grade, login_id, password, phone_no, email, nid_no, address_id) 
                            VALUES ('{$name}', '{$grade}', '{$login_id}', '{$password}', '{$phone_no}', '{$email}',
                             '{$nid_no}', '{$address_id}')");

        confirm($query);
        redirect("list.php");
    }
}

function get_hospital_profile () {
    if (isset($_SESSION['user_id'])) {

        $hospital_id = $_SESSION['user_id'];

        $result = query("SELECT d.id as d_id, a.id as a_id, d.*, a.* FROM hospital d
                              JOIN address a 
                              ON d.address_id = a.id
                              WHERE login_id = '{$hospital_id}'");
        confirm($result);

        $row = fetch_array($result);

        echo "
            <div class=\"container\" >
                <h2>hospital Name: <b> {$row['name']}</b></h2>
                <p>
                    grade : <b> {$row['grade']}</b>
                    &nbsp;&nbsp;
                    Status: <b>{$row['status']}</b>
                </p>
            </div>
            <hr>
            
            <ul class=\"container details\">
                <li><p><span class=\"glyphicon glyphicon-phone\" style=\"width:50px;\"></span>
                    phone: <b>{$row['phone_no']}</b></p></li>
                    
                <li><p><span class=\"glyphicon glyphicon-envelope\" style=\"width:50px;\"></span>
                    email: <b>{$row['email']}</b></p></li>
                    
                <li><p><span class=\"glyphicon glyphicon-barcode\" style=\"width:50px;\"></span>
                    nid: <b>{$row['nid_no']}</b></p></li>
                
                <li><p>
                        <span class=\"glyphicon glyphicon-plus\" style=\"width:50px;\"></span>
                        Last donation Date: <b>{$row['last_donation_date']}</b>
                    </p></li>   
            </ul>
            <hr>
            
            <div>
                <ul class=\"container details\"><li><p>
                    <span class=\"glyphicon glyphicon-home\" style=\"width:50px;\"></span>
                    address: <b> {$row['police_station']},</b> 
                    <b> {$row['post_office']},</b>
                    <b> {$row['city']}</b>
                </p></li></ul>
            </div>
            <hr>
            
            <div class=\"container\" >
                <table>
                    <tr>
                        <td>
                            <a href='edit_personal_info.php?id={$row['login_id']}'>
                                <button type='button' name='' class='btn btn-primary'>Update personal info</button>
                            </a>
                        </td>
                        
                        <td style='padding-left: 5px'>
                            <a href='edit_address.php?id={$row['login_id']}&a_id={$row['a_id']}'>
                                <button type='button' name='' class='btn btn-primary'>Update address</button>
                            </a>
                        </td>
                        
                        <td style='padding-left: 5px'>
                            <form action='' method='post' role='form'>
                                <input type='hidden' name='id' id='id' value='{$row['id']}'>
                                <button type='delete' name='delete' class='btn btn-danger'>Discontinue</button>
                            </form>                        
                        </td>
                    </tr>
                </table>
            </div>
        ";
    } else {
        set_message("You must Login first");
        redirect("../../view/auth/login.php");
    }
}

/**
 * public profile of hospital
 * with less info
 * no post action can be performed
 */
function get_public_profile () {
    if (!empty($_GET['id'])) {

        $hospital_id = $_GET['id'];

        $result = query("SELECT d.id as d_id, a.id as a_id, d.*, a.* FROM hospital d
                              JOIN address a 
                              ON d.address_id = a.id
                              WHERE d.id = '{$hospital_id}'");
        confirm($result);

        $row = fetch_array($result);

        echo "
            <div class=\"container\" >
                <h2>hospital Name: <b> {$row['name']}</b></h2>
                <p>
                    grade: <b> {$row['grade']}</b>
                    &nbsp;&nbsp;
                    Status: <b>{$row['status']}</b>
                </p>
            </div>
            <hr>
            
            <ul class=\"container details\">
                <li><p><span class=\"glyphicon glyphicon-phone\" style=\"width:50px;\"></span>
                    phone: <b>{$row['phone_no']}</b></p></li>
                    
                <li><p><span class=\"glyphicon glyphicon-envelope\" style=\"width:50px;\"></span>
                    email: <b>{$row['email']}</b></p></li>
                
                <li><p><span class=\"glyphicon glyphicon-plus\" style=\"width:50px;\"></span>
                    </li>   
                
            </ul>
            <hr>
            
            <div>
                <ul class=\"container details\"><li><p>
                    <span class=\"glyphicon glyphicon-home\" style=\"width:50px;\"></span>
                    address: <b> {$row['police_station']},</b> 
                    <b> {$row['post_office']},</b>
                    <b> {$row['city']}</b>
                </p></li></ul>
            </div>
            <hr>
        ";
    } else {
        redirect("../../view/welcome/index.php");
    }
}

/**
 * Only logged in hospital can update their profile info
 */
function update_hospital() {
    if (isset($_POST['update']) && isset($_SESSION['user_id'])) {

        $id = escape_string($_POST['id']);
        $name = escape_string($_POST['name']);
        $grade = escape_string($_POST['grade']);
        $phone_no = escape_string($_POST['phone_no']);
        $email = (int)escape_string($_POST['email']);
        $nid_no = escape_string($_POST['nid_no']);
        $last_donation_date = escape_string($_POST['last_donation_date']);
        $version = (int)escape_string($_POST['version']) + 1;

        $query = query("UPDATE hospital SET
                        name = '$name',
                        grade = '$grade',
                        phone_no = '$phone_no',
                        email = '$email',
                        nid_no = '$nid_no',
                        last_donation_date = '$last_donation_date',
                        version = '$version',
                        updated = now()
                        WHERE id = '$id'
                        ");
        confirm($query);

        set_message("Personal info updated successfully");
        redirect("profile.php");
    }
}

/**
 * not implemented
 * This will not actually delete rows from DB
 * but changes hospital status from ACTIVE to DELETED
 */
function delete_hospital() {
    if (isset($_POST['delete'])) {
        $id = escape_string($_POST['id']);

        $query = query("UPDATE hospital SET
                        status = 'DELETED'
                        WHERE id = '$id'
                        ");
        confirm($query);

        redirect("");
    }
}

/**
 * Get distinct grade from hospital table
 */
function bt_dropdown() {
    $result = query("SELECT distinct grade FROM hospital");
    confirm($result);

    echo "<option value='' disabled>Select grade</option>";

    while ($row = fetch_array($result)) {
        echo "<option value='{$row['grade']}'>{$row['grade']}</option>";
    }
}

function city_dropdown() {
    $result = query("SELECT distinct city FROM address");
    confirm($result);

    echo "<option value=''>Select city</option>";

    while ($row = fetch_array($result)) {
        echo "<option value='{$row['city']}'>{$row['city']}</option>";
    }
}

function ps_dropdown() {
    $result = query("SELECT distinct police_station FROM address");
    confirm($result);

    echo "<option value=''>Select police station</option>";

    while ($row = fetch_array($result)) {
        echo "<option value='{$row['police_station']}'>{$row['police_station']}</option>";
    }
}

function po_dropdown() {
    $result = query("SELECT distinct post_office FROM address");
    confirm($result);

    echo "<option value=''>Select post office</option>";

    while ($row = fetch_array($result)) {
        echo "<option value='{$row['post_office']}'>{$row['post_office']}</option>";
    }
}

function get_hospital_rating() {
    if (isset($_GET['id']) || isset($_SESSION['user_id'])) {

        $id = "";
        $col_name = "";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $col_name = "id";
        } else if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $col_name = "login_id";
        }

        $result = query("SELECT rating FROM hospital WHERE {$col_name}={$id}");
        confirm($result);

        $single_result = fetch_array($result);

        echo "<label style=\"font-size: xx-large\">{$single_result['rating']}</label>";
    } else {
        echo "<label style=\"font-size: xx-large\">N/A</label>";
    }

}

function update_hospital_rating() {
    if (isset($_POST['submit'])) {

        $id = $_POST['id'];
        $result = query("UPDATE hospital SET rating=(rating + 1) WHERE id={$id}");
        confirm($result);

        redirect("public_profile.php?id={$id}&a_id={$_GET['a_id']}");
    }
}
