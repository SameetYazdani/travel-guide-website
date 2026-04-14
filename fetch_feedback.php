<?php
include('db.php');
header('Content-Type: application/json');

$destination = isset($_GET['destination']) ? $_GET['destination'] : '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$commentsPerPage = 3;
$offset = ($page - 1) * $commentsPerPage;

$stmtCount = $conn->prepare("SELECT COUNT(*) as total FROM destination_feedback WHERE destination = ?");
$stmtCount->bind_param("s", $destination);
$stmtCount->execute();
$resCount = $stmtCount->get_result();
$totalComments = 0;
if ($row = $resCount->fetch_assoc()) {
    $totalComments = $row['total'];
}
$totalPages = ceil($totalComments / $commentsPerPage);

$stmt = $conn->prepare("SELECT username, comment, rating, created_at FROM destination_feedback WHERE destination = ? ORDER BY created_at DESC LIMIT $commentsPerPage OFFSET $offset");
$stmt->bind_param("s", $destination);
$stmt->execute();
$result = $stmt->get_result();

$output = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = htmlspecialchars($row['username']);
        $comment = nl2br(htmlspecialchars($row['comment']));
        $rating = (int)$row['rating'];
        $date = date("M d, Y", strtotime($row['created_at']));

        $output .= "<div style='border-bottom:1px solid #ccc; padding:10px 0;'>";
        $output .= "<strong>$user</strong> <small style='color:#888;'>($date)</small><br>";
        $output .= "<div style='color:orange; margin:5px 0;'>";
        for ($i = 1; $i <= 5; $i++) {
            $output .= $i <= $rating ? "&#9733;" : "&#9734;";
        }
        $output .= "</div>";
        $output .= "<p style='margin:0;'>$comment</p>";
        $output .= "</div>";
    }
} else {
    $output = "<p>No feedback yet. Be the first to comment!</p>";
}

$paginationHtml = "";
if ($totalPages > 1) {
    for ($p = 1; $p <= $totalPages; $p++) {
        $activeStyle = ($p == $page) ? "background-color:#007bff; color:#fff;" : "background-color:#f0f0f0; color:#333; cursor:pointer;";
        $paginationHtml .= "<span class='page-box' data-page='$p' style='
            display:inline-block; 
            padding:8px 12px; 
            margin:0 5px; 
            border-radius:5px; 
            border:1px solid #ddd;
            user-select:none;
            $activeStyle
        '>$p</span>";
    }
}

echo json_encode([
    'comments' => $output,
    'pagination' => $paginationHtml
]);
?>
