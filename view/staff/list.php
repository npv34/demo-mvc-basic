<a href="index.php?page=add">Create</a>
<table border="1">
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Phone</td>
        <td>Address</td>
        <td>Email</td>
        <td>Group</td>
        <td></td>
    </tr>

    <?php foreach ($staffs as $key => $staff): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $staff->name ?></td>
        <td><?php echo $staff->phone ?></td>
        <td><?php echo $staff->address ?></td>
        <td><?php echo $staff->email ?></td>
        <td><a href="index.php?page=groups&action=show-staffs&group_id=<?php echo $staff->group['id'] ?>"><?php echo $staff->group['name'] ?></a></td>
        <td>
            <a href="index.php?page=delete&id=<?php echo $staff->id ?>" onclick="return confirm('Ban chac chan muon xoa?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
