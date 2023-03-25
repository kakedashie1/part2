


  <a href="new.php" class="btn btn-primary mb-4">日記を登録する</a>
  <main>
    <?php if(count($diaries) > 0) : ?>
    <?php foreach ($diaries as $diary) : ?>
      <section class="card shadow-sm mb-4">
        <div class="card-body">
        <h2 class="card-title mb-4">
        ・<?php echo escape($diary['action']); ?>
        </h2>
        <div>
        <p class="h3 mb-4">
        開始時間:  <?php echo $diary['startTime']; ?>&nbsp; ~ &nbsp;
          終了時間:  <?php echo $diary['endTime']; ?>

        </p>

        </div>

        <h2 class="mb-4">・満足度</h2>
          <p class="h3">
          <?php echo $diary['value']; ?>

          </p>

        </div>


      </section>
    <?php endforeach ; ?>
    <?php else : ?>
      <p>日記が登録されていません</p>

    <?php endif ; ?>
  </main>
