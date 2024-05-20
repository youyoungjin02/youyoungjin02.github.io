//ticket.php
<?php
$link = mysqli_connect("localhost", 'root', '','ticket');
mysqli_query($link, "set session character_set_connection=utf8;");
mysqli_query($link, "set session character_set_results=utf8;");
mysqli_query($link, "set session character_set_client=utf8;");
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>ticket</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <div class="input-wrap">
        <form action="ticket.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">고객성명</th>
                        <th colspan="3"><input type="text" name="name"></th>
                        <th colspan="2"><input type="submit" name="sum" value="합계"></th>
                    </tr>
                    <tr>
                        <th>NO.</th>
                        <th>구분</th>
                        <th colspan = "2">어린이</th>
                        <th colspan = "2">어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7,000</td>
                        <td><select name="pass_ch">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>10,000</td>
                        <td><select name="pass_ad">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>입장</td>
                        </select>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12,000</td>
                        <td><select name="big_ch">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>16,000</td>
                        <td><select name="big_ad">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>입장+놀이3종</td>
                        </select>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21,000</td>
                        <td><select name="free_ch">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>26,000</td>
                        <td><select name="free_ad">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>입장+놀이자유</td>
                        </select>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70,000</td>
                        <td><select name="yfree_ch">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>90,000</td>
                        <td><select name="yfree_ad">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option></td>
                        <td>입장+놀이자유</td>
                        </select>
                    </tr>
                </tbody>
                <tbody>
                <?php
                 if (isset($_POST['name']) && strlen($_POST['name']) > 0) {
                    if (isset($_POST['sum']) && $_POST['sum'] == "합계") {
                        $total = $_POST['pass_ch'] + $_POST['pass_ad'] + $_POST['big_ch'] + $_POST['big_ad'] + $_POST['free_ch'] + $_POST['free_ad'] + $_POST['yfree_ch'] + $_POST['yfree_ad'];
                        /* insert */
                        $sql=" INSERT INTO  `users` ".     //users -> table name
                        "(`name` , `pass_ch` , `pass_ad` , `big_ch` , `big_ad` , `free_ch` , `free_ad` , `yfree_ch`, `yfree_ad`, `total`)".
                        "VALUES ('$_POST[name]', '$_POST[pass_ch]',  '$_POST[pass_ad]',  '$_POST[big_ch]',  '$_POST[big_ad]',  '$_POST[free_ch]',  '$_POST[free_ad]',  '$_POST[yfree_ch]',  '$_POST[yfree_ad]', $total)";
                        mysqli_query($link, $sql);
                    }
                }
                mysqli_close($link);

                ?>
            </tbody>
            </table>
       </form>
       <?php
       date_default_timezone_set('Asia/Seoul');
       $current_time = date('Y년 m월 d일  A g:i분', time());
        if(strpos($current_time, 'AM') !== false){
            $current_time = str_replace('AM', '오전', $current_time);
        } else {
            $current_time = str_replace('PM', '오후', $current_time);
        }
        
        echo $current_time;
        if (isset($_POST['name']) && strlen($_POST['name']) > 0) {
            if (isset($_POST['sum']) && $_POST['sum'] == "합계") {
                $name = $_POST['name'];
                $total = $_POST['pass_ch'] + $_POST['pass_ad'] + $_POST['big_ch'] + $_POST['big_ad'] + $_POST['free_ch'] + $_POST['free_ad'] + $_POST['yfree_ch'] + $_POST['yfree_ad'];
                $result = ($_POST['pass_ch'] * 7000) + ($_POST['pass_ad'] * 10000) + ($_POST['big_ch'] * 12000) + ($_POST['big_ad'] * 16000) + ($_POST['free_ch'] * 21000) + ($_POST['free_ad'] * 26000) + ($_POST['yfree_ch'] * 70000) + ($_POST['yfree_ad'] * 90000);
                echo "<p>$name 고객님 감사합니다.</p>";
                if (isset($_POST['pass_ch']) && !empty($_POST['pass_ch'])) {
                    $pass_ch = $_POST['pass_ch'];
                    echo "<p>어린이 입장권 {$pass_ch}매</p>";
                }
                if (isset($_POST['pass_ad']) && !empty($_POST['pass_ad'])) {
                    $pass_ad = $_POST['pass_ad'];
                    echo "<p>어른 입장권 {$pass_ad}매</p>";
                }
                if (isset($_POST['big_ch']) && !empty($_POST['big_ch'])) {
                    $big_ch = $_POST['big_ch'];
                    echo "<p>어린이 BIG3 {$big_ch}매</p>";
                }
                if (isset($_POST['big_ad']) && !empty($_POST['big_ad'])) {
                    $big_ad = $_POST['big_ad'];
                    echo "<p>어른 BIG3 {$big_ad}매</p>";
                }
                if (isset($_POST['free_ch']) && !empty($_POST['free_ch'])) {
                    $free_ch = $_POST['free_ch'];
                    echo "<p>어린이 자유이용권 {$free_ch}매</p>";
                }
                if (isset($_POST['free_ad']) && !empty($_POST['free_ad'])) {
                    $free_ad = $_POST['free_ad'];
                    echo "<p>어른 자유이용권 {$free_ad}매</p>";
                }
                if (isset($_POST['yfree_ch']) && !empty($_POST['yfree_ch'])) {
                    $yfree_ch  =$_POST['yfree_ch'];
                    echo "<p>어린이 연간이용권 {$yfree_ch}매</p>";
                }
                if (isset($_POST['yfree_ad']) && !empty($_POST['yfree_ad'])) {
                    $yfree_ad  =$_POST['yfree_ad'];
                    echo "<p>어른 연간이용권 {$yfree_ad}매</p>";
                }
                echo "<p>합계 {$total}매 {$result}원 입니다.</p>";
            }
        }

        ?>
    </div>
</body>
</html>
