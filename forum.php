<?php
session_start();
if(!isset($_SESSION['threads'])) $_SESSION['threads'] = [];

if($_SERVER['REQUEST_METHOD']==='POST'){
    $title=$_POST['title']; $reply=$_POST['reply'] ?? null;
    if($title) $_SESSION['threads'][$title]=[];
    if($reply) $_SESSION['threads'][$_POST['thread']][]=$reply;
}

echo "<form method='post'>
        <input name='title' placeholder='New thread title'>
        <button>Create</button>
      </form>";

foreach($_SESSION['threads'] as $t=>$replies){
    echo "<h3>$t</h3>";
    foreach($replies as $r) echo "<p>- $r</p>";
    echo "<form method='post'>
            <input name='thread' value='$t' hidden>
            <input name='reply' placeholder='Reply'>
            <button>Send</button>
          </form>";
}
?>
