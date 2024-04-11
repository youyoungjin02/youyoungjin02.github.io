<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>1부터 N까지의 합과 곱</title>
</head>
<body>
    <h2>1부터 N까지의 합과 곱을 구합니다.</h2>
    <form method="post">
        N의 값을 입력하세요: <input type="number" name="n" required>
        <input type="submit" value="계산하기">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 사용자가 입력한 n 값을 가져옵니다.
        $n = $_POST['n'];

        // 합계와 곱을 저장할 변수를 초기화합니다.
        $sum = 0;
        $product = 1;

        echo "<h3>결과:</h3>";
        echo "1부터 $n 까지의 숫자: ";
        
        // 1부터 n까지의 숫자를 출력하고, 합과 곱을 계산합니다.
        for ($i = 1; $i <= $n; $i++) {
            echo $i . " ";
            $sum += $i;
            $product *= $i;
        }

        // 결과를 출력합니다.
        echo "<br>전체 합: " . $sum;
        echo "<br>전체 곱: " . $product;
    }
    ?>
</body>
</html>