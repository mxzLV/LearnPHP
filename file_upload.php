<?php
if(isset($_POST['submit'])){
    $file_name = $_FILES['upload']['name'];
    $ext = ['png', 'jpg', 'gif'];
    if(!empty($file_name)){
        $file_extension = explode(".", $file_name);
        $file_extension = strtolower(end($file_extension));
        $file_tmp_name = $_FILES['upload']['tmp_name'];
        $generated_file_name=time()."-".$file_name;
        $destination_path = "./uploads/{$generated_file_name}";
        $file_size = $_FILES['upload']['size'];
        if(in_array($file_extension, $ext)){
            if($file_size <= 1000000){
                move_uploaded_file($file_tmp_name, $destination_path);
                $error_msg = '<p style="color: green">File is uploaded</p>';
            }else{
                $error_msg = "<p style='color: red'> File is to big.</p>";
            }
        }else{
            $error_msg="<p style='color: red'>File is not image</p>";
        }
    }else{
        $error_msg = "<p style='color:red'>No file selected.</p>";
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"
      method="post"
      enctype="multipart/form-data">
    Choose your image to upload<br>
    <input type="file" name="upload"><br>
    <input type="submit" name="submit">
</form>
<?php
echo $error_msg ?? ""?>
