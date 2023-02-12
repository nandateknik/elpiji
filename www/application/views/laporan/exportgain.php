<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan_gain.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
<thead>
<tr>
    <th>Tanggal</th>
    <th>Tangki Awal</th>
    <th>Isi Tangki</th>
    <th>Tangki Lo</th>
    <th>Tangki Akhir</th>
    <th>Isi Akhir</th>
    <th>Gain</th>
 </tr>
</thead>
<tbody>
                        <?php
                            $tangkiAwal = 0;
                            $tangkiIsi = 0;
                            $tangkiLo = 0;
                            $tangkiAkhir = 0;
                            $isiAkhir = 0;
                            $tangkiGain = 0;
                        ?>
                        <?php foreach($gain as $list):?>
                            <tr>
                                <td><?=$list->tanggal?></td>
                                <td><?=number_format($list->tangki_awal)?></td>
                                <td><?=number_format($list->tangki_isi)?></td>
                                <td><?=number_format($list->tangki_lo)?></td>
                                <td><?=number_format($list->tangki_akhir)?></td>
                                <td><?=number_format($list->isi_akhir)?></td>
                                <td><?=number_format($list->gain)?></td>
                            </tr>
                            <?php
                                $tangkiAwal += $list->tangki_awal;
                                $tangkiIsi += $list->tangki_isi;
                                $tangkiLo += $list->tangki_lo;
                                $tangkiAkhir += $list->tangki_akhir;
                                $isiAkhir += $list->isi_akhir;
                                $tangkiGain += $list->gain;
                            ?>  
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th><?=number_format($tangkiAwal)?></th>
                            <th><?=number_format($tangkiIsi)?></th>
                            <th><?=number_format($tangkiLo)?></th>
                            <th><?=number_format($tangkiAkhir)?></th>
                            <th><?=number_format($isiAkhir)?></th>
                            <th><?=number_format($tangkiGain)?></th>
                        </tr>
                    </tfoot>
</table>
