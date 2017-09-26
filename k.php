



<?php

?>
<body>
    <form method="post">
    <select name="select">
    <?php
    $conn=mysqli_connect('localhost','root','root','prep');
    $sql="SELECT*FROM collection GROUP BY brand";
    $run=mysqli_query($conn,$sql);
    while($r=mysqli_fetch_assoc($run)){ ?>
        <p>lm;sdflls</p>
        <option value="<?php echo $r['brand'] ?>"><?php echo $r['brand'] ?></option>
    <?php
    }
        mysqli_close($conn);
        ?>
    </select>
        <button name="submit">Display</button>
</form>

    