// JavaScript Document
var gFiles = 0;
function addFile() {
//var li = document.createElement('li');
var li = document.createElement('li');
li.setAttribute('id', 'file-' + gFiles);
li.innerHTML = '<p class="space5"></p><input name="position[]" type="text" size="30" maxlength="200"> <input name="pro_name_res[]" type="text" size="30" maxlength="200"> <input name="mission[]" type="text" size="30" maxlength="200"> <span onclick="removeFile(\'file-' + gFiles + '\')" style="cursor:pointer;">[เอาออก]</span>';
document.getElementById('files-root').appendChild(li);
gFiles++;
}
function removeFile(aId) {
var obj = document.getElementById(aId);
obj.parentNode.removeChild(obj);
}