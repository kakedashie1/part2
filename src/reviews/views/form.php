


    <h2 class="h3 text-dark mb-4">読書ログの登録</h2>
    <div>
    <form action="createLog.php" method="post">
    <?php if (count($errors)) : ?>
        <ul class="text-danger">
          <?php foreach ($errors as $error) : ?>
           <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    <div class="form-group">
      <label for="title">タイトル</label>
      <input type="text" id="title" name="title" class="form-control" value="<?php echo $log['title'] ?>">
    </div>
    <div  class="form-group">
      <label for="author">著者名</label>
      <input type="text" id="author" name="author" class="form-control" value="<?php echo $log['author'] ?>">
    </div>
    <div  class="form-group">
      <label for="content">感想</label>
      <textarea name="content" id="content" class="form-control"><?php echo $log['content'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" >登録する</button>
    </form>


   