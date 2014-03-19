<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<form method="POST" >
<label for="Name"> Name : </label>
  <select id="cmb" name="Make"     onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
     <option value="Name">Name</option>
     <option value="Organization">organization</option>
     <option value="street">street</option>
     <option value="city">city</option>
</select>
<input type="hidden" name="selected_text" id="selected_text" value="" />
<input type="submit" name="search" value="Search"/>
</form>

<?php

if(isset($_POST['search']))
{

    $makerValue = $_POST['Name']; // make value

    $maker = mysql_real_escape_string($_POST['selected_text']); // get the selected text
    echo $name;
}
 ?>