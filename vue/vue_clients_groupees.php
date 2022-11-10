<table class="tableauvue">
    <tr class="firstrow">
        <td class="td1">Nom du client</td>
        <td>Matricule du véhicule</td>
        <td class="td2">Nb interventions</td>
    </tr>
    <?php
    foreach ($lesResultats as $unResultat) {
        echo "<tr class='bordereven'>";
        echo "<td class='bl'>" . $unResultat['nom'] . "</td>";
        echo "<td>" . $unResultat['matricule'] . "</td>";
        echo "<td class='br'>" . $unResultat['nb'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>