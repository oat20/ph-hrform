<form action="inc/add_project.php" method="post">
<fieldset>
<legend>ผลการดำเนินงานที่ผ่านมา (โครงการต่อเนื่อง)</legend>
<table>
             <tr>
               <td class="formcol2" colspan="2"><textarea id="elm1" name="reason2" rows="20" style="width: 100%"><?=$ob["reason2"];?></textarea></td>
             </tr>
             <tr>
               <td class="formcol2"><input name="number" type="hidden" value="9" />
            <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
            <input class="button" type="submit" name="submit" value="บันทึกข้อมูล"></td>
             </tr>
             </table>
             </fieldset>
</form>