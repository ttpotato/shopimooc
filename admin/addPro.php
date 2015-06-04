<?php
require_once '../include.php';

$sql = "select * from imooc_cate";
$rows = fetchAll($sql);
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>增加商品</title>

    <script charset="utf-8" src = "../plugins/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src = "../plugins/kindeditor/lang/zh_CN.js"></script>
    <script>
        KindEditor.ready(function(K)){
            window.editor = K.create('#editor_id');
        }
    </script>

</head>
<body>
<form action = "adminAction.php?act=addPro" method = "post" enctype="multipart/form-data">
<table border="1" cellpadding="">
    <tr>
        <th align="right">商品名称</th>
        <td><input type = "text" name = "pName" placeholder="请输入商品名称" /></td>
    </tr>
    <tr>
        <th align="right">商品分类</th>
        <td>
            <select name="cId">
                <?php foreach($rows as $row): ?>
                    <option value = "<?php echo $row['id']; ?>"><?php echo $row['cateName']; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <th align="right">商品货号</th>
        <td><input type="text" name = "pSn" ></td>
    </tr>
    <tr>
        <th align="right">商品库存</th>
        <td><input type="text" name = "pNum"></td>
    </tr>
    <tr>
        <th align="right">商品市场价格</th>
        <td><input type="text" name = "mPrice"></td>
    </tr>
    <tr>
        <th align="right">商品网站价格</th>
        <td><input type="text" name = "iPrice"></td>
    </tr>
    <tr>
        <th align="right">商品图片</th>
        <td><input type="file" multiple name = "uploadFile[]"></td>
    </tr>
    <tr>
        <th align="right">商品描述</th>
        <td>
            <textarea id = "editor_id" name = "pDesc" style = "width: 700px;height: 300px;"></textarea>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" name="确认">&nbsp<input type="reset" name = "重置"></td>
    </tr>
</table>
</form>
</body>
</html>