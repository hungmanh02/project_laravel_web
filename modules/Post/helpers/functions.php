<?php

 function getCategoryPostOption($categories,$old=[],$parentId=0,$char=''){
    // old là 1 array
    $id=request()->route()->category;
    if($categories){
        foreach($categories as $key=>$category){
            if($category->parent_id == $parentId && $id!=$category->id){
                $selected=!empty($old) && in_array($category->id,$old)? 'selected':'';
                // echo '<label class="d-block"><input type="checkbox" name="categories[]" value="'.$category->id.'"'.$checked.'/>'.$char.$category->name.'</label>';
                echo'<option value="'.$category->id.'" '.$selected.'}}>'.$char.$category->name.'</option>';
                unset($categories[$key]);
                getCategoriesCheckbox($categories,$old,$category->id,$char.'|_ ');
            }
        }
    }
 }
?>
