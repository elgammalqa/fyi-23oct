<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180257131-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180257131-1');
</script>

    <meta charset="utf-8"/>
    <title>View PDF jQuery</title>
    <link href="style.css" rel="stylesheet"/>
<script async defer data-website-id="afc1b19c-5319-4097-8747-3b05933578c7" src="http://205.134.254.209:3000/umami.js"></script>
</head>
<body>
    
    <div class="container">
        <h1>View PDF with jQuery</h1>
        <div id="viewpdf"></div>
    </div>

    <script src="jquery.min.js"></script>
    <script src="pdfobject.min.js"></script>
    <script>
        var viewer = $('#viewpdf');
        PDFObject.embed('sample.pdf', viewer);
    </script>
</body>
</html>