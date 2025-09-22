<?php
session_start();
if(!isset($_SESSION["All"])){
  $_SESSION["All"] = $_SESSION["completed"] = $_SESSION["incompleted"] = [];
}
class Task{  
  public int $ID = 0;
  public string $text = "";
  public function __construct($text) {
    $this->ID = time();
    $this->text = $text; 
  }
  public static function cls(bool $withCompleted = false){
    if(isset($_POST["cls"])){
      $_SESSION["All"] = [];
      if($withCompleted){
        $_SESSION["completed"] = $_SESSION["incompleted"] = [];
      }
      header("Location:index.php");
    }
  }
  public function newTask(){
    $_SESSION["All"][$this->ID] = $this;
    $_SESSION["incompleted"][$this->ID] = $this;
    }
  public static function view(string $type = "All"){
    $validTypes = ["All", "completed", "incomplete"];
    $type = $_POST['viewFilter'] ?? 'All'; // default fallback
    if (!in_array($type, $validTypes)) {
      $type = 'All'; // fallback to safe default
    }
    if(isset($_SESSION[$type])){
      $total = $_SESSION[$type];
    }
    if(!empty($total)){
      if(isset($_POST["sortFilter"]) && $_POST["sortFilter"] === "desc"){
        usort($total, 
        fn(Task $obj1, Task $obj2) => Task::customCompare($obj1, $obj2, 1)
        );
      }else{
        usort($total, 'Task::customCompare');
      }
      foreach($total as $item){
        echo <<< EOD
        <div class="tasks">
          <div class="task">
            <p>$item->text</p>
            <div class="options"> 
            <form method="post" action="">
              <button type="submit" class="btn btn-danger" name="dlt_$item->ID">Delete</button>
              <button type="submit" class="btn btn-primary" name="com_$item->ID">Complete</button>
            </form>
            </div>
          </div>
        </div>
        EOD;
      }
    }
  }
  public static function deleteButtonPressed(): bool{
    $pressedButtons = array_keys($_POST);
    foreach($pressedButtons as $button){
      if(substr($button, 0, 4) === "dlt_"){
        return true;
      }
    }
    return false;
  }
  public static function completeButtonPressed(): bool{
    $pressedButtons = array_keys($_POST);
    foreach($pressedButtons as $button){
      if(substr($button, 0, 4) === "com_"){
        return true;
      }
    }
    return false;
  }
  public static function deleteTask(){
    $pressedKeys = array_keys($_POST);
    $exploded = explode("_", $pressedKeys[0]);
    $dlt_ID = $exploded[1];
    if(isset($_SESSION["All"][$dlt_ID])){
      unset($_SESSION["All"][$dlt_ID]);
    }
    if(isset($_SESSION["incompleted"][$dlt_ID])){
      unset($_SESSION["incompleted"][$dlt_ID]);
    }
    if(isset($_SESSION["completed"][$dlt_ID])){
      unset($_SESSION["completed"][$dlt_ID]);
    }
    $_POST = [];
  }
  public static function completeTask(){
    $pressedKeys = array_keys($_POST);
    $exploded = explode("_", $pressedKeys[0]);
    $com_ID = $exploded[1];
    $_SESSION["completed"][$com_ID] = $_SESSION["All"][$com_ID];
    unset($_SESSION["All"][$com_ID]);
    unset($_SESSION["incompleted"][$com_ID]);
    $_POST = [];
  }
  public static function customCompare(Task $obj1, Task $obj2, bool $desc = false){
    if($desc){
      return strcmp($obj2->text, $obj1->text);
    }
    return strcmp($obj1->text, $obj2->text);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager App</title>
  <link rel="stylesheet" href="./Assets/CSS/style.css">
  <link rel="stylesheet" href="./Assets/CSS/all.min.css">
  <link rel="stylesheet" href="./Assets/CSS/bootstrap.min.css">
</head>
<body>
  <div class="main_task_container">
    <div class="container">
        <h2>Task Manager App</h2>   
      <form method="post" action="">
        <label for="task">Add Task:</label>
        <input type="text" id="task" name="taskText">
        
        <label for="viewFilter">Show:</label>
        <select id="viewFilter" name="viewFilter">
          <option value="All">All</option>
          <option value="completed">Completed</option>
          <option value="incomplete">Incomplete</option>
        </select>
        
        <label for="sortFilter">Sort:</label>
        <select id="sortFilter" name="sortFilter">
          <option value="asc">Ascending</option>
          <option value="desc">Descending</option>
        </select>
        
        <button type="submit" name="newTask">Add Task</button>
        <button type="submit" class="filter" name="filter">Filter</button>
        <button type="submit" class="clear" name="cls">Clear All Tasks</button>
      </form>
        <?php
        Task::cls(true);
        if(!empty($_POST)){
          if(isset($_POST["newTask"]) && !empty($_POST["taskText"])){
            $task = new Task($_POST["taskText"]);
          $task->newTask();
        }
        if(Task::deleteButtonPressed()){
          Task::deleteTask();
        }
        if(Task::completeButtonPressed()){
          Task::completeTask();
        }
        if(isset($_POST["filter"])){
          Task::view($_POST["viewFilter"]);
        }
        else{
          Task::view();
        }
      }
      ?>
    </div>
ff  </div>
</body>
</html>