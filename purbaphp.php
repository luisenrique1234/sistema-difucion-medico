<?php 
$text='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 - Inline editor</title>
    <style>
        .ck-editor__editable_inline { min-height: 140px; }
    </style>
</head>
<body>
<?php 
if(isset($_POST['bonton'])){
    $text=$_POST['emba'];
}
echo" <h1>  ".$text;" </h1>";
?>
    
    <form action="" method="POST">
    <div class="ck.ck-editor">
    
    <textarea id="editor" name="texto"></textarea>

    <div>
        <input type="submit"  name="bonton">
    </div>
    <label><input type="checkbox" id="vehicle1" name="emba" value="embarazo">
                                                    Embarazo ectópico</label>
    </div>
    </form>
    <script src="js/ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error =>{ console.error(error)});
    </script>

    
</body>
</html>