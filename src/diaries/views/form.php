
  <h1 class="h2 text-dark mt-4 mb-4">日記の登録</h1>
  <form action="create.php" method="post">
    <?php if(count($errors)) : ?>
      <ul class="text-danger">
        <?php foreach ($errors as $error) : ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div class="form-group">
      <label for="action">行動</label>
      <input type="text" id="action" name="action"class="form-control" value="<?php echo $diary['action'] ?>">
    </div>
    <div  class="form-group">
      <p>
      <label for="">開始時間</label>
      <input type="time" name="startTime" class="form-control" value="<?php echo $diary['startTime'] ?>">
      </p>
      <p>
      <label for="">終了時間</label>
      <input type="time" name="endTime" class="form-control" value="<?php echo $diary['endTime'] ?>">
      </p>


    </div>
    <div  class="form-group">
      <p>満足度<br>
      <label for="5">大満足</label>
      <input type="radio"id="5" name="value" value="大満足" >
      <label for="4">満足</label>
      <input type="radio" id="4" name="value" value="満足">
      <label for="3">普通</label>
      <input type="radio" id="3" name="value" value="普通" checked>
      <label for="2">やや不満</label>
      <input type="radio" id="2" name="value" value="やや不満">
      <label for="1">不満</label>
      <input type="radio" id="1" name="value" value="不満">
      </p>

    </div>
    <button type="submit" class="btn btn-primary">登録する</button>

  </form>
