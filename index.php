<?php
   $connection = require_once 'connection.php';
   $notes = $connection->getNotes();



    $currentNote = [
        'id' => '',
        'title' =>  '',
        'discription' =>''

    ];
   if (isset($_GET['id'])) {
         $currentNote= $connection->getNoteById($_GET['id']);
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
<div>
    <h1 class="notes">Note Application Mysql</h1>
    <form class="new-note" action="create.php" method="post">
        <p align="center" style="color:<?php echo $_GET['color']??''; ?>"> <?php echo $_GET['msg'] ?? ''; ?>  </p>

        <input type="hidden" name="id" value="<?php echo $currentNote['id']; ?>">
        <input type="text" name="title" placeholder="Note title" autocomplete="off"
               value="<?php echo $currentNote['title']; ?>">
        <textarea name="description" cols="30" rows="4" placeholder="Note Description"><?php echo $currentNote['discription']; ?>
        </textarea>
        <button>
         <?php if ($currentNote['id']): ?>
            Update note
            <?php else: ?>
            New note
            <?php endif; ?>

        
        </button>
    </form>
    <div class="notes">

         <?php  foreach ($notes as $note) {  ?>
            <div class="note">
                <div class="title">
                    <a href="?id=<?php echo $note['id'] ?>">
                        <?php echo $note['title']; ?>
                    </a>
                </div>
                <div class="description">
                        <?php echo $note['discription'];?>
                </div>
                <small><?php echo $note['create_date'] ?></small>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $note['id'] ?? '' ?>">
                    <button class="close">X</button>
                </form>
            </div>

           <?php } ;?>
           <br>
    </div>

</div>
</body>
</html>