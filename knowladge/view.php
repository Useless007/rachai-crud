
<div class="container">
    <?php
    $sql = $conn->query("SELECT * FROM member");
    $results = $sql->fetchAll();
    {
    ?>  
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    
                    <th scope="col">#</th>
                    <th scope="col" class="d-none d-md-table-cell">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col" class="d-none d-sm-table-cell">อายุ</th>
                    <th scope="col" class="d-none d-md-table-cell">ปีการศึกษา</th>
                    <th scope="col" colspan="2">ตัวเลือก</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo "<tr><td colspan='12' class='text-center'>ไม่มีข้อมูล</td></tr>";
                    } else {
                    foreach ($results as $row) {
                ?>
                    <tr>
                        <td scope="row" class="text-center"><a href="<?php echo $row['m_picture'] ?>"><img src="<?php echo $row['m_picture'] ?>" alt="<?php echo $row['m_id']?>"style="height:50px;width:50px;"></a></td>
                        <td class="d-none d-md-table-cell"><?php echo $row['m_stuid'] ?></td>
                        <td><?php echo $row['m_fname'] ?></td>
                        <td><?php echo $row['m_lname'] ?></td>
                        <td class="d-none d-sm-table-cell"><?php echo $row['m_age'] ?></td>
                        <td class="d-none d-md-table-cell"><?php echo $row['m_grade'] ?></td>
                        <td class="text-center">
                            <a href="knowladge/update?m_id=<?php echo $row['m_id'] ?>" class="btn btn-info">แก้ไข</a>
                            <a href="knowladge/delete?m_id=<?php echo $row['m_id'] ?>" class="rem btn btn-danger">ลบ</a>
                        </td>
                    </tr>
                <?php } }?>
            </tbody>
        </table>
    <?php } ?>
</div>
