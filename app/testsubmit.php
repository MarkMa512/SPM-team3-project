<?php 

var_dump($_POST);

#$array = array
if (isset($_POST['question1'])){
    #$test = array('qnName' => $_POST['question1']) ;
    $question1['qnNumber'] = 1;
    $question1['type'] = $_POST['question1Type'];
    $question1['qnText'] = $_POST['question1'];
    var_dump($question1);
}



#{"qnName" : "Question 2","type" : "mcq", "option":[{"id": "q2-1", "value": "Option 1"}, {"id": "q2-2", "value": "Option 2"}, {"id": "q2-3", "value": "Option 3"}], "id" : "q2"},
?>