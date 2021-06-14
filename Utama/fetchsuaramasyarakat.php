<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=tubes', 'root', '');

$query = "
SELECT * FROM suaramasyarakat 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach ($result as $rak) {
    $output .= '
                     <div class="comment-form">
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="desc">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    By <b>' . $rak["comment_sender_name"] . '</b> on <i>' . $rak["date"] . '</i>
                                                </h5>
                                            </div>
                                            <div class="reply-btn">
                                                <button type="button" class="btn-reply text-uppercase reply" id="' . $rak["comment_id"] . '">Reply</button>
                                            </div>
                                        </div>
                                        <p class="comment">
                                            ' . nl2br($rak["comment"]) . '
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

           
 ';
    $output .= get_reply_comment($connect, $rak["comment_id"]);
}

echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
 SELECT * FROM suaramasyarakat WHERE parent_comment_id = '" . $parent_id . "'
 ";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach ($result as $rak) {
            $output .= '
            <div class="comment-list" style="margin-left:' . $marginleft . 'px">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="desc">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        By <b>' . $rak["comment_sender_name"] . '</b> on <i>' . $rak["date"] . '</i>
                                    </h5>
                                </div>
                                <div class="reply-btn">
                                    <button type="button" class="btn-reply text-uppercase reply" id="' . $rak["comment_id"] . '">Reply</button>
                                </div>
                            </div>
                            <p class="comment">
                                ' . nl2br($rak["comment"]) . '
                            </p>
                        </div>
                    </div>
                </div>
            </div></br>
   ';
            $output .= get_reply_comment($connect, $rak["comment_id"], $marginleft);
        }
    }
    return $output;
}
