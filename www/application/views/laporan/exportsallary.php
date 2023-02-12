<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_sallary.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
<thead>
<tr>
<tr>
    <th>Tanggal</th>
    <th>Nama Agen</th>
    <th>Nama Sopir</th>
    <th>No Polisi</th>
    <th>Fee</th>
</tr>
 </tr>
</thead>
<tbody>
    <?php foreach($sallary as $list):?>
        <tr>
            <td><?=$list->tanggal?></td>
            <td><?=$list->agen?></td>
            <td><?=$list->sopir?></td>
            <td><?=$list->nopol?></td>
            <td>Rp. <?=number_format($list->fee*560)?></td>
        </tr>  
    <?php endforeach;?>
</tbody>
</table>
