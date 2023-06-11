<?php

 function getCategoryPosts($categoryPosts,$old='',$parentId=0,$char=''){
    $id=request()->route()->category;
    if($categoryPosts){
        foreach($categoryPosts as $key=>$category){
            if($category->parent_id == $parentId && $id!=$category->id){
                echo '<option value="'.$category->id.'"';
                if($old==$category->id){
                    echo ' selected';
                }
                echo '>'.$char.$category->name.'</option>';
                unset($categoryPosts[$key]);
                getCategoryPosts($categoryPosts,$old,$category->id,$char.'|_ ');
            }
        }
    }
 }
?>
