<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Progress</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $(function(){
          $('#nav').load("./common/navbarLearner.php");
          console.log("click");
        });
    </script>


</head>
<body>

    <div id="nav"></div>

    <br>
    <div class="container">
    <br>
    <div>
      <h6 class="border-bottom border-gray pb-2 mb-0">View Progress</h6>
      <br> 
    </div>
    <!--Course 1 CourseRun 1-->
    <div id="app">
      <?php 
        session_start();
        require_once "../../Class/autoload.php";


        $learnerDAO = new LearnerDAO();
        $classes = $learnerDAO->getAllCourseRun($_SESSION['userID']);

        // var_dump($classes);
        foreach($classes as $title=>$value){
          echo "<h5>{$title}</h5>";
          $count = 0;
          $total = 0;
          $take = 0;
          foreach($value as $section=>$each){
            $count+= 1;
            $crrMark = 0;
            foreach($each['result'] as $mark){
              $crrMark+= $mark;
            }$total += ($crrMark/sizeof($each['result']));
            $take += sizeof($each['Attempt']);
          }
          $avg = number_format((float)($total/$count), 2, '.', '');
          echo "<div class='card' >
          <div class='card-header row' >
                <a class='col-6'>Quiz AttemptNumber: {$take}<a/>
                <a class='col-3'>Result: {$avg}/100<a/>     
                <label for='progress'>{$avg}%</label>
                <progress id='progress' max='100' value='100' ></progress>
          </div>
        </div>
        <ul class='list-group list-group-flush'>";

        foreach($value as $section=>$each){
          $count = sizeof($each["Attempt"]);
          $total = 0;
          foreach($each["result"] as $mark){
            $total +=$mark;
          }$avg = number_format((float)($total/$count), 2, '.', '');
          echo "
          <li class='list-group-item'><b>Section {$section}</b>
                <div class='row' >
                     <a class='col-6'>Attempt: {$count}<a/>           
                     <a class='col-6'>Section AVG Result: {$avg}/100<a/>
                </div>
              </li>
          
          ";
        }
        echo"</ul>
        </div>";

        }

      ?>
        <!-- <h5>Intro to Printer Servicing - Course Run 1</h5>
        

           <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Section 1</b>
                <div class="row" >
                     <a class="col-3">Visted: 50<a/>           
                     <a class="col-3">Quiz Completed: 50<a/>
                     <a class="col-3">Materials Downloaded: 50<a/>
                </div>
              </li>
                
              <li class="list-group-item"><b>Section 2</b>
                <div class="row" >
                     <a class="col-3">Visted: 50<a/>           
                     <a class="col-3">Quiz Completed: 50<a/>
                     <a class="col-3">Materials Downloaded: 50<a/>
                </div>
              </li>
              <li class="list-group-item"><b>Section 3</b>
                <div class="row" >
                     <a class="col-3">Visted: 50<a/>           
                     <a class="col-3">Quiz Completed: 50<a/>
                     <a class="col-3">Materials Downloaded: 50<a/>
                </div>
              </li>
              <br>
           -->
        
        <!--Course 1 CourseRun 2-->
        <!-- <div>
        <h5>Intro to Printer Servicing - Course Run 2</h5>
        <div class="card" >
          <div class="card-header row" >
                <a class="col-6">Section visted: 10<a/>
                <a class="col-3">Completed: 50/50<a/>     
                <label for="progress">20%</label>
                <progress id="progress" max="100" value="20" ></progress>
          </div>
            </div>

           <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Section 1</b>
                <div class="row" >
                     <a class="col-3">Visted: 10<a/>           
                     <a class="col-3">Quiz Completed: 10<a/>
                     <a class="col-3">Materials Downloaded: 10<a/>
                </div>
              </li>
                
              <li class="list-group-item"><b>Section 2</b>
                <div class="row" >
                     <a class="col-3">Visted: 10<a/>           
                     <a class="col-3">Quiz Completed: 10<a/>
                     <a class="col-3">Materials Downloaded: 10<a/>
                </div>
              </li>
              <li class="list-group-item"><b>Section 3</b>
                <div class="row" >
                     <a class="col-3">Visted: 10<a/>           
                     <a class="col-3">Quiz Completed: 10<a/>
                     <a class="col-3">Materials Downloaded: 10<a/>
                </div>
              </li>
              <br>
          </ul>
        </div> -->

    </div>



    </div>
</div>

     <script>
      //  const app = Vue.createApp({
      //     data() {
      //         return {
      //             posts: [] // array of post objects
      //         }
      //     },
      //     created() { // created is a hook that executes as soon as Vue instance is created
      //         axios.get('http://localhost/spM-team3-project/View/Learner/getData/getViewProgressLearnerData.php')
      //         .then(response => {
      //             // this gets the data, which is an array
      //             this.posts = response.data;
      //             console.log(response.data);
      //         })
      //         .catch(error => {
      //             this.posts = [{ entry: 'There was an error: ' + error.message }]
      //             })
                  
      //         }
              
      //     });app.mount('#app');
     </script>


</body>

</html>
