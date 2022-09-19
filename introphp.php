<?php

/**Create a global variable to_do_list with a list of 5 items.
Write a function that returns the to-do list.
Write a function with two parameters(index, item) and for this function replace the item at the position 
index with the item and return a list with an updated item.
Write a function with one parameter(index) that removes the item at the position item and 
returns the list without that item on the position index.
*/

//Create a global variable to_do_list with a list of 5 items.
// Declaring global variables of a todoList.
$GLOBALS['to_do_list']=["shopping","cleaning","reading","praying","swimming"];


//Write a function that returns the to-do list.
//Returning list of items in todolist using function.
function todo(){

  $to_do_list = $GLOBALS['to_do_list'];
  return $to_do_list;

}


//Write a function with two parameters(index, item) and for this function replace the item at the position 
//index with the item and return a list with an updated item.
function update_todolist($index,$item){
  $GLOBALS['to_do_list'][$index]=$item;
return $GLOBALS['to_do_list'];
}


//Write a function with one parameter(index) that removes the item at the position item and 
//Returns the list without that item on the position index 
function delete_todolist_item($index){
 unset($GLOBALS['to_do_list'][$index]);
return $GLOBALS['to_do_list'];
}

//Returning list of items in todolist.
$newList = [];
$newList = update_todolist(1,"playingFootball");
//var_dump($newList);

// Returning updated list.
$updatedList = delete_todolist_item(3);
//var_dump($updatedList);

 
?>
