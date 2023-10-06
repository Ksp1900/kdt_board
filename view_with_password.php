<!DOCTYPE html>
<html>
<head>
  <title>Read Article</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      color: #555;
      line-height: 1.5;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    if (isset($_POST['password']) && $_POST['password'] === 'user_input_password') {
        echo '<h1>게시글 제목</h1>';
        echo '<p>게시글 내용을 이곳에 작성합니다.</p>';
    } else {
        echo '<h1>비밀번호 입력</h1>';
        echo '<form method="POST" action="">';
        echo '<input type="password" name="password" placeholder="비밀번호" required>';
        echo '<br>';
        echo '<input type="submit" value="확인">';
        echo '</form>';
    }
    ?>
  </div>
</body>
</html>