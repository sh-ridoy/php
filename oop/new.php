<?php
// /c:/xampp/htdocs/php/oop/new.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Response that will open in the new window
    $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
    echo "<!doctype html><html><head><meta charset='utf-8'><title>Result</title></head><body>";
    echo "<h2>Form submitted</h2>";
    echo "<p>Name: {$name}</p>";
    echo "</body></html>";
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form - open in new window</title>
    <script>
        function openResultWindow() {
            // Open (or focus) a named window and submit the form to it
            window.open('', 'resultWindow', 'width=700,height=500,toolbar=no,menubar=no,location=no');
            return true; // allow the form to submit
        }
    </script>
</head>
<body>
    <form method="post" action="new.php" target="resultWindow" onsubmit="return openResultWindow();">
        <label>
            Name:
            <input type="text" name="name" required>
        </label>
        <button type="submit">Submit (opens new window)</button>
    </form>
</body>
</html>
<script>
(function(){
    var form = document.querySelector('form');
    if (!form) return;
    var submit = form.querySelector('button[type="submit"]');
    var clientBtn = document.createElement('button');
    clientBtn.type = 'button';
    clientBtn.textContent = 'Open in new window (client)';
    clientBtn.addEventListener('click', function(){
        var name = (form.querySelector('input[name="name"]')||{}).value || '';
        var safe = String(name).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
        var w = window.open('', 'resultWindow', 'width=700,height=500,toolbar=no,menubar=no,location=no');
        w.document.open();
        w.document.write('<!doctype html><html><head><meta charset="utf-8"><title>Result</title></head><body><h2>Form submitted</h2><p>Name: '+ safe +'</p></body></html>');
        w.document.close();
    });
    if (submit) submit.parentNode.insertBefore(clientBtn, submit.nextSibling);
})();
</script>