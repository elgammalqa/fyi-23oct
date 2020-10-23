<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use nadar\quill\Lexer;
use nadar\quill\Debug;

require 'vendor/autoload.php';

$json = isset($_POST['quill-editor-input']) ? $_POST['quill-editor-input'] : '{}';
$jsonOptions = JSON_PRETTY_PRINT;
$lex = new Lexer($json);
$lex->debug = true;
$html = $lex->render();
$debuger = new Debug($lex);

if (isset($_POST['unittest'])) {
    $class = '
<?php
namespace nadar\quill\tests;

class '.$_POST['className'].' extends DeltaTestCase
{
    public $json = <<<\'JSON\'
'.$json.'
JSON;

    public $html = <<<\'EOT\'
'.$html.'
EOT;
}
';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://34.123.222.213/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
</head>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

<body>
<div class="p-3">
    <form method="post" class="demo">
        <div class="form-group">
            <input type="text" name="className" value="XyzTest" class="form-control" />
        </div>
        <input type="hidden" id="quill-editor-input" name="quill-editor-input" />
        <div id="editor" class="mb-2" style="height:150px;"></div>
        <input type="submit" name="submit" value="Parse" class="btn btn-primary" />
        <input type="submit" name="unittest" value="Create unit Test" class="btn btn-secondary" />
    </form>
    <?php if (isset($class)): ?>
    <div class="alert alert-info mt-3">
        <div class="form-group">
            <textarea class="small mt-3 form-control" ols="30" rows="10"><?= $class; ?></textarea>
        </div>
    </div>
    <?php endif; ?>
    <!-- OUTPUT TESTER-->
    <?php if (isset($_POST['quill-editor-input'])): ?>
        <div class="mt-3">
            <p class="lead">Delta Json</p>
            <pre class="border small p-2"><code><?= json_encode(json_decode($json), $jsonOptions); ?></code></pre>
            <p class="lead">RAW Html Output</p>
            <pre class="border p-2"><code><?= htmlentities($html, ENT_QUOTES); ?></code></pre>
            <p class="lead">HTML</p>
            <pre class="border p-2"><code><?= $html; ?></code></pre>
            <p class="text-muted small">The above HTML output is formatted using Bootstrap 4 styles, therefore paddings and margins may vary to your output.</p>
        </div>
    <hr />
    <?= $debuger->debugPrint(); ?>
    <?php endif; ?>
</div>
<!-- Initialize Quill editor -->
<script>
var editor = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            ['link'],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['image', 'video'],
            ['clean']
        ]
    },
    theme: 'snow'
});
$('form.demo').submit(function() {
    $('#quill-editor-input').val(JSON.stringify(editor.getContents()));
    return true;
});
editor.setContents(<?= $json; ?>);
</script>
</body>
</html>