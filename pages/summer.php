<div class="signin-form">
  <div class="container">
    <div class="row">
      <div class="col-sm col-xs">
        <div class="panel panel-default">
          <div class="panel-heading">Text Editor</div>
          <div id="success"></div>
          <div class="panel-body">
            <form action="functions/postnews.php" class="form-news" method="POST" id="post-news">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" class="form-control" name="author" required>
                </div>
                <textarea id="summernote" name="editordata"></textarea>
                <button type="submit" class="btn btn-primary" id="btn-postnews">Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>