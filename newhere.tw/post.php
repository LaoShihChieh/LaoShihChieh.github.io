<?php
require_once('config.php');
require_once('includes/head.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
</head>

<body>
  <?php require_once('includes/header.php') ?>
  <div class="container">
    <div class="row" id="row_style">
      <div class="container postbox">
          <h3>NEW HERE 發文器</h3>
          <form method="post" enctype="multipart/form-data" id="form">
            <div class="form-group">
              <input type="text" id="article_name" name="article_name" class="form-control" placeholder="標題" value="" required>
            </div>
            <div id="editor" class="editor" style="width: 100%;">
              <img id="cover-pic" class="cover-pic" name="cover-pic" src="/uploads/cover.jpg">
              <h1 id="live_title" class="live_title"></h1>
              <div id='edit' class="edit">
              </div>
              <div class="form-group row" id="row_style">
                <div class="col-3" style="align-items: right;">
                  <div class="circle">
                    <img id="profile-pic" class="profile-pic" name="profile-pic" src="/uploads/logo-1.png">
                  </div>
                </div>
                <div class="col-9" style="text-align: left;">
                  <p id="live_author" class="live_author"></p>
                  <p id="live_authorDescription" class="live_authorDescription"></p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" id="article_author" name="article_author" class="form-control" placeholder="作者" value="" required>
            </div>
            <div class="form-group">
              <textarea id="article_author_description" name="article_author_description" placeholder="作者簡介" value="" required></textarea>
            </div>
            <div class="form-group">
              <select name="article_topic" value="">
                <option selected disabled hidden>選擇分類</option>
                <option value="campus">懂學校</option>
                <option value="lifestyle">懂生活</option>
                <option value="learn">懂學習</option>
                <option value="management">懂管理</option>
              </select>
            </div>
            <input type="hidden" id="article_cover_photo" name="article_cover_photo" value="">
            <input type="hidden" id="article_profile_pic" name="article_profile_pic" value="">
            <input type="hidden" id="article_body" name="article_body" value="">
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="submit">發布新文</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script>
    (function() {
      new FroalaEditor('#cover-pic, #profile-pic', {
        imageUploadURL: '/upload_image.php',
        imageUploadParams: {
          id: 'my_editor'
        }
      })
      new FroalaEditor("#edit", {
        toolbarInline: true,
        toolbarButtons: [
          ['bold', 'italic', 'underline', 'strikeThrough', 'textColor', 'backgroundColor', 'emoticons'],
          ['paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent'],
          ['insertImage', 'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo']
        ],
        toolbarButtonsXS: null,
        toolbarButtonsSM: null,
        toolbarButtonsMD: null,
        imageUploadURL: '/upload_image.php',
        imageUploadParams: {
          id: 'my_editor'
        },
        events: {
                    initialized: function() {
                        const editor = this
                        document.getElementById("article_body").value = editor.codeBeautifier.run(editor.html.get())
                    },
                    contentChanged: function() {
                        const editor = this
                        document.getElementById("article_body").value = editor.codeBeautifier.run(editor.html.get())
                    }
                }
      })
    })()
    
    const title = document.getElementById('article_name');
    const live_title = document.getElementById('live_title');
    live_title.innerHTML = title.value;

    title.addEventListener('change', updateTitle);

    function updateTitle(e) {
      live_title.innerHTML = e.target.value;
    }

    const author = document.getElementById('article_author');
    const live_author = document.getElementById('live_author');
    live_author.innerHTML = author.value;

    author.addEventListener('change', updateAuthor);

    function updateAuthor(e) {
      live_author.innerHTML = e.target.value;
    }

    const authorDescription = document.getElementById('article_author_description');
    const live_authorDescription = document.getElementById('live_authorDescription');
    live_authorDescription.innerHTML = authorDescription.value;

    authorDescription.addEventListener('change', updateAuthorDescription);

    function updateAuthorDescription(e) {
      live_authorDescription.innerHTML = e.target.value;
    }
    const submit = document.getElementById("submit");
    document.getElementById("submit").addEventListener("click", event => {
      const cover_pic = document.getElementById("cover-pic").src;
      document.getElementById("article_cover_photo").value = cover_pic;
      const profile_pic = document.getElementById("profile-pic").src;
      document.getElementById("article_profile_pic").value = profile_pic;
      document.getElementById("form").action = "post_func.php";
    });
  </script>
</body>

</html>