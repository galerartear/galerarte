<?php
include_once '../security.php';
include_once $_SESSION['raiz'] . '/modules/conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

unset($_SESSION["temp_subject"]);
unset($_SESSION["temp_subject_name"]);
unset($_SESSION["temp_subject_semester"]);
unset($_SESSION["temp_subject_description"]);
unset($_SESSION["temp_subject_career_id"]);
unset($_SESSION["temp_subject_career_name"]);

$_SESSION["temp_subject"] = $_POST["txtsubject"];
$_SESSION["temp_subject_name"] = $_POST["txtsubjectname"];
$_SESSION["temp_subject_semester"] = $_POST["txtsubjectsemester"];
$_SESSION["temp_subject_description"] = $_POST["txtsubjectdescription"];
$_SESSION["temp_subject_career_id"] = $_POST["selectsubjectcareerid"];
$_SESSION["temp_subject_career_name"] = $_POST["selectsubjectcareername"];

unset($_SESSION['career_teacher_user']);
unset($_SESSION['career_teacher_name']);

$_SESSION['career_teacher_user'] = array();
$_SESSION['career_teacher_name'] = array();

if (isset($_POST["selectcareersub"])) {
    $sql = "SELECT * FROM teachers WHERE career = '" . $_POST['selectcareersub'] . "' ORDER BY name";

    $i = 0;

    if ($result = $conexion->query($sql)) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['career_teacher_user'][$i] = $row['user'];
            $_SESSION['career_teacher_name'][$i] = $row['name'] . ' ' . $row['surnames'];

            $i += 1;
        }
    }
}