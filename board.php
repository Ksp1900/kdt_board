<?php
include 'db_conn.php';

$number = $_GET['number'];

$sql = "SELECT * FROM boards WHERE number = $number";
$result = $conn->query($sql); #데이터를 가져옴
$row = $result->fetch_array(); # 보기좋게 정리함
?>
<h1 class="con">게시글</h1>
    <section class="article-detail table-common con row">
        <table class="cell" border="1">
            <colgroup>
                <col width="100px">
            </colgroup>
            <tbody>
                <tr class="article-title">
                    <th>제목<php</th>
                    <td colspan="3"> <?php echo $row['title'];?></td>
                </tr>
                <tr class="article-info">
                    <th>날짜</th>
                    <td><?php echo $row['create_time'];?></td>
                </tr>
                <tr class="article-body">
                    <td colspan="4"><?php echo $row['content'];?></td>
                </tr>
            </tbody>
        </table>
    </section>

<div class="con reply">
    <h1 class="">댓글 입력</h1>
    <section class="reply-form">
        <form method="POST" action="reply_write.php">
            <input type="hidden" name="number" value=<?php echo $number ?>>
            <div>
                이름 <input type="text" name='writer'>
            </div>
            <div>
                내용 <textarea name='content'></textarea>
                <input type="submit">
            </div>
        </form>
    </section>

    <h1 class="">댓글 목록</h1>
    <section class="reply-list table-common">
        <table border="1">
            <colgroup>
                <col width="100px">
            </colgroup>
            <thead>
                <tr>
                    <th>작성자</th>
                    <th>내용</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT count(*) FROM reply WHERE number = $number";
            $count = $conn->query($sql); #데이터를 가져옴
            $count = $count->fetch_array();
            if($count != 0){
                $count = $count['count(*)']; # 댓글 개수
            }

            $sql = "SELECT * FROM reply WHERE number = $number";
            $result = $conn->query($sql);
            for($i=0; $i<$count; $i=$i+1){ # 댓글 생성
                $row = $result->fetch_array();
                echo '<tbody>';
                echo '<tr>';
                echo '<th>'.$row['writer'].'</th>';
                echo '<th>'.$row['content'].'</th>';
                echo '</tr>';
                echo '</tbody>';
            }
            ?>
        </table>
    </section>
</div>

<footer></footer>