<!DOCTYPE html>
<html>
<head>
<title>Article List</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    padding: 20px;
    }
    .post-list {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .post-item {
    margin-bottom: 10px;
    }
    .post-title {
    color: #333;
    font-size: 18px;
    font-weight: bold;
    }
    .post-content {
    color: #555;
    }
    </style>
</head>
<body>
    <div class="post-list">
    <h1>게시글 목록</h1>
    <?php
    include 'db_conn.php';
    //게시글 리스트 변수
    if(empty($_POST['list_num'])){
        $_POST['list_num'] = 0;
    }
    if($_POST['list_num'] > 0){
        $list_num = $_POST['list_num'];
    }
    else{
        $list_num = 0;
    }
    $min = 0 + ($list_num*3);
    $max = 3 + ($list_num*3);
    $sql = "SELECT * FROM boards WHERE 1 LIMIT $min , $max";
    $result = $conn->query($sql); # 게시글 데이터를 가져옴
    $sql = "SELECT count(*) FROM boards WHERE 1 LIMIT $min, $max";
    $count = $conn->query($sql); # 게시글 개수를 가져옴
    $count = $count->fetch_array();
    if($count != 0){
        $count = $count['count(*)']; # 게시글 개수
    }
    

    $posts = array(); # 배열 초기화
    for($i=0; $i<$count; $i=$i+1){ # 게시글 배열 생성
        $row = $result->fetch_array();
        array_push($posts, array('number' => $row['number'], 'title' => $row['title'], 'content' => $row['content']));
    }

    // 게시글 목록 출력
    foreach ($posts as $post) {
        echo '<div class="post-item">';
        echo '<h2 class="post-title"> ' . $post['number'] .  '. <a href="board.php?number='.$post['number'].'">' . $post['title'] . '</a> </h2>';
        echo '<p class="post-content">' . $post['content'] . '</p>';
        echo '</div>';
    }

    
    echo '<form method="POST" action="board_write.html">';
    echo "<button type='submit' name='write'> 게시글 작성 </button>";
    echo '</form>';
    // 게시글 리스트 폼
    echo '<form method="POST" action="board_list.php">';
    echo "<button type='submit' name='list_num' value='".($list_num-1)."'> 이전 </button> 현재 페이지 : $list_num <button type='submit' name='list_num' value='".($list_num+1). "' > 다음 </button>";
    echo '</form>';
    ?>

    
    <!-- 게시글 검색 폼 -->
    <form method="GET" action="list.php">
        <input type="text" name="search" placeholder="게시글 검색">
        <input type="submit" value="검색">
    </form>
    </div>
    
    
</body>
</html>
</body>
</html>
