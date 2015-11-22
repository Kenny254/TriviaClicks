<!DOCTYPE html>
<html>
<body>

<?php echo show_notification(); ?>

<form action="<?= site_url('Main/Uploadpage/upload') ?>" method="post" enctype="multipart/form-data">
    Add Question:
    <input type="file" name="upload[file]">
    <input type="text" name="upload[quesnum]" placeholder="Question Number">
    <input type="text" name="upload[question]" placeholder="Question">
    <input type="text" name="upload[answer]" id="fileToUpload" placeholder="correct answer">
    <input type="text" name="upload[choices]" placeholder="choices">
    <input type="text" name="upload[explain]" placeholder="Explanation">
    <input type="text" name="upload[tag]" placeholder="Tag">
    <select required id="something" name="upload[image]" style="width:100%">
    <?php foreach ($imageinfo as $id => $val) {?>
    <option name="image" value="<?php echo $id ?>"><?php echo $val; ?></option>
    <?php }?>
    </select>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>