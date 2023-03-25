


  <a href="/diaries/new.php">日記を登録する</a>
  <main>
    <?php if(count($diaries) > 0) : ?>
    <?php foreach ($diaries as $diary) : ?>
      <section>
        <h2>
          <?php echo escape($diary['action']); ?>
        </h2>
        <div>
        <p>
        開始時間:  <?php echo $diary['startTime']; ?>&nbsp; ~ &nbsp;
          終了時間:  <?php echo $diary['endTime']; ?>

        </p>

        </div>

        <h3>満足度</h3>
          <p>
          <?php echo $diary['value']; ?>

          </p>

      </section>
    <?php endforeach ; ?>
    <?php else : ?>
      <p>日記が登録されていません</p>

    <?php endif ; ?>
  </main>
