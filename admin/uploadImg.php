<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>上传照片</title>
</head>
<body>
<form action="adminAction.php?act=uploadImg" method="post" enctype="multipart/form-data">
    请上传图片：<input type="file" name="uploadFile[]"/><br>
    请上传图片：<input type="file" name="uploadFile[]"/><br>
    请上传图片：<input type="file" name="uploadFile[]"/><br>
    <input type="submit" value="上传" />
</form>
</body>
</html>