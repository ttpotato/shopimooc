<?php
require_once '../include.php';

$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;

$sql = 'select id,pName,cId,isShow,pubTime,iPrice from imooc_pro';
$rows = fetchAll($sql);
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <title>商品列表</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>编号</th>
        <th>商品名称</th>
        <th>商品分类</th>
        <th>是否上架</th>
        <th>上架时间</th>
        <th>网站价格</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['pName']; ?></td>
            <td><?php $id = $row['cId']; $sql = "select * from imooc_cate where id = {$id}"; $result = fetchOne($sql); echo $result['cateName']; ?></td>
            <td><?php echo $row['isShow']; ?></td>
            <td><?php echo $row['pubTime']; ?></td>
            <td><?php echo $row['iPrice']; ?></td>
            <td><input type="button" value="编辑" onclick="editPro<?php echo $row['id']; ?>"<input type="button" value="删除" onclick="delPro<?php echo $row['id'] ?>"></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

<script type="application/javascript">
    function editPro(id){
        window.location = "adminAction?act=editPro&id="id;
    }
    function delPro(id) {
        if (window.confirm("确认删除么？")) {
            window.location = "adminAction.php?act=delPro&id=" + id;
        }
    }
</script>