<div class="container">
    <h3 class="mb-3">Uredi novico</h3>
    <form action="/articles/update" method="POST">
    <input type="hidden" name="id" value="<?php echo $article->id; ?>"> <!-- Skrito polje za ID članka -->
    <div class="mb-3">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $article->title; ?>">
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Povzetek</label>
            <textarea class="form-control" id="abstract" name="abstract"><?php echo $article->abstract; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Besedilo</label>
            <textarea class="form-control" id="text" name="text" rows="10" cols="30"><?php echo $article->text; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="publish">Objavi</button>
        <label class="text-danger"><?php echo $error; ?></label>
    </form>
</div>