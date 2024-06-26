<div class="container">
    <h3>Objavi novico</h3>
    <form action="/articles/store" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($_POST["title"]) ? $_POST["title"]: ""; ?>">
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Povzetek</label>
            <textarea class="form-control" id="abstract" name="abstract" value="<?php echo isset($_POST["abstract"]) ? $_POST["abstract"]: ""; ?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Besedilo</label>
            <textarea class="form-control" id="text" name="text" rows="10" cols="30" value="<?php echo isset($_POST["text"]) ? $_POST["text"]: ""; ?>"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="publish">Objavi</button>
        <label class="text-danger"><?php echo $error; ?></label>
    </form>
</div>