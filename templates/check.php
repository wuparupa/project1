<?php

$conn = mysqli_connect("localhost", "root", "161711", "patients");
$id = $_POST['id'];
// DB 정보 가져오기 
$sql = "SELECT * FROM user1 WHERE id ='{$id}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$row['id'];
?>

<?php
$conn = mysqli_connect("localhost", "root", "161711", "pdate");
// DB 정보 가져오기 
$sql = "
    INSERT INTO pdate
    (result, result1, date)
    VALUES('{$_POST['leye']}','{$_POST['reye']}',NOW()
    )";
echo $sql;
$result = mysqli_query($conn, $sql);
if ($id == $row['id']){
?>
    <script>
        alert("결과 전송 완료.")
    </script>
<?php
} else {
    //전송 실패 
?>
    <script>
        alert("환자 데이터가 없습니다.")
    </script>
<?php
}
?>