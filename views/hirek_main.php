<form action ="<?= SITE_ROOT ?>hirek" method = "post">

<h2>Hír hozzáadása</h2>
<table>
    <tr>
        <td>Cím</td>
        <td><input name="cim" type="text" id="cim" required></td>
    </tr>
    <tr>
        <td>Szöveg</td>
        <td><textarea name="szoveg" id="szoveg" required></textarea></td>
    </tr>
    <tr>
    <tr>
        <td colspan="2">
            <div align="center">
                <input name="hiddenField" type="hidden" value="add_n">
                <input type="submit" value="Küldés">
            </div>
        </td>
</table>
</form>