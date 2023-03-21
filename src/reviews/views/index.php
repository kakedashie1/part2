
  <!-- <h1>読書ログの一覧</h1> -->
  <a href="/reviews/new.php"  class="btn btn-primary mb-5">読書ログを登録する</a>
  <main>
    <?php if(count($books) > 0) : ?>
    <?php foreach ($books as $book) : ?>
      <section class="card mb-4" >
        <div>
        <h2>タイトル :<?php echo escape($book['title']) ; ?></h2><p> <?php echo escape($book['author']) ; ?></p>
        </div>

      <div class="">
      <?php echo nl2br(escape($book['content'] )); ?></div>
      </section>
    <?php endforeach ; ?>
    <?php else :?>
      <p>ログがありません</p>
    <?php endif ; ?>

  </main>
