


  <a href="/diaries/new.php">日記を登録する</a>
  <main>
    <?php if(count($diaries) > 0) : ?>
    <?php foreach ($diaries as $diary) : ?>
      <section>
        <h2>
          <?php echo $diary['action']; ?>
        </h2>
        <h3>
          <?php echo $diary['startTime']; ?>
        </h3>
        <h3>
          <?php echo $diary['endTime']; ?>
        </h3>
        <h3>
          <?php echo $diary['value']; ?>
        </h3>
      </section>
    <?php endforeach ; ?>
    <?php else : ?>
      <p>日記が登録されていません</p>

    <?php endif ; ?>
  </main>

