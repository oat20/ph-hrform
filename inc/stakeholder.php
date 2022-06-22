<form action="inc/add_project" method="post">
<fieldset>
  <legend>ผู้มีส่วนเกี่ยวข้องกับโครงการ</legend>
    <table>
  <tr>
    <td><textarea name="pro_stakeholder" rows="20" id="editor_stakeholder"  style="width: 100%"><?=$ob["pro_stakeholder"];?></textarea></td>
  </tr>
  <tr>
  	<td><input name="number" type="hidden" value="17" />
            <input name="pro_id" type="hidden" value="<?=$_GET["pro_id"];?>" />
            <input class="button" type="submit" name="submit" value="บันทึกข้อมูล"></td>
  </tr>
</table>

  </fieldset>
  </form>
